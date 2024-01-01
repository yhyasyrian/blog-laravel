<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('auth.paragraph_confirm_password') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <x-text-input
            id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            :label="__('auth.password')"
            required autocomplete="current-password"
            />

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('auth.confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
