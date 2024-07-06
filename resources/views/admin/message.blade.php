@if (Session::has('success'))
    {{-- <div role="alert" class="mb-2">
        <div class="bg-green-500 text-green font-bold rounded-t px-4 py-2">
            Success
        </div>
        <div class="border border-t-0 border-red-300 rounded-b bg-green-300 px-4 py-3 text-green-800">
            <p>{{ Session::get('success') }}</p>
        </div>
    </div> --}}
    <div class="bg-green-300 border-l-4 mb-2 border-green-500 text-green-800 p-4" role="alert">
        <p class="font-bold">Success</p>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if (Session::has('error'))
    <div class="bg-red-300 border-l-4 mb-2 border-red-500 text-red-800 p-4" role="alert">
        <p class="font-bold">Error!</p>
        <p>{{ Session::get('error') }}</p>
    </div>
@endif
