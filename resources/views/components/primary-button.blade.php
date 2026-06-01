<button {{ $attributes->merge(['type' => 'submit', 'class' => 'primary-button auth-button transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
