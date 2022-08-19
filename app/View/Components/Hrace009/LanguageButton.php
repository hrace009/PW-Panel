<?php




namespace App\View\Components\Hrace009;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class LanguageButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $languages = [];
        $folders = File::directories(base_path('resources/lang/'));
        foreach ($folders as $folder) {
            //Use this on Linux system
            //$languages[] = str_replace('\\', '', last(explode('/', $folder)));

            //Use this on Windows system
            $languages[] = str_replace('lang\\', '', last(explode('/', $folder)));
        }
        return view('components.hrace009.language-button', [
            'languages' => $languages
        ]);
    }
}
