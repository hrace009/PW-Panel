<!-- TOS toggle -->
<label class="flex items-center">
    <div class="relative inline-flex items-center">
        <x-hrace009::check-box id="terms" name="terms"/>
    </div>
    <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">
        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
    </span>
</label>
