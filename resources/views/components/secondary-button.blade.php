<button {{ $attributes->merge(['type' => 'button', 'class' => 'theme-secondary-button transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
