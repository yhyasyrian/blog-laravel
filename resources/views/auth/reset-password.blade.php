<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-text-input id="email" :label="__('auth.email')" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input :label="__('auth.password')" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password"
                    :label="__('auth.password_confirmation')"
            />

        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('auth.reset_password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
