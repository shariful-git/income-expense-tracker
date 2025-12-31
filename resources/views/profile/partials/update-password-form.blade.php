<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-[#3C3C38]">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-[#6B6B66]">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 bg-[#FDFDF6] p-6 rounded-lg border border-[#E2E2E0] shadow-sm">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-[#3C3C38]" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-[#EF4444]" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-[#3C3C38]" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-[#EF4444]" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-[#3C3C38]" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-[#EF4444]" />
        </div>

        <!-- Submit -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-[#A3E635] hover:bg-[#84CC16] text-[#1b1b18]">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-[#6B6B66]"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
