<?php

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
