<!-- Player Online -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
        >
            {{ __('admin.playerOnline') }}
        </h6>
        <span class="text-xl font-semibold">{{ $api->online ? $totalOnline : 0 }}</span>
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

<!-- Account Registered -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
        >
            {{ __('admin.accountRegistered') }}
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

<!-- Characters Created -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
        >
            {{ __('admin.totalCharacter') }}
        </h6>
        <span class="text-xl font-semibold">{{ $totalRoles }}</span>
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
                    d="M9.83 8.79L8 9.456V13H6V8.05h.015l5.268-1.918c.244-.093.51-.14.782-.131a2.616 2.616 0 0 1 2.427 1.82c.186.583.356.977.51 1.182A4.992 4.992 0 0 0 19 11v2a6.986 6.986 0 0 1-5.402-2.547l-.697 3.956L15 16.17V23h-2v-5.898l-2.27-1.904-.727 4.127-6.894-1.215.348-1.97 4.924.868L9.83 8.79zM13.5 5.5a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                />
            </svg>
        </span>
    </div>
</div>

<!-- Faction Created -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
        <h6
            class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
        >
            {{ __('admin.totalFaction') }}
        </h6>
        <span class="text-xl font-semibold">{{ $totalFaction }}</span>
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
                    d="M17.457 3L21 3.003l.002 3.523-5.467 5.466 2.828 2.829 1.415-1.414 1.414 1.414-2.474 2.475 2.828 2.829-1.414 1.414-2.829-2.829-2.475 2.475-1.414-1.414 1.414-1.415-2.829-2.828-2.828 2.828 1.415 1.415-1.414 1.414-2.475-2.475-2.829 2.829-1.414-1.414 2.829-2.83-2.475-2.474 1.414-1.414 1.414 1.413 2.827-2.828-5.46-5.46L3 3l3.546.003 5.453 5.454L17.457 3zm-7.58 10.406L7.05 16.234l.708.707 2.827-2.828-.707-.707zm9.124-8.405h-.717l-4.87 4.869.706.707 4.881-4.879v-.697zm-14 0v.7l11.241 11.241.707-.707L5.716 5.002l-.715-.001z"
                />
            </svg>
        </span>
    </div>
</div>
