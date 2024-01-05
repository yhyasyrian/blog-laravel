<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('auth.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('auth.paragraph_delete_account') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('auth.delete_account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('auth.delete_account_confirm') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('auth.paragraph_delete_account') }}
            </p>

            <div class="mt-6">
                <x-text-input
                    id="password"
                    name="password"
                    :label="__('auth.password')"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('auth.password') }}"
                />

            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('site.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('auth.delete_account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
