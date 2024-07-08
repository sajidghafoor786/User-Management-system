<div class="flex flex-col">
    <!-- Stats Row Starts Here -->
    @include('admin.message')
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div
            class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                   {{$totalEmp}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Total Employees
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                   {{$totaladmin}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Admin Role
                </a>
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                   {{$totaluser}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    User Role
                </a>
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                   {{$totalcustomer}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Total Clients
                </a>
            </div>
        </div>
    </div>

 
</div>
