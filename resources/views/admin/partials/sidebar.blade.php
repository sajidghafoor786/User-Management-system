<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

  <ul class="list-reset flex flex-col">
      <li class=" w-full h-full py-3 px-2 border-b border-light-border  {{ Request::is('admin/dashboard') ? 'bg-white' : '' }}">
          <a href="{{route('admin.dashboard')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
              <i class="fas fa-tachometer-alt float-left mx-2"></i>
              Dashboard
              <span><i class="fas fa-angle-right float-right"></i></span>
          </a>
      </li>
     
      <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('admin/manage-user') ? 'bg-white' : '' }}">
          <a href="{{route('admin.manageUser')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
             <i class="fas fa-user-cog float-left mx-2"></i>
              Manage User
              <span><i class="fa fa-angle-right float-right"></i></span>
          </a>
      </li>
   
      <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('admin/company_profiles') ? 'bg-white' : '' }}">
          <a href="{{route('admin.index')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
              <i class="fas fa-building float-left mx-2"></i>
              Company profile
              <span><i class="fa fa-angle-right float-right"></i></span>
          </a>
      </li>
      <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('admin/password/change') ? 'bg-white' : '' }}">
          <a href="{{route('admin.password.change')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
             <i class="fas fa-key float-left mx-2"></i>
             Change Password
              <span><i class="fa fa-angle-right float-right"></i></span>
          </a>
      </li>
      <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('admin/users') ? 'bg-white' : '' }}">
          <a href="{{route('admin.users.index')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
             <i class="fas fa-user float-left mx-2"></i>
             User profile
              <span><i class="fa fa-angle-right float-right"></i></span>
          </a>
      </li>
      <li class="w-full h-full py-3 px-2 border-b border-light-border {{ Request::is('admin/company_profiles') ? 'bg-white' : '' }}">
          <a href="{{route('admin.index')}}"
             class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
             <i class="fas fa-sign-out-alt  float-left mx-2"></i>
              Logout
              <span><i class="fa fa-angle-right float-right"></i></span>
          </a>
      </li>
    
  </ul>

</aside>