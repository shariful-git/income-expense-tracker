<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-[#3C3C38]">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-[#6B6B66]">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 bg-[#FDFDF6] p-6 rounded-lg border border-[#E2E2E0] shadow-sm">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-[#3C3C38]" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-[#EF4444]" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#3C3C38]" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full bg-white border border-[#D9D9D6] rounded-md shadow-sm focus:border-[#A3A3A0] focus:ring focus:ring-[#C5C5C2]"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-[#EF4444]" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-[#6B6B66]">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-[#3C3C38] hover:text-[#1b1b18] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#A3A3A0]">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-[#22C55E]">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-[#A3E635] hover:bg-[#84CC16] text-[#1b1b18]">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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
