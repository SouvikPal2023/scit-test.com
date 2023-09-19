<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <div class="logo-env">
            <div class="logo">
                <a href="{{url('/')}}">
                    <!-- <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" width="120" alt="logo"> -->
                    <img src="{{asset('assets/images/logoIcon/logo.png')}}" width="120" alt="logo">
                </a>
            </div>
            <div class="sidebar-collapse">
                <a href="#/" class="sidebar-collapse-icon">
                    <i class="las la-bars"></i>
                </a>
            </div>

            <div class="sidebar-mobile-menu">
                <a href="#" class="with-animation">
                    <i class="las la-bars"></i>
                </a>
            </div>
        </div>
        <ul id="sidebar-main-menu" class="sidebar-main-menu">
            {{-- <li class="sidebar-single-menu nav-item {{menuActive('user.home')}}">
                <a href="{{route('user.home')}}">
                    <i class="fas fa-home"></i>
                    <span class="title">@lang('Dashboard')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.exam.list')}}">
                <a href="{{route('user.exam.list')}}">
                    <i class="las la-list"></i>
                    <span class="title">@lang('Test List')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.exam.mcq.history')}}">
                <a href="{{route('user.exam.mcq.history')}}">
                    <i class="fas fa-tasks"></i>
                    <span class="title">@lang('MCQ Test History')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.exam.written.history')}}">
                <a href="{{route('user.exam.written.history')}}">
                    <i class="fas fa-pen-fancy"></i>
                    <span class="title">@lang('Written Test History')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.deposit')}}">
                <a href="{{route('user.deposit')}}">
                    <i class="las la-wallet"></i>
                    <span class="title">@lang('Deposit')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.deposit.history')}}">
                <a href="{{route('user.deposit.history')}}">
                    <i class="las la-history"></i>
                    <span class="title">@lang('Deposit History')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.trx.history')}}">
                <a href="{{route('user.trx.history')}}">
                    <i class="las la-history"></i>
                    <span class="title">@lang('Transaction History')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.profile-setting')}}">
                <a href="{{route('user.profile-setting')}}">
                    <i class="las la-user-circle"></i>
                    <span class="title">@lang('Profile Setting')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.change-password')}}">
                <a href="{{route('user.change-password')}}">
                    <i class="las la-key"></i>
                    <span class="title">@lang('Change Password')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.invite.email.index')}}">
                <a href="{{route('user.invite.email.index')}}">
                    <i class="las la-mail-bulk"></i>
                    <span class="title">@lang('Invite User Email')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.twofactor')}}">
                <a href="{{route('user.twofactor')}}">
                    <i class="las la-lock-open"></i>
                    <span class="title">@lang('2FA Security')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive(['ticket','ticket.open','ticket.view'])}}">
                <a href="{{route('ticket')}}">
                    <i class="fas fa-ticket-alt"></i>
                    <span class="title">@lang('Support Ticket')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{(Request::path() == 'user/faq')?'active':''}}">
                <a href="{{url('user/faq')}}">
                    <i class="fa fa-question"></i>
                    <span class="title">@lang('FAQ') </span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{(Request::path() == 'user/privacypolicy')?'active':''}}">
                <a href="{{url('user/privacypolicy')}}">
                    <i class="fas fa-file-contract"></i>
                    <span class="title">@lang('Privacy Policy')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{(Request::path() == 'user/resources')?'active':''}}">
                <a href="#/">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">@lang('Resources')</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.logout')}}">
                <a href="{{route('user.logout')}}">
                    <i class="las la-sign-out-alt"></i>
                    <span class="title">@lang('Logout')</span>
                </a>
            </li> --}}
            <li class="sidebar-single-menu nav-item {{menuActive('user.introduction')}}">
                <a href="{{route('user.introduction')}}">
                    <i style="font-size: large;" class="fa fa-info-circle fa-x"></i>
                    <span class="title">How it Works</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.exam.list')}}">
                <a href="{{route('user.exam.list')}}">
                    <i style="font-size: large;" class="fas fa-book-reader fa-x"></i>
                    <span class="title">Take Test</span>
                </a>
            </li>
            {{-- <li class="sidebar-single-menu nav-item {{menuActive('user.test.history')}}">
                <a href="{{route('user.test.history')}}">
                    <i style="font-size: large;" class="fa fa-history fa-x" aria-hidden="true"></i>
                    <span class="title">Test History</span>
                </a>
            </li> --}}
            <li class="sidebar-single-menu nav-item {{menuActive('user.exam.mcq.history')}}">
                <a href="{{route('user.exam.mcq.history')}}">
                    <i style="font-size: large;" class="fa fa-history fa-x" aria-hidden="true"></i>
                    <span class="title">Test History</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.facilitators')}}">
                <a href="{{route('user.facilitators')}}">
                    <i style="font-size: large;" class="fas fa-wallet fa-x" aria-hidden="true"></i>
                    <span class="title">Facilitators</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.profile-setting')}}">
                <a href="{{route('user.profile-setting')}}">
                    <i style="font-size: large;" class="las la-user-circle"></i>
                    <span class="title">Profile Settings</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.invite.email.index')}}">
                <a href="{{route('user.invite.email.index')}}">
                    <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>
                    <span class="title">Invite a Friend</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.discussion')}}">
                <a href="{{route('user.discussion')}}">
                    <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>
                    <span class="title">Discussion</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{(Request::path() == 'faq')?'active':''}}">
                <a href="{{route('faq')}}">
                    <i style="font-size: large;" class="fa fa-question fa-x"></i>
                    <span class="title">FAQ</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{(Request::path() == 'user/privacypolicy')?'active':''}}">
                <a href="{{url('user/privacypolicy')}}">
                    <i style="font-size: large;" class="fas fa-file-contract fa-x"></i>
                    <span class="title">Privacy Policy</span>
                </a>
            </li>
            <li class="sidebar-single-menu nav-item {{menuActive('user.resources')}}">
                <a href="{{route('user.resources')}}">
                    <i style="font-size: large;" class='fas fa-x'>&#xf500;</i>
                    <span class="title">Resources</span>
                </a>
            </li>
            
            
        </ul>
    </div>
</div>
