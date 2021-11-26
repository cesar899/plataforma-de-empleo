@extends('layouts.app')

@section('content')

<div class="bg-white mx-auto max-w-sm shadow-lg rounded-lg overflow-hidden mt-24">
    <div class="sm:flex sm:items-center px-6 py-4">
        <form class="py-10 px-5" method="POST" action="{{ route('login') }}" novalidate>
            <div class="uppercase text-center mb-12 mb-0">
                {{ __('Login') }}
            </div>
            @csrf
            <div class="flex flex-wrap mb-6">
                <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="flex flex-wrap mb-6">
                <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('password') border-red-500 border @enderror" name="password" autocomplete="current-password">
                @error('password')
                <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="flex flex-wrap mb-6">
                <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="block text-gray-700 text-sm mb-2" for="remember">
                    {{ __('Remember Me') }}
            </div>
            <div class="flex flex-wrap ">
                <button type="submit" class="bg-green-500 w-full hover:bg-teal-700 text-white p-3 focus:outline-none focus:shadow-outline uppercase font-bold ">
                    {{ __('Login') }}
                </button>
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-500 mt-5 text-center w-full" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection