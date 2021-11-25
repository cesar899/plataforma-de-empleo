@extends('layouts.app')

@section('content')

<div class="px-20 bg-orange-200 mt-20">
    <!--   flex -- asjad korvuti, block is default for div no need to specify -->
    <div class="bg-white rounded-lg shadow-2xl md:flex">
        <div class="flex">

            <form class="ml-7 py-10 px-5" method="POST" action="{{ route('register') }}" novalidate>
                <div class="text-2xl mb-10 uppercase text-center">
                    {{ __('Register') }}
                </div>
                @csrf
                <div class="flex flex-wrap mb-6">
                    <label for="name" class="block text-gray-700 text-sm mb-2">{{ __('Name') }}</label>
                    <input id="name" type="text" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('name') border-red-500 border @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="email" class="block text-gray-700 text-sm mb-2">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="password" class="block text-gray-700 text-sm mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('password') border-red-500 border @enderror" name="password" autocomplete="new-password">
                    @error('password')
                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="flex flex-wrap mb-6">
                    <label for="password-confirm" class="block text-gray-700 text-sm mb-2">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border" name="password_confirmation" autocomplete="new-password">
                </div>
                <div class="flex flex-wrap">
                    <button type="submit" class="bg-green-500 w-full hover:bg-teal-700 text-white p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
                        {{ __('Registrar') }}
                    </button>
                </div>
            </form>
            <div class="py-10 mt-20">
            <div class=" mt-20">
            <h1 class=" text-3xl text-center"> ¿Eres Reclutador?</h1>
            <p class="text-xl mt-5 text-center">Crea una cuenta totalmente gratis y comienza a publicar hasta 10 vacantes</p>
        </div>
            </div>
        </div>
    </div>
    @endsection