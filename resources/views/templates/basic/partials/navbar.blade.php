<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                @if(!empty($exam->title) && Route::current()->getName() == 'user.exam.perticipate' )
                @lang('Exam Name') : {{__($exam->title)}} &nbsp; @lang('Total Question') : {{$exam->questions->count()}}
                @else
                {{__($page_title)}}
                @endif
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <div class="body-header-right dropdown">
        <button type="button" class="" data-toggle="dropdown" data-display="static" aria-haspopup="true"
            aria-expanded="false">
            <div class="header-user-area d-flex flex-wrap align-items-center justify-content-between">
                <div class="header-user-content mr-4">
                    <span>@lang('Balance : '){{getAmount(auth()->user()->balance)}} {{$general->cur_text}}</span>
                </div>

                <div class="header-user-thumb">
                    <a href="#0"><img
                            src="{{isset(auth()->user()->image) ? url('/assets/images/user/profile/'.auth()->user()->image) : asset('assetsnew/images/default-image.png') }}"
                            alt="user"></a>
                </div>

                <div class="header-user-content">
                    <span>{{auth()->user()->username}}</span>
                </div>
                <span class="header-user-icon"><i class="las la-chevron-circle-down"></i></span>
            </div>
        </button>
        <div class="dropdown-menu dropdown-menu--sm p-0 border-0 dropdown-menu-right">
            <a href="{{route('user.change-password')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-key"></i>
                <span class="dropdown-menu__caption">@lang('Change Password')</span>
            </a>
            <a href="{{route('user.profile-setting')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-user-circle"></i>
                <span class="dropdown-menu__caption">@lang('Profile Settings')</span>
            </a>
            <a href="{{route('user.logout')}}" class="dropdown-menu__item d-flex align-items-center px-3 py-2">
                <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                <span class="dropdown-menu__caption">@lang('Logout')</span>
            </a>
        </div>
    </div>
</nav>
<!-- /.navbar -->