@foreach( $api->ports() as $name => $port )
    <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
        <div>
            <h6
                class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
            >
                {{ $name }}
            </h6>
            <span class="text-xl font-semibold">{{ $port['port'] }}</span>
            <span
                class="inline-block px-2 py-px ml-2 text-xs {{ $port['open'] ? 'text-green-500' : 'text-red-500' }} {{ $port['open'] ? 'bg-green-100' : 'bg-red-100' }} rounded-md">
                      {{ $port['open'] ? 'Online' : 'Offline' }}
            </span>
        </div>
        <div>
            @if( $port['open'] )
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
                            d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8v4h-2v-4H8l4-4 4 4h-3z"
                        />
                      </svg>
                    </span>
            @else
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
                            d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8zm1-8h3l-4 4-4-4h3V8h2v4z"
                        />
                      </svg>
                    </span>
            @endif
        </div>
    </div>
@endforeach
