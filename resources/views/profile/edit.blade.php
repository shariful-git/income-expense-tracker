<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Info -->
            <div class="p-6 bg-[#FDFDF6] sm:rounded-lg border border-[#E2E2E0] shadow-sm">
                <h3 class="text-lg font-semibold text-[#3C3C38] mb-4">Update Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-6 bg-[#FDFDF6] sm:rounded-lg border border-[#E2E2E0] shadow-sm">
                <h3 class="text-lg font-semibold text-[#3C3C38] mb-4">Change Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="p-6 bg-[#FDFDF6] sm:rounded-lg border border-[#E2E2E0] shadow-sm">
                <h3 class="text-lg font-semibold text-[#3C3C38] mb-4">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
