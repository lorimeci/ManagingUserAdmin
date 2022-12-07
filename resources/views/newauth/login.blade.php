<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('checklogin') }}">
            @csrf
            {{-- @if (Session::has('success'))
                <div class = "alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
            <div class = "text-red-700 bg-red-100 dark:bg-red-200 dark:text-red-800">{{ Session::get('fail') }}</div>
        @endif --}}
            <!-- Email Address -->
            <div class ="justify-end mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class ="justify-end mt-4">
                @if (Route::has('password.change'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.change') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('newregister'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('newregister') }}">
                    {{ __('Register Here !') }}
                </a>
                @endif
                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div> 
        </form>
    </x-auth-card>
</x-guest-layout>