@extends('admin.layouts.app')
@section('content')
    <div class="container mx-auto py-12">
     
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6 ">
                @include('admin.message')
                <div class="justify-center bg-green-600 text-center" style="margin: auto;">

                    <h1 class="text-3xl font-bold text-gray-800 ">Details of User</h1>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 mt-4"> {{ Auth::user()->name }}</h2>
                <p><strong>Designation:</strong> {{ Auth::user()->designation }}</p>
                <div class="mt-6 py-5">
                    <h4 class="text-lg font-semibold text-gray-700">Contact Information</h4>
                    <ul class="mt-2 text-gray-600">
                        <li class="py-2"><strong>Address:</strong> {{ Auth::user()->email }}</li>
                        <li class="py-2"><strong>Phone:</strong> {{ Auth::user()->contact }}</li>
                        <li class="py-2"><strong>Email:</strong> {{ Auth::user()->address }}</li>

                        @if (Auth::user()->role == '0')
                            <li class="py-2"><strong>Role:</strong> <button
                                    class="bg-red-500  text-white font-light px-1  rounded-full">
                                    User
                                </button></li>
                        @else
                            <li class="py-2"><strong>Role:</strong> <button
                                    class="bg-green-500  text-white font-light px-1  rounded-full">
                                    admin
                                </button></li>
                        @endif


                    </ul>
                </div>
                <div class="mt-6 flex justify-end space-x-4 ">
                    <div>
                        <button data-modal='centeredModal' href="javascript:void(0);"
                            onclick="EditUser({{ Auth::user()->id }});"
                            class="modal-trigger px-4 py-2 mx-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</button>
                    </div>

                    <form action="{{ url('/user/delete/') }}" method="get"
                        onsubmit="return confirm('Are you sure you want to delete this Account ?');">
                        @csrf
                        @method('GET')
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                        <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit modal  --}}
    <div id='centeredModal' class="modal-wrapper">
        <div class="overlay close-modal"></div>
        <div class="modal modal-centered">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        Edit User Profile
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                            <i class="fas fa-times text-gray-700"></i>
                        </span>
                    </div>
                </div>
                <!-- Modal content -->
                <form class="w-full" method="POST" action="{{ route('admin.updateUser') }}">
                    @csrf
                    <input type="hidden" name="editId" id="editId">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                User Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="u-name" type="text" name="name">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Email
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="email" name="email" type="text">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Address
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="address" name="address" type="text">

                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                Contact
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="contact" type="text" name="contact">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                Designation
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="designation" type="text" name="designation">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-state" id="role" name="role">
                                User Role
                            </label>
                            <div class="relative">
                                <select
                                    class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="u-role" name="role">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>

                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5">
                        <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'
                            type="submit"> Submit
                        </button>
                        <span
                            class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                            Close
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    function EditUser(id) {
        // Get the CSRF token from the page's meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Alert the ID (this line should be outside the $.ajax object)

        $.ajax({
            // alert('sajid');
            url: "{{ route('admin.editUser') }}",
            type: "POST",
            data: {
                id: id,
                _token: csrfToken // Include the CSRF token in the data
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                if (response.status === 200 && response.user) {
                    $('#editId').val(response.user.id);
                    $('#u-name').val(response.user.name);
                    $('#email').val(response.user.email);
                    $('#designation').val(response.user.designation);
                    $('#contact').val(response.user.contact);
                    $('#address').val(response.user.address);
                    // Update the status dropdown in the edit modal
                    $('#u-role').html('<option value="1" ' + (response.user
                            .role == 1 ? 'selected' : '') + '>Admin</option>' +
                        '<option value="0" ' + (response.user.role == 0 ?
                            'selected' : '') + '>User</option>');
                }
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>
