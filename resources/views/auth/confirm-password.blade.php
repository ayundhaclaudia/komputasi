@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center">

    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6 border border-pink-200">

        <h4 class="text-center text-pink-600 font-bold text-lg mb-3">
            🔒 Konfirmasi Password
        </h4>

        <div class="mb-4 text-sm text-gray-600 text-center">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            {{-- PASSWORD --}}
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-pink-600"/>

                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-lg border-pink-300
                           focus:border-pink-500 focus:ring-pink-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- BUTTON --}}
            <div class="mt-4">
                <x-primary-button
                    class="w-full justify-center bg-pink-500 hover:bg-pink-600
                           focus:ring-pink-400 rounded-lg">
                    {{ __('Confirm Password') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</div>
@endsection
