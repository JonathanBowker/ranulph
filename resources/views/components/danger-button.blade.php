<button {{ $attributes->merge(['type' => 'submit', 'class' => 'theme-danger-button transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
