@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mt-8 items-center justify-center">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-2/3">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Change Password
            </div>
            <div class="p-3">
                <form class="w-full" method="POST" action="{{ route('admin.password.change') }}">
                    @include('admin.message')
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Current Password:
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                type="password" id="current_password" name="current_password"
                                placeholder="******************" autocomplete="new-password">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password" >
                                New Password:
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                type="password" id="new_password" name="new_password" placeholder="******************">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Confirm New Password:
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                type="password" id="new_password_confirmation"
                                name="new_password_confirmation"placeholder="******************">

                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button
                                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                Change Password
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
