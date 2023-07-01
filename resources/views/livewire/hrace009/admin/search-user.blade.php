<div class="flex flex-col pl-6 pr-6 items-center justify-between">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle min-w-0 inline-block sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border dark:bg-darker bg-white dark:border-primary-darker sm:rounded-lg">
                <div
                    class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700">
                            <span class="absolute inset-y-0 inline-flex items-center px-4">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </span>
                    <form method="get">
                        <input
                            class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                            placeholder="{{ __('members.fields.search.placeholder') }}" wire:model="term">
                    </form>
                </div>
                <div wire:loading class="dark:text-cyan-400 p-4">{{ __('members.search') }}</div>
                <div wire:loading.remove class="dark:text-cyan-400"/>
                <table class="w-full text-xs font-medium table-auto">
                    @if ($term === '')
                        <div class="text-gray-500 text-sm p-4">
                            {{ __('members.empty') }}
                        </div>
                    @else
                        @if($users->isEmpty())
                            <div class="text-gray-500 text-sm p-4">
                                {{ __('members.notfound') }}
                            </div>
                        @else
                            <thead class="dark:bg-darker dark:text-light border-b dark:border-primary-darker uppercase">
                            <tr>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.id') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.name') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.email') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.truename') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.balance') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider border-r dark:border-primary-darker text-center">{{ __('members.table.role') }}</th>
                                <th scope="col"
                                    class="px-2 py-3 tracking-wider text-center">{{ __('members.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="bg-transparent">
                            @foreach( $users as $user )
                                <tr>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $user->ID }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ ucwords($user->truename) }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        {{ $user->money }}
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        @if( $user->role === 'Administrator' )
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $user->role }}</span>
                                        @elseif ( $user->role === 'Gamemaster')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $user->role }}</span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $user->role }}</span>
                                        @endif
                                    </td>
                                    <td class="px-2 py-3 whitespace-nowrap">
                                        <!-- Modal -->
                                        <div class="flex flex-row">
                                            <!-- Give Coin Modal -->
                                            @if( ( Auth::user()->isAdministrator() === true ) )
                                                <div x-data="{ {{ $user->name }}_Coin : false }">
                                                    <!-- Button Give Coin -->
                                                    <x-hrace009::button
                                                        @click="{{ $user->name }}_Coin = !{{ $user->name }}_Coin"
                                                        class="w-auto ml-1"
                                                    >
                                                        <span @popper(
                                                              {{ __('members.actions.give', ['currency' => config('pw-config.currency_name')]) . ': ' . $user->name }} )>
                                                            <svg class="w-5 h-5"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24"
                                                                 width="18"
                                                                 height="18"
                                                                 stroke="currentColor"
                                                                 fill="none"
                                                            >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M23 12v2c0 3.314-4.925 6-11 6-5.967 0-10.824-2.591-10.995-5.823L1 14v-2c0 3.314 4.925 6 11 6s11-2.686 11-6zM12 4c6.075 0 11 2.686 11 6s-4.925 6-11 6-11-2.686-11-6 4.925-6 11-6z"
                                                            />
                                                        </svg>
                                                        </span>
                                                    </x-hrace009::button>

                                                    <!-- Modal Give Coin -->
                                                    <div
                                                        x-show="{{ $user->name }}_Coin"
                                                        class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                        style="display: none;"
                                                    >
                                                        <!-- Modal -->
                                                        <div
                                                            x-show="{{ $user->name }}_Coin"
                                                            class="dark:bg-dark bg-white rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                            @click.away="{{ $user->name }}_Coin = false"
                                                            x-transition:enter="ease-out duration-300"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="ease-in duration-200"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            style="display: none;"
                                                        >
                                                            <div class="text-lg font-semibold">
                                                                {{ __('members.actions.give', ['currency' => config('pw-config.currency_name')]) . ': ' . $user->name }}
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.manage.balance', $user->ID ) }}"
                                                                method="post">
                                                                {!! csrf_field() !!}
                                                                <div class="mt-4">
                                                                    <x-hrace009::input-box id="amount" name="amount"
                                                                                           placeholder="{{ __('members.fields.amount.label') }}"
                                                                                           required/>
                                                                </div>
                                                                <div
                                                                    class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                                    <x-hrace009::button class="w-auto">
                                                                        {{ __('members.actions.give', ['currency' => config('pw-config.currency_name')])  }}
                                                                    </x-hrace009::button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <!-- Reset Password & Pin Modal -->
                                            <div x-data="{ {{ $user->name }}_Password : false }">
                                                <!-- Button Force Reset Password -->
                                                <x-hrace009::button
                                                    @click="{{ $user->name }}_Password = !{{ $user->name }}_Password"
                                                    class="w-auto ml-1"
                                                >
                                                        <span @popper(
                                                              {{ __('members.actions.resetPass') . ' ' . $user->name }} )>
                                                            <svg class="w-5 h-5"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24"
                                                                 width="18"
                                                                 height="18"
                                                                 stroke="currentColor"
                                                                 fill="none"
                                                            >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M10.313 11.566l7.94-7.94 2.121 2.121-1.414 1.414 2.121 2.121-3.535 3.536-2.121-2.121-2.99 2.99a5.002 5.002 0 0 1-7.97 5.849 5 5 0 0 1 5.848-7.97zm-.899 5.848a2 2 0 1 0-2.828-2.828 2 2 0 0 0 2.828 2.828z"
                                                            />
                                                        </svg>
                                                        </span>
                                                </x-hrace009::button>
                                                <!-- Modal Reset Password -->
                                                <div
                                                    x-show="{{ $user->name }}_Password"
                                                    class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    style="display: none;"
                                                >
                                                    <!-- Modal -->
                                                    <div
                                                        x-show="{{ $user->name }}_Password"
                                                        class="dark:bg-dark bg-white rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                        @click.away="{{ $user->name }}_Password = false"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        style="display: none;"
                                                    >
                                                        <div class="text-lg font-semibold">
                                                            {{ __('members.actions.resetPass') . ' ' . $user->name }}
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.manage.resetPassPin', $user->ID ) }}"
                                                            method="post">
                                                            {!! csrf_field() !!}
                                                            <div class="flex flex-row py-4 px-4 justify-center">
                                                                <label class="items-center">
                                                                    <div class="relative inline-flex items-center">
                                                                        <input
                                                                            id="resetPassPin"
                                                                            name="resetPassPin"
                                                                            type="checkbox"
                                                                            required
                                                                            class="w-12 h-5 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                                                                        />
                                                                        <span
                                                                            @popper({{ __('members.actions.confirm') }})
                                                                            class="absolute top-0 left-0 w-5 h-5 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                                                                        ></span>
                                                                    </div>
                                                                </label>
                                                                <span
                                                                    class="ml-2">{{ __('members.actions.confirm') }}</span>
                                                            </div>
                                                            <span class="dark:text-red-500 font-bold">{{ __('members.actions.note') }}:</span>
                                                            <span>{{ __('members.actions.noteCaption') }}</span>
                                                            <div
                                                                class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                                <x-hrace009::button class="w-auto">
                                                                    {{ __('members.actions.resetPassPin')  }}
                                                                </x-hrace009::button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Change Email Modal -->
                                            <div x-data="{ {{ $user->name }}_Email : false }">
                                                <!-- Button Change Email -->
                                                <x-hrace009::button
                                                    @click="{{ $user->name }}_Email = !{{ $user->name }}_Email"
                                                    class="w-auto ml-1"
                                                >
                                                        <span @popper(
                                                              {{ __('members.actions.changeEmail') . ' ' . $user->name }} )>
                                                            <svg class="w-5 h-5"
                                                                 xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24"
                                                                 width="18"
                                                                 height="18"
                                                                 stroke="currentColor"
                                                                 fill="none"
                                                            >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M22 13.341A6 6 0 0 0 14.341 21H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v9.341zm-9.94-1.658L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439zm4.99 7.865a3.017 3.017 0 0 1 0-1.096l-1.014-.586 1-1.732 1.014.586c.278-.238.599-.425.95-.55V15h2v1.17c.351.125.672.312.95.55l1.014-.586 1 1.732-1.014.586a3.017 3.017 0 0 1 0 1.096l1.014.586-1 1.732-1.014-.586a2.997 2.997 0 0 1-.95.55V23h-2v-1.17a2.997 2.997 0 0 1-.95-.55l-1.014.586-1-1.732 1.014-.586zM20 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                            />
                                                            </svg>
                                                        </span>
                                                </x-hrace009::button>

                                                <!-- Modal Change Email -->
                                                <div
                                                    x-show="{{ $user->name }}_Email"
                                                    class="fixed dark:text-light flex items-center justify-center overflow-auto z-50 bg-gray-500 bg-opacity-40 left-0 right-0 top-0 bottom-0"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100"
                                                    x-transition:leave-end="opacity-0"
                                                    style="display: none;"
                                                >
                                                    <!-- Modal -->
                                                    <div
                                                        x-show="{{ $user->name }}_Email"
                                                        class="dark:bg-dark bg-white rounded-xl shadow-2xl p-6 sm:w-full sm:max-w-lg mx-10"
                                                        @click.away="{{ $user->name }}_Email = false"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        style="display: none;"
                                                    >
                                                        <div class="text-lg font-semibold">
                                                            {{ __('members.actions.changeEmail') . ' ' . $user->name }}
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.manage.chEmail', $user->ID ) }}"
                                                            method="post">
                                                            {!! csrf_field() !!}
                                                            <div class="mt-4">
                                                                <x-hrace009::input-box id="chEmail" name="chEmail"
                                                                                       placeholder="{{ __('members.actions.email') }}"
                                                                                       required
                                                                                       type="email"
                                                                />
                                                            </div>
                                                            <div
                                                                class="flex flex-row justify-end px-6 py-4 dark:bg-dark text-right">
                                                                <x-hrace009::button class="w-auto">
                                                                    {{ __('members.actions.btnChEmail') }}
                                                                </x-hrace009::button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    @endif

                </table>
            </div>
        </div>
    </div>
</div>
<div class="mt-2 ml-2 mr-2 items-center justify-between">
    {{ $users->render() }}
</div>
