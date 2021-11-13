@extends('layouts.app')

@section('content')
  <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 shadow-md mt-20">
                    <div class="bg-gray-700 text-white uppercase text-center py-3 px-6 mb-0">
                        {{ __('Reset Password')  }}   
                    </div>
                    <form class="py-10 px-5" method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full my-5 block text-sm mx-3" role="alert">
                                   {{ session('status') }}
                                </div>
                            @endif
                            <div class="flex flex-wrap mb-6">
                               <label for="email" class="flex flex-wrap mb-6">{{ __('E-Mail Address') }}</label>
                               <input id="email" type="email" class="p-3 bg-gray-100 rounded form-input w-full border-gray-600 border @error('email') border-red-500 border @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                               @error('email')
                                    <span class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5 text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                           </div>
                           <div class="flex flex-wrap">
                                <button type="submit" class="bg-green-500 w-full hover:bg-teal-700 text-white p-3 focus:outline-none focus:shadow-outline uppercase font-bold ">
                                    {{ __('Send Password Reset Link') }}
                                </button>    
                           </div>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
