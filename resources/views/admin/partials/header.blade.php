<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center">
            <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
            <h1 class="text-white p-2">User-Management-System</h1>
        </div>
        <div class="p-1 flex flex-row items-center">
            <div class="p-1 flex flex-row items-center">
                
                <a href="#" onclick="profileToggle()"
                    class="text-white p-2 no-underline hidden md:block lg:block">{{ Auth()->user()->name }}</a>
                <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                    <ul class="list-reset">
                        <li><a href="{{route('admin.users.index')}}" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                account</a></li>
                        <li>
                            <hr class="border-t mx-2 border-grey-ligght">
                        </li>
                        <li><a href="{{ route('admin.logout') }}"
                                class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
