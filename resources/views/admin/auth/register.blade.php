@extends('admin.auth.app')
@section('app-name')
 Register   
@endsection
@section('content')

<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST"
                action="{{ route('register') }}">
                @csrf
                <p class="text-gray-800 font-medium text-center">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input value="{{ old('name') }}"
                        class=" @error('name') is-invalid @enderror w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                        id="cus_name" name="name" type="text" placeholder="Your Name" aria-label="Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
                <div class="">
                    <label class="block text-sm text-gray-00">Password</label>
                    <input value="{{ old('password') }}"
                        class=" @error('password') is-invalid @enderror w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                        name="password" type="password" placeholder="Your Password" aria-label="Name">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Confirm Password</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="password-confirm"
                        name="password_confirmation" type="password" placeholder="Your Confirm Password">
                </div>
                <div class="mt-4">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                        type="submit">Register</button>
                </div>
                <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                    href="{{ route('login') }}">
                    Already have an account ?
                </a>
            </form>
        </div>
    </div>
</div>
@endsection