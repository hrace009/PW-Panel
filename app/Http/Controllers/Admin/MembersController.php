<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function show()
    {
        $users = User::paginate(15);
        return view('admin.members.members', [
            'users' => $users,
        ]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'searchInput' => 'required|alpha_num|regex:/^[a-z0-9]+$/'
        ]);

        $searchUsers = User::where('name', 'LIKE', '%' . $request->searchInput . '%')->get();
        return view('admin.members.members', ['searchUsers' => $searchUsers]);
    }

    public function addBalance(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        $user->money += $request->amount;
        $user->save();
        return redirect()->back()->with('success', __('admin.members.add'));
    }
}
