<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Livewire\Hrace009\Admin;

use App\Models\User;
use Livewire\Component;

class ShowMembers extends Component
{
    public function render()
    {
        $users = User::paginate(15);
        return view('livewire.hrace009.admin.show-members', [
            'users' => $users,
        ]);
    }
}
