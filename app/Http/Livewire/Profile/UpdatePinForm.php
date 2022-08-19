<?php





namespace App\Http\Livewire\Profile;

use App\Http\Controllers\Profile\UpdateUserPin;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdatePinForm extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'current_pin' => '',
        'pin' => '',
        'pin_confirmation' => '',
    ];

    /**
     * Update the user's pin.
     *
     * @param UpdateUserPin $updater
     * @return void
     */
    public function updatePin(UpdateUserPin $updater)
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->state = [
            'current_pin' => '',
            'pin' => '',
            'pin_confirmation' => '',
        ];

        $this->emit('saved');
    }

    /**
     * Get the current user of the application.
     *
     * @return User|Authenticatable|null
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.profile.update-pin-form');
    }
}
