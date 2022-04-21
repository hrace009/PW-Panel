<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Efriandika\LaravelSettings\Facades\Settings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function getChat()
    {
        return view('admin.chat.index');
    }

    public function getSettings()
    {
        return view('admin.chat.settings');
    }

    public function postChatConfig(Request $request): RedirectResponse
    {
        $input = $request->validate([
            'log_path' => 'required|string'
        ]);
        Config::write('pw-config.chat_log_path', $input['log_path']);
        $status = 'success';
        $message = __('admin.configSaved');

        return redirect()->back()->with($status, $message);
    }

    public function postChatLogs()
    {
        $chat = [];

        $colors = [
            0 => 'dark:text-light',
            1 => 'text-yellow-400',
            2 => 'text-green-400',
            4 => 'text-pink-400',
            7 => 'text-orange-400',
            9 => 'text-red-400',
            12 => 'text-red-400'
        ];

        $type = __('manage.channels');

        $handle = fopen(config('pw-config.chat_log_path') . 'world2.chat', 'rb');
        if ($handle) {
            $lines = [];
            while (($line = fgets($handle)) !== false) {
                $lines[] = explode(" ", $line);
            }
            foreach ($lines as $o) {
                $chat[] = array(
                    'row_color' => (!array_key_exists(substr($o[8], 4), $colors)) ? (substr($o[8], 4) <= 1024) ? 'text-blue-400' : 'text-indigo-400' : $colors[substr($o[8], 4)],
                    'date' => $o[0] . " " . $o[1],
                    'type' => str_replace(":", "", $o[6]),
                    'uid' => substr($o[7], 4),
                    'channel' => (!array_key_exists(substr($o[8], 4), $type)) ? (substr($o[8], 4) <= 1024) ? $type[3] : $type[4] : $type[substr($o[8], 4)],
                    'dest' => (strpos($o[8], 'fid') !== false) ? __('manage.faction_id') . substr($o[8], 4) : substr($o[8], 4),
                    'msg' => base64_decode(base64_encode(iconv("UCS-2LE", "UTF-8", base64_decode(substr($o[9], 4)))))
                );
            }
            fclose($handle);
        }
        return $chat;
    }
}
