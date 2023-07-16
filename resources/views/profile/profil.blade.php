@extends('body')
@section('main')
    <div class="contact_section layout_padding">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1 class="contact_taital">{{ __('Profile Information') }}</h1>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("Update your account's profile information and email address.") }}
                                </p>
                            </header>

                            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                @csrf
                            </form>

                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')

                                <div class="container">
                                    <div class="contact_section_2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <x-text-input id="id" name="id" type="hidden"
                                                        class="mt-1 block w-full" :value="old('id', $id)" required
                                                        autocomplete="id" />
                                                    <div class="mail_section_1">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name">Noms</label>
                                                                <input type="text" id="name" class="mail_text"
                                                                    name="name" value="{{ old('name', $name) }}" required
                                                                    autofocus autocomplete="name">
                                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                            </div>
                                                            <div class="col">
                                                                <label for="login">Login</label>
                                                                <input type="text" id="login" class="mail_text"
                                                                    name="login" value="{{ old('login', $user->login) }}"
                                                                    required autocomplete="login">
                                                                <x-input-error :messages="$errors->get('login')" class="mt-2" />
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="email">Email</label>
                                                                <input type="email" id="email" class="mail_text"
                                                                    name="email" value="{{ old('email', $user->email) }}"
                                                                    required autocomplete="username">
                                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                                    <div>
                                                                        <p
                                                                            class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                                            {{ __('Your email address is unverified.') }}

                                                                            <button form="send-verification"
                                                                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                                                {{ __('Click here to re-send the verification email.') }}
                                                                            </button>
                                                                        </p>

                                                                        @if (session('status') === 'verification-link-sent')
                                                                            <p
                                                                                class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                                                {{ __('A new verification link has been sent to your email address.') }}
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="current_password">Current Password</label>
                                                                <input type="password" id="current_password"
                                                                    class="mail_text" name="current_password"
                                                                    autocomplete="current-password">
                                                                <x-input-error :messages="$errors->updatePassword->get(
                                                                    'current_password',
                                                                )" class="mt-2" />

                                                            </div>
                                                            <div class="col">
                                                                <label for="password">New Password</label>
                                                                <input type="password" id="password" class="mail_text"
                                                                    name="password" autocomplete="new-password">
                                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="password_confirmation">Confirm Password</label>
                                                                <input id="password_confirmation" class="mail_text"
                                                                    type="password" name="password_confirmation"
                                                                    autocomplete="new-password">
                                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                        <p class="send_bt"><button type="submit"
                                                                class="btn btn-primary btn-lg">{{ __('Modifier') }}</button>
                                                            @if (session('status') === 'profile-updated')
                                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                                    x-init="setTimeout(() => show = false, 2000)"
                                                                    class="text-sm text-gray-600 dark:text-gray-400">
                                                                    {{ __('Saved.') }}</p>
                                                            @endif

                                                            @if (session('status') === 'password-updated')
                                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                                    x-init="setTimeout(() => show = false, 2000)"
                                                                    class="text-sm text-gray-600 dark:text-gray-400">
                                                                    {{ __('password Updated.') }}</p>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
