<label class="flex items-center">
    <div class="relative inline-flex items-center">
        <input
            type="checkbox" {!! $attributes->merge(['class' => 'w-12 h-5 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none']) !!}>
        <span
            class="absolute top-0 left-0 w-5 h-5 transition-all transform scale-150 bg-white rounded-full shadow-sm"
        ></span>
    </div>
</label>
