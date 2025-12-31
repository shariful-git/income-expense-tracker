<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-[#3C3C38]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-[#6B6B66]">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Delete Account Button -->
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-[#FCA5A5] hover:bg-[#F87171] text-[#3C3C38] rounded-md px-4 py-2"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-[#FDFDF6] rounded-lg border border-[#E2E2E0] shadow-sm space-y-4">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-[#3C3C38]">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-sm text-[#6B6B66]">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div>
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full md:w-3/4 bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[#EF4444]" />
            </div>

            <div class="flex justify-end gap-3 mt-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="bg-[#E5E7EB] hover:bg-[#D1D5DB] text-[#3C3C38] rounded-md px-4 py-2">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="bg-[#FCA5A5] hover:bg-[#F87171] text-[#3C3C38] rounded-md px-4 py-2">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
