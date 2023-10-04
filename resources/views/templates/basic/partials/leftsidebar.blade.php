 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <img src="{{asset('assetsnew/images/logo.png')}}" alt="" class="brand-image elevation-3">
         <span class="brand-text font-weight-light"></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <!-- <div class="user-panel mt-3">
          <div class="image">
            <img src="images/icon1.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Pankaj Pandey</a>
            <p>Super Administrator</p>
          </div>
        </div> -->


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{route('user.home')}}" class="nav-link {{ Route::is('user.home') ? 'active' : '' }}">
                     <i class="fas fa-home"></i>
                         <span class="title">
                             Dashboard
                         </span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.introduction')}}"
                         class="nav-link {{ Route::is('user.introduction') ? 'active' : '' }}">
                         <i style="font-size: large;" class="fa fa-info-circle fa-x"></i>
                         <span class="title">How it Works</span>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.exam.list')}}"
                         class="nav-link {{ Route::is('user.exam.list') ? 'active' : '' }}">
                         <i style="font-size: large;" class="fas fa-book-reader fa-x"></i>
                         <span class="title">Take Test</span>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.exam.mcq.history')}}"
                         class="nav-link {{ Route::is('user.exam.mcq.history') ? 'active' : '' }}">
                         <i style="font-size: large;" class="fa fa-history fa-x" aria-hidden="true"></i>
                         <span class="title">Test History</span>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.facilitators')}}"
                         class="nav-link {{ Route::is('user.facilitators') ? 'active' : '' }}">
                         <i style="font-size: large;" class="fas fa-wallet fa-x" aria-hidden="true"></i>
                         <span class="title">Facilitators</span>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.profile-setting')}}"
                         class="nav-link {{ Route::is('user.profile-setting') ? 'active' : '' }}">
                         <i style="font-size: large;" class="las la-user-circle"></i>
                         <span class="title">Profile Settings</span>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.invite.email.index')}}"
                         class="nav-link {{ Route::is('user.invite.email.index') ? 'active' : '' }}">
                         <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>

                         <span class="title">
                             Invite a Friend
                         </span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{route('user.discussion')}}"
                         class="nav-link {{ Route::is('user.discussion') ? 'active' : '' }}">
                         <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>
                         <span class="title">Discussion</span>
                     </a>
                 </li>
                 <li class="nav-item">
                 <a href="{{route('faq')}}" class="nav-link {{ Route::is('faq') ? 'active' : '' }}">
                    <i style="font-size: large;" class="fa fa-question fa-x"></i>
                    <span class="title">FAQ</span>
                </a>
                 </li>
                 <li class="nav-item">
                 <a href="{{url('user/privacypolicy')}}" class="nav-link {{ Request::segment(2)=='privacypolicy' ? 'active':''}}">
                    <i style="font-size: large;" class="fas fa-file-contract fa-x"></i>
                    <span class="title">Privacy Policy</span>
                </a>
                 </li>
                 <li class="nav-item">
                 <a href="{{route('user.resources')}}" class="nav-link {{ Route::is('user.resources') ? 'active' : '' }}">
                    <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>
                    <span class="title">Resources</span>
                </a>
                 </li>
                 
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>