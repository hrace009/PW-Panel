<!-- GM's Widget -->
<div class="w-64">
    <div class="flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
        <div class="p-2 border-b dark:border-primary">
            <h1
                class="text-sm font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
            >
                {{ __('widget.table.gmonline') }}
            </h1>
        </div>
        <div class="flex align-middle items-center justify-between">
            @if ( count( $gms ) > 0 )
                <table id="gm_status" class="w-full table table-auto">
                    <tbody>
                    @foreach( $gms as $gm )
                        <tr>
                            <td class="p-2"><img class="rounded" src="{{ $gm->profile_photo_url }}" width="48px"
                                                 height="48px" alt="{{ $gm->truename }}"/></td>
                            <td class="p-2 text-left">{{ $gm->truename }}</td>
                            <td class="p-2 text-right">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $gm->online() ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"> {{ $gm->online() ? __('widget.table.field.online') : __('widget.table.field.offline') }} </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div
                    class="flex flex-col mx-2 my-2 w-full bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded"
                    role="alert">
                    <strong class="font-bold">{{ __('widget.nogm.titel') }}</strong>
                    <span>{{ __('widget.nogm.text') }}</span>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Server Status Widget -->
<div class="py-4 w-64">
    <div class="flex flex-col bg-white rounded-md dark:bg-darker border dark:border-primary">
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                    {{ __('widget.server_time') }}
                </h6>
                <span
                    class="text-sm font-semibold">{{ \Carbon\Carbon::now(config('app.timezone'))->translatedFormat('j F, Y h:i a') }}</span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                    {{ __('widget.gmwa') }}
                </h6>
                <span class="text-xl font-semibold"><a href="https://wa.me/{{ config('pw-config.gmwa') }}"
                                                       target="_blank">+{{ config('pw-config.gmwa') }}</a></span>
            </div>
            <div>
                <svg
                    class="w-12 h-12 text-gray-300 dark:text-green-500"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1"
                        d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"
                    />
                </svg>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <span class="text-xl font-semibold"><a href="{{ config('pw-config.discord') }}"
                                                       target="_blank"><img src="{{ asset('img/discordlogo.png') }}"
                                                                            alt="{{ config('pw-config.server_name') }}"/> </a></span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                    {{ __('widget.table.server_status') }}
                </h6>
                <span
                    class="inline-block px-2 py-px text-xs {{ $api->online ? 'text-green-500' : 'text-red-500' }} {{ $api->online ? 'bg-green-100' : 'bg-red-100' }} font-semibold rounded-md">
                      {{ $api->online ? 'Online' : 'Offline' }}
                </span>
            </div>
            <div>
                @if( $api->online )
                    <span>
                      <svg
                          class="w-12 h-12 text-gray-300 dark:text-green-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1"
                            d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8v4h-2v-4H8l4-4 4 4h-3z"
                        />
                      </svg>
                    </span>
                @else
                    <span>
                      <svg
                          class="w-12 h-12 text-gray-300 dark:text-red-500"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                      >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1"
                            d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8h3l-4 4-4-4h3V8h2v4z"
                        />
                      </svg>
                    </span>
                @endif
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                    {{ __('widget.players_online') }}
                </h6>
                <span
                    class="text-xl font-semibold">{{ $api->online ? $onlinePlayer >= 100 ? $onlinePlayer + config('pw-config.fakeonline') : $onlinePlayer : 0 }}</span>

            </div>
            <div>
        <span>
            <svg
                class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M4 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H4zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4"
                />
            </svg>
        </span>
            </div>
        </div>
        <div class="flex align-middle items-center justify-between p-2">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
                >
                    {{ __('widget.total_account') }}
                </h6>
                <span class="text-xl font-semibold">{{ $totalUser }}</span>
            </div>
            <div>
        <span>
            <svg
                class="w-12 h-12 text-gray-300 dark:text-primary-dark"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1"
                    d="M2 22a8 8 0 1 1 16 0h-2a6 6 0 1 0-12 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm8.284 3.703A8.002 8.002 0 0 1 23 22h-2a6.001 6.001 0 0 0-3.537-5.473l.82-1.824zm-.688-11.29A5.5 5.5 0 0 1 21 8.5a5.499 5.499 0 0 1-5 5.478v-2.013a3.5 3.5 0 0 0 1.041-6.609l.555-1.943z"
                />
            </svg>
        </span>
            </div>
        </div>
    </div>
</div>
