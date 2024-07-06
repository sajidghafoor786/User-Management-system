{{-- send forget password link on email  --}}
@extends('admin.auth.app')
@section('app-name')
    Forget Password
@endsection
@section('content')
    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('password.forget') }}">
                    @include('admin.message')
                    @csrf
                    <p class="text-gray-800 font-medium text-center text-lg font-bold">
                        Forget Password
                    </p>
                    <div class="">
                        <label class="block text-sm text-gray-00" for="cus_name">Email</label>
                        <input value="{{ old('email') }}"
                            class=" @error('email') is-invalid @enderror w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            id="cus_name" name="email" type="text" placeholder="Your Email" aria-label="Name">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4 items-center justify-between">
                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">
                            Send Password Reset Link
                        </button>

                    </div>
                  
                </form>
            </div>
        </div>
    </div>
@endsection
