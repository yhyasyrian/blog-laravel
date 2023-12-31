<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('auth.update_password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('auth.paragraph_update_password') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-text-input id="update_password_current_password" :label="__('auth.current_password')" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
        </div>

        <div>
            <x-text-input id="update_password_password" :label="__('auth.new_password')" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
        </div>

        <div>
            <x-text-input id="update_password_password_confirmation" :label="__('auth.confirmation_password')" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('site.save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('site.saved') }}</p>
            @endif
        </div>
    </form>
</section>
