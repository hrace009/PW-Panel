<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManageController extends Controller
{

    /**
     * ManageController constructor.
     */
    public function __construct()
    {
        $this->middleware('server.online', [
            'only' => [
                'postBroadcast',
                'postMailer',
                'postForbid'
            ]
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function getBroadcast()
    {
        return view('admin.manage.broadcast');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postBroadcast(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'user' => 'numeric|min:32',
            'channel' => 'required|channel_available',
            'message' => 'required',
        ]);

        $api = new API();

        $api->WorldChat($request->user, $request->message, $request->channel);

        return redirect()->back()->with('success', __('manage.complete.broadcast'));
    }

    /**
     * @return Application|Factory|View
     */
    public function getMailer()
    {
        return view('admin.manage.mailer');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postMailer(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'item_id' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',
            'protection_type' => 'required|numeric|min:0',
            'time_limit' => 'numeric',
            'gold' => 'numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $api = new API();
        $status = null;
        $message = null;

        $mail = array(
            'title' => $request->subject,
            'message' => $request->message,
            'money' => $request->gold,
            'item' => [
                'id' => $request->item_id,
                'pos' => 0,
                'count' => $request->quantity,
                'max_count' => $request->quantity,
                'data' => ($request->octet) ?: NULL,
                'proctype' => ($request->protection_type) ?: 0,
                'expire_date' => ($request->time_limit) ? time() + $request->time_limit : 0,
                'guid1' => 0,
                'guid2' => 0,
                'mask' => $request->mask,
            ]
        );

        switch ($request->type) {
            //TODO Add a parameter to the success message that tells the user how many players the item was sent to or their names

            case 'list':
                $roles = explode(',', str_replace(' ', '', $request->roles));
                foreach ($roles as $index => $id) {
                    $api->sendMail($id, $mail['title'], $mail['message'], $mail['item'], $mail['money']);
                    $status = 'success';
                    $message = __('manage.complete.mailer.list');
                }
                break;

            case 'all':
                $users = User::all();
                foreach ($users as $user) {
                    $roles = $api->getRoles($user->ID) ? $api->getRoles($user->ID)['roles'] : [];
                    foreach ($roles as $role) {
                        $api->sendMail($role['id'], $mail['title'], $mail['message'], $mail['item'], $mail['money']);
                    }
                }
                $status = 'success';
                $message = __('manage.complete.mailer.all');
                break;

            case 'online':
                foreach ($api->getOnlineList() as $index => $role) {
                    $api->sendMail($role['roleid'], $mail['title'], $mail['message'], $mail['item'], $mail['money']);
                }
                $status = 'success';
                $message = __('manage.complete.mailer.online');
                break;
        }
        return redirect()->back()->with($status, $message);
    }

    /**
     * @return Application|Factory|View
     */
    public function getForbid()
    {
        return view('admin.manage.forbid');
    }

    public function postForbid(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric|min:1',
            'length' => 'required|numeric|min:1',
            'reason' => 'required'
        ]);

        $api = new API();
        $status = null;
        $message = null;
        switch ($request->type) {
            case 'ban_acc':
                $api->forbidAcc($request->user_id, $request->length, $request->reason);
                $status = 'success';
                $message = __('manage.complete.forbid.ban.account', ['user' => $request->user_id, 'seconds' => $request->length]);
                break;

            case 'ban_char':
                $api->forbidRole($request->user_id, $request->length, $request->reason);
                $status = 'success';
                $message = __('manage.complete.forbid.ban.character', ['user' => $request->user_id, 'seconds' => $request->length]);
                break;

            case 'mute_acc':
                $api->muteAcc($request->user_id, $request->length, $request->reason);
                $status = 'success';
                $message = __('manage.complete.forbid.mute.account', ['user' => $request->user_id, 'seconds' => $request->length]);
                break;

            case 'mute_char':
                $api->muteRole($request->user_id, $request->length, $request->reason);
                $status = 'success';
                $message = __('manage.complete.forbid.mute.character', ['user' => $request->user_id, 'seconds' => $request->length]);
                break;
        }
        return redirect()->back()->with($status, $message);
    }
}
