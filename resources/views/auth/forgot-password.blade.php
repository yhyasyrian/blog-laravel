<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('auth.paragraph_forgot_password') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <x-text-input
            id="email" :label="__('auth.email')" type="email" name="email" :value="old('email')" required autofocus
        />

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('auth.reset_link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
