@section('title', ' - ' . __('manage.title'))
<x-hrace009.layouts.admin>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('manage.edit_gm', ['user' => $user->name]) }}</h1>
        </div>
    </x-slot>
    <x-slot name="content">
        <div class="max-w-2xl mx-auto my-6">
            <x-hrace009::admin.validation-error/>
            <form method="post" action="{{ route('admin.management.gm.postGMEdit', Request::segment( 5 )) }}">
                {!! csrf_field() !!}

                <div class="grid grid-cols-2 gap-4 my-6">
                    @foreach( $rights as $k => $v )
                        <div class="pretty p-svg p-curve p-smooth">
                            <input type="hidden" name="gm_rights[{{ $k }}]" value="0">
                            <input type="checkbox" id="right_{{ $k }}" name="gm_rights[{{ $k }}]"
                                   value="1" {{ isset( $user_rights[ $k ] ) ? 'checked' : NULL }}/>
                            <div class="state p-success">
                                <!-- svg path -->
                                <svg class="svg svg-icon" viewBox="0 0 20 20">
                                    <path
                                        d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z"
                                        style="stroke: white;fill:white;"></path>
                                </svg>
                                <label>{{ __('manage.gm_permissions.' . $k ) }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Submit Button -->
                <x-hrace009::button class="w-auto">
                    {{ __('manage.submit.gm.save') }}
                </x-hrace009::button>
            </form>
        </div>
    </x-slot>
</x-hrace009.layouts.admin>
