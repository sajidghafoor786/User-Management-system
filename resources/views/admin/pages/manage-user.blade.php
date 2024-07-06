@extends('admin.layouts.app')
@section('content')
    <div class="flex flex-col">
        @include('admin.message')
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                    Dashboard/Manage-user
                </div>
                <div class="p-3">
                    <table class="table-responsive w-full table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                            <tr>
                                <th class="border w-1/8 px-4 py-2">User Id</th>
                                <th class="border w-1/7 px-4 py-2">User Name</th>
                                <th class="border w-1/6 px-4 py-2">Email</th>
                                <th class="border w-1/6 px-4 py-2">Designation</th>
                                <th class="border w-1/6 px-4 py-2">Contact</th>
                                <th class="border w-1/7 px-4 py-2">Address</th>
                                <th class="border w-1/7 px-4 py-2">role</th>
                                <th class="border w-1/6 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->id }}</td>
                                    <td class="border px-4 py-2">{{ $item->name }}</td>
                                    <td class="border px-4 py-2">{{ $item->email }}</td>
                                    @if ($item->designation != null)
                                        <td class="border px-4 py-2">{{ $item->designation }}</td>
                                    @else
                                        <td class="border px-4 py-2">N/A</td>
                                    @endif
                                    @if ($item->contact != null)
                                        <td class="border px-4 py-2">{{ $item->contact }}</td>
                                    @else
                                        <td class="border px-4 py-2">N/A</td>
                                    @endif
                                    @if ($item->address != null)
                                        <td class="border px-4 py-2">{{ $item->address }}</td>
                                    @else
                                        <td class="border px-4 py-2">N/A</td>
                                    @endif
                                    @if ($item->role == '0')
                                        <td class="border px-4 py-2">
                                            <button class="bg-green-600  text-white font-light px-1  rounded-full">
                                                User
                                            </button>
                                        </td>
                                    @else
                                        <td class="border px-4 py-2">
                                            <button class="bg-red-500  text-white font-light px-1  rounded-full">
                                                admin
                                            </button>
                                        </td>
                                    @endif


                                    <td class="border px-4 py-2">

                                        <a href="javascript:void(0);" onclick="EditUser({{ $item->id }});"
                                            data-modal='centeredModal'
                                            class=" modal-trigger bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                            <i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/user/delete', $item->id)}}"   class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" >
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/Grid Form-->
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
                <form  class="w-full" method="POST" action="{{route('admin.updateUser')}}">
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
                                    id="u-role" name="u-role">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>

                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5">
                        <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded' type="submit"> Submit
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
