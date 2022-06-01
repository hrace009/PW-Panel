<?php

namespace App\Http\Livewire\Hrace009\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchUser extends Component
{
    use WithPagination;

    public $term = '';

    public function render()
    {
        sleep(1);
        $users = User::search($this->term)->paginate();
        return view('livewire.hrace009.admin.search-user', [
            'users' => $users
        ]);
    }
}
