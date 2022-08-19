<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class LanguageSelector extends Component
{
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
        return view('components.hrace009.language-selector', [
            'languages' => $languages
        ]);
    }
}
