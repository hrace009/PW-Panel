<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Jetstream\Http\Livewire\LogoutOtherBrowserSessionsForm;

class LogoutFromOtherBrowser extends LogoutOtherBrowserSessionsForm
{
    /**
     * Log out from other browser sessions.
     *
     * @param StatefulGuard $guard
     * @return void
     * @throws AuthenticationException
     */
    public function logoutOtherBrowserSessions(StatefulGuard $guard)
    {
        $this->resetErrorBag();

        if (!Hash::check(Auth::user()->name . $this->password, Auth::user()->passwd)) {
            throw ValidationException::withMessages([
                'password' => [__('auth.profile.invalidPassword')],
            ]);
        }

        $guard->logoutOtherDevices(Auth::user()->name . $this->password, $attribute = 'passwd');

        $this->deleteOtherSessionRecords();

        $this->confirmingLogout = false;

        $this->emit('loggedOut');
    }

    public function render()
    {
        return view('profile.logout-other-browser-sessions-form');
    }
}
