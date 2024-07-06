@extends('admin.layouts.app')

@section('content')
    @include('admin.message')
    @if (!empty($companyProfile))
        <div class="container mx-auto py-12">
            <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                <div style="height:300px;">
                    <div class="bg-cover bg-center h-56 p-4 "
                        style="background-image: url('{{ $companyProfile->logo ? asset('admin-assets/picture/' . $companyProfile->logo) : 'https://via.placeholder.com/150' }}');width: 100%; height: 100%; background-repeat: no-repeat;background-size: 800px 300px;">
                        <div class="flex justify-end">
                            @if ($companyProfile->logo)
                                <img src="{{ asset('admin-assets/picture/' . $companyProfile->logo) }}"
                                    class="h-24 w-24 bg-white rounded-full shadow-lg border-4 border-white -mt-12 "
                                    alt="Company Logo" style="">
                            @else
                                <div class="h-24 w-24 bg-white rounded-full shadow-lg border-4 border-white -mt-12"></div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <h2 class="text-3xl font-bold text-gray-800">{{ $companyProfile->name }}</h2>
                    <p class="text-gray-600 mt-4">{{ $companyProfile->description }}</p>
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-700">Contact Information</h4>
                        <ul class="mt-2 text-gray-600">
                            <li><strong>Address:</strong> {{ $companyProfile->address }}</li>
                            <li><strong>Phone:</strong> {{ $companyProfile->phone }}</li>
                            <li><strong>Email:</strong> {{ $companyProfile->email }}</li>
                            <li><strong>Website:</strong> <a href="{{ $companyProfile->website }}"
                                    class="text-blue-500 hover:underline">{{ $companyProfile->website }}</a></li>
                        </ul>
                    </div>
                    <div class="mt-6 flex justify-end space-x-4 ">
                        <div>
                            <button data-modal='centeredModal' href="javascript:void(0);"
                                onclick="EditCompanyProfile({{ $companyProfile->id }});"
                                class="modal-trigger px-4 py-2 mx-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</button>
                        </div>

                        <form action="{{route('admin.destroy')}}" method="post"
                            onsubmit="return confirm('Are you sure you want to delete this profile?');">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $companyProfile->id}}">
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="mt-6 flex justify-end space-x-4 ">
            <a data-modal='addModal'
                class=" cursor-pointer modal-trigger px-4 py-2 mx-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Company
                Profile</a>

        </div>
    @endif
    {{-- edit company profile  --}}
    <div id='centeredModal' class="modal-wrapper">
        <div class="overlay close-modal"></div>
        <div class="modal modal-centered">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        Update Company Profile
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                            <i class="fas fa-times text-gray-700"></i>
                        </span>
                    </div>
                </div>
                <!-- Modal content -->
                <form class="w-full" method="POST" action="{{ route('admin.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="editId" id="editId">
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="name" type="text" name="name">

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
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Description
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="description" name="description" type="text">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Logo
                            </label>
                            @if($companyProfile->logo)
                            <img src="{{ asset('admin-assets/picture/' . $companyProfile->logo) }}" class="h-24 w-24 rounded-full mb-4 " alt="Current Logo">
                           
                           <input
                               class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                               id="logo" name="logo" type="file">
                            @endif


                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                Contact
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="phone" type="text" name="phone">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                website
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="website" type="text" name="website">
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
    {{-- create  company profile  --}}
    <div id='addModal' class="modal-wrapper">
        <div class="overlay close-modal"></div>
        <div class="modal modal-centered">
            <div class="modal-content shadow-lg p-5">
                <div class="border-b p-2 pb-3 pt-0 mb-4">
                    <div class="flex justify-between items-center">
                        Create Company Profile
                        <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                            <i class="fas fa-times text-gray-700"></i>
                        </span>
                    </div>
                </div>
                <!-- Modal content -->
                <form class="w-full" method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="name" type="text" name="name">

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
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Description
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="description" name="description" type="text">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-password">
                                Logo
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="logo" name="logo" type="file">

                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                Contact
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="phone" type="text" name="phone">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                for="grid-city">
                                website
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                id="website" type="text" name="website">
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
    function EditCompanyProfile(id) {
        // Get the CSRF token from the page's meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Alert the ID (this line should be outside the $.ajax object)

        // alert('sajid');
        $.ajax({
            url: "{{ route('admin.edit') }}",
            type: "post",
            data: {
                id: id,
                _token: csrfToken // Include the CSRF token in the data
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                if (response.status === 200 && response.companyProfile) {
                    $('#editId').val(response.companyProfile.id);
                    $('#name').val(response.companyProfile.name);
                    $('#email').val(response.companyProfile.email);
                    $('#description').val(response.companyProfile.description);
                    $('#phone').val(response.companyProfile.phone);
                    $('#address').val(response.companyProfile.address);
                    $('#website').val(response.companyProfile.website);
                    $('#logo').val(response.companyProfile.logo);

                }
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>
