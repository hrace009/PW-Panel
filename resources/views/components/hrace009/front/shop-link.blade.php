<!-- Shop links -->
<div x-data="{ isActive: {{ $status }}, open: {{ $status }} }">
    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
    <a
        href="#"
        @click="$event.preventDefault(); open = !open"
        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
        :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
        role="button"
        aria-haspopup="true"
        :aria-expanded="(open || isActive) ? 'true' : 'false'"
    >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M21 13v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-7H2v-2l1-5h18l1 5v2h-1zM5 13v6h14v-6H5zm1 1h8v3H6v-3zM3 3h18v2H3V3z"
                      />
                    </svg>
                  </span>
        <span class="ml-2 text-sm"> {{ __('shop.title') }} </span>
        <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
    </a>
    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.title') }}">
        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
        <a
            href="{{ route('app.shop.index') }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $indexText }} transition-colors duration-200 rounded-md dark:{{ $indexLight }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.all') }}
        </a>
        <a
            href="{{ route('app.shop.mask', 1 ) }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $Mask1Text }} transition-colors duration-200 rounded-md dark:{{ $Mask1Light }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.masks.1') }}
        </a>
        <div x-data="{ isActive: {{ $eqStatus }}, open: {{ $eqStatus }} }">
            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
            <a
                href="#"
                @click="$event.preventDefault(); open = !open"
                class="flex items-center py-2 text-sm text-gray-{{ $eqText }} transition-colors duration-200 rounded-md dark:{{ $eqLight }} dark:hover:text-light hover:text-gray-700"
                role="button"
                aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
                <span class="ml-2 text-sm"> {{ __('shop.equipment') }} </span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
            </a>
            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.equipment') }}">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a
                    href="{{ route('app.shop.mask', 2 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask2Text }} transition-colors duration-200 rounded-md dark:{{ $Mask2Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.2') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 256 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask256Text }} transition-colors duration-200 rounded-md dark:{{ $Mask256Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.256') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 16 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask16Text }} transition-colors duration-200 rounded-md dark:{{ $Mask16Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.16') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 8 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask8Text }} transition-colors duration-200 rounded-md dark:{{ $Mask8Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.8') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 64 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask64Text }} transition-colors duration-200 rounded-md dark:{{ $Mask64Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.64') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 128 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask128Text }} transition-colors duration-200 rounded-md dark:{{ $Mask128Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.armor.128') }}
                </a>
            </div>
        </div>
        <div x-data="{ isActive: {{ $fasStatus }}, open: {{ $fasStatus }} }">
            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
            <a
                href="#"
                @click="$event.preventDefault(); open = !open"
                class="flex items-center py-2 text-sm text-gray-{{ $fasText }} transition-colors duration-200 rounded-md dark:{{ $fasLight }} dark:hover:text-light hover:text-gray-700"
                role="button"
                aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
                <span class="ml-2 text-sm"> {{ __('shop.fashion') }} </span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
            </a>
            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.equipment') }}">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a
                    href="{{ route('app.shop.mask', 65536 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask65536Text }} transition-colors duration-200 rounded-md dark:{{ $Mask65536Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.fashion.65536') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 8192 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask8192Text }} transition-colors duration-200 rounded-md dark:{{ $Mask8192Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.fashion.8192') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 16384 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask16384Text }} transition-colors duration-200 rounded-md dark:{{ $Mask16384Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.fashion.16384') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 32768 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask32768Text }} transition-colors duration-200 rounded-md dark:{{ $Mask32768Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.fashion.32768') }}
                </a>
            </div>
        </div>
        <div x-data="{ isActive: {{ $accStatus }}, open: {{ $accStatus }} }">
            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
            <a
                href="#"
                @click="$event.preventDefault(); open = !open"
                class="flex items-center py-2 text-sm text-gray-{{ $accText }} transition-colors duration-200 rounded-md dark:{{ $accLight }} dark:hover:text-light hover:text-gray-700"
                role="button"
                aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
                <span class="ml-2 text-sm"> {{ __('shop.accessories') }} </span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
            </a>
            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.equipment') }}">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a
                    href="{{ route('app.shop.mask', 1536 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask1536Text }} transition-colors duration-200 rounded-md dark:{{ $Mask1536Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.accessories.1536') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 32 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask32Text }} transition-colors duration-200 rounded-md dark:{{ $Mask32Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.accessories.32') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 4 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask4Text }} transition-colors duration-200 rounded-md dark:{{ $Mask4Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.accessories.4') }}
                </a>
            </div>
        </div>
        <div x-data="{ isActive: {{ $charmStatus }}, open: {{ $charmStatus }} }">
            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
            <a
                href="#"
                @click="$event.preventDefault(); open = !open"
                class="flex items-center py-2 text-sm text-gray-{{ $charmText }} transition-colors duration-200 rounded-md dark:{{ $charmLight }} dark:hover:text-light hover:text-gray-700"
                role="button"
                aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'false'"
            >
                <span class="ml-2 text-sm"> {{ __('shop.charms') }} </span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
            </a>
            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="{{ __('shop.charms') }}">
                <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                <a
                    href="{{ route('app.shop.mask', 1048576 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask1048576Text }} transition-colors duration-200 rounded-md dark:{{ $Mask1048576Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.charms.1048576') }}
                </a>
                <a
                    href="{{ route('app.shop.mask', 2097152 ) }}"
                    role="menuitem"
                    class="block p-2 text-sm text-gray-{{ $Mask2097152Text }} transition-colors duration-200 rounded-md dark:{{ $Mask2097152Light }} dark:hover:text-light hover:text-gray-700"
                >
                    {{ __('shop.masks.charms.2097152') }}
                </a>
            </div>
        </div>
        <a
            href="{{ route('app.shop.mask', 262144 ) }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $Mask262144Text }} transition-colors duration-200 rounded-md dark:{{ $Mask262144Light }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.masks.262144') }}
        </a>
        <a
            href="{{ route('app.shop.mask', 524288 ) }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $Mask524288Text }} transition-colors duration-200 rounded-md dark:{{ $Mask524288Light }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.masks.524288') }}
        </a>
        <a
            href="{{ route('app.shop.mask', 4096 ) }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $Mask4096Text }} transition-colors duration-200 rounded-md dark:{{ $Mask4096Light }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.masks.4096') }}
        </a>
        <a
            href="{{ route('app.shop.mask', 0 ) }}"
            role="menuitem"
            class="block p-2 text-sm text-gray-{{ $Mask0Text }} transition-colors duration-200 rounded-md dark:{{ $Mask0Light }} dark:hover:text-light hover:text-gray-700"
        >
            {{ __('shop.masks.0') }}
        </a>
    </div>
</div>
