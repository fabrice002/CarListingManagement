@extends('body')
@section('main')
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Créer un compte</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mail_section_1">
                                <div class="row">
                                    {{-- <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                            required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div> --}}
                                    <div class="col">
                                        <label for="name">Noms</label>
                                        <input type="text" id="name" class="mail_text" name="name"
                                            value="{{ old('name') }}" required autofocus autocomplete="name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    {{-- <div class="mt-4">
                                        <x-input-label for="name" :value="__('Login')" />
                                        <x-text-input id="login" class="block mt-1 w-full" type="text" name="login"
                                            :value="old('login')" required autocomplete="login" />
                                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                                    </div> --}}
                                    <div class="col">
                                        <label for="login">Login</label>
                                        <input type="text" id="login" class="mail_text" name="login"
                                            value="{{ old('login') }}" required autocomplete="login">
                                        <x-input-error :messages="$errors->get('login')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div> --}}
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="mail_text" name="email"
                                            value="{{ old('email') }}" required autocomplete="username">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="mt-4">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div> --}}
                                    <div class="col">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="mail_text" name="password"
                                            required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div> --}}
                                    <div class="col">
                                        <label for="password_confirmation"> Confirm Password</label>
                                        <input id="password_confirmation" class="mail_text" type="password"
                                            name="password_confirmation" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <p class="send_bt"><button type="submit" class="btn btn-primary btn-lg">{{ __('Register') }}</button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="name" :value="__('Login')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')"
                required autocomplete="login" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}
