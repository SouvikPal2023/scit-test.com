<div class="sidebar {{ sidebarVariation()['selector'] }} {{ sidebarVariation()['sidebar'] }} {{ @sidebarVariation()['overlay'] }} {{ @sidebarVariation()['opacity'] }}"
    data-background="{{getImage('public/assets/admin/images/sidebar/2.jpg','400x800')}}">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a href="{{route('admin.dashboard')}}" class="sidebar__main-logo"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('image')"></a>
            <a href="{{route('admin.dashboard')}}" class="sidebar__logo-shape"><img
                    src="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" alt="@lang('image')"></a>
            <button type="button" class="navbar__expand"></button>
        </div>

        <div class="sidebar__menu-wrapper" id="sidebar__menuWrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{menuActive('admin.dashboard')}}">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="menu-icon las la-home"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.users*',3)}}">
                        <i class="menu-icon las la-users"></i>
                        <span class="menu-title">@lang('Manage Users')</span>

                        @if($banned_users_count > 0 || $email_unverified_users_count > 0 || $sms_unverified_users_count
                        > 0)
                        <span class="menu-badge pill bg--primary ml-auto">
                            <i class="fa fa-exclamation"></i>
                        </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.users*',2)}} ">
                        <ul>
                            <li class="sidebar-menu-item {{menuActive('admin.users.all')}} ">
                                <a href="{{route('admin.users.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('All Users')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.users.active')}} ">
                                <a href="{{route('admin.users.active')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Active Users')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{menuActive('admin.users.banned')}} ">
                                <a href="{{route('admin.users.banned')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Banned Users')</span>
                                    @if($banned_users_count)
                                    <span class="menu-badge pill bg--primary ml-auto">{{$banned_users_count}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item  {{menuActive('admin.users.emailUnverified')}}">
                                <a href="{{route('admin.users.emailUnverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Email Unverified')</span>

                                    @if($email_unverified_users_count)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$email_unverified_users_count}}</span>
                                    @endif
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.users.smsUnverified')}}">
                                <a href="{{route('admin.users.smsUnverified')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('SMS Unverified')</span>
                                    @if($sms_unverified_users_count)
                                    <span
                                        class="menu-badge pill bg--primary ml-auto">{{$sms_unverified_users_count}}</span>
                                    @endif
                                </a>
                            </li>


                            <li class="sidebar-menu-item {{menuActive('admin.users.email.all')}}">
                                <a href="{{route('admin.users.email.all')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Send Email')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{menuActive('admin.users.invite.email.index')}}">

                                <a href="{{route('admin.users.invite.email.index')}}" class="nav-link">

                                    <i class="menu-icon las la-dot-circle"></i>

                                    <span class="menu-title">@lang('Invite User Email')</span>

                                </a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item  {{menuActive('admin.exam.group_factor')}}">

                    <a href="{{route('admin.exam.group_factor')}}" class="nav-link">

                        <i class="menu-icon las la-list"></i>

                        <span class="menu-title">@lang('Factor Group ')</span>

                    </a>

                </li>

                <li class="sidebar-menu-item  {{menuActive('admin.exam.categories')}}">

                    <a href="{{route('admin.exam.categories')}}" class="nav-link">

                        <i class="menu-icon las la-list"></i>

                        <span class="menu-title">@lang('Factors')</span>

                    </a>

                </li>

                {{--<li class="sidebar-menu-item  {{menuActive('admin.exam.subjects')}}">

                <a href="{{route('admin.exam.subjects')}}" class="nav-link">

                    <i class="menu-icon las la-book-reader"></i>

                    <span class="menu-title">@lang('Manage Subject')</span>

                </a>

                </li>--}}

                <li class="sidebar-menu-item  {{menuActive('admin.exam.genders')}}">

                    <a href="{{route('admin.exam.genders')}}" class="nav-link">

                        <i class="menu-icon las la-book-reader"></i>

                        <span class="menu-title">@lang('Manage Gender')</span>

                    </a>

                </li>

                <li class="sidebar-menu-item  {{menuActive('admin.contact')}}">

                    <a href="{{route('admin.contact.index')}}" class="nav-link">

                        <i class="menu-icon las la-id-card-alt"></i>

                        <span class="menu-title">@lang('Contact Messages')</span>

                    </a>

                </li>

                <li
                    class="sidebar-menu-item  {{menuActive(['admin.exam.all','admin.exam.edit','admin.exam.add','admin.question.*'])}}">
                    <a href="{{route('admin.exam.all')}}" class="nav-link">
                        <i class="menu-icon las la-swatchbook"></i>
                        <span class="menu-title">@lang('Manage Tests')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item  {{menuActive(['admin.score.all','admin.score.edit','admin.score.add'])}}">

                    <a href="{{route('admin.score.add')}}" class="nav-link">

                        <i class="menu-icon las la-swatchbook"></i>

                        <span class="menu-title">@lang('Manage Score')</span>

                    </a>

                </li>
                {{--  <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.written*',3)}}">
                <i class="menu-icon fas fa-pen-alt"></i>
                <span class="menu-title">@lang('Written Tests')</span>
                @if ($pending_written > 0)
                <span class="menu-badge pill bg--primary ml-auto"><i class="las la-exclamation"></i></span>
                @endif

                </a>
                <div class="sidebar-submenu {{menuActive('admin.written*',2)}} ">
                    <ul>

                        <li class="sidebar-menu-item {{menuActive('admin.written.pending.all')}} ">
                            <a href="{{route('admin.written.pending.all')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('All Pending Scripts')</span>
                                @if ($pending_written > 0)
                                <span class="menu-badge pill bg--primary ml-auto">{{$pending_written}}</span>
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{menuActive('admin.written.pending.exam')}} ">
                            <a href="{{route('admin.written.pending.exam')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Pending Test')</span>

                            </a>
                        </li>

                        <li class="sidebar-menu-item {{menuActive('admin.written.reviewed.exam')}} ">
                            <a href="{{route('admin.written.reviewed.exam')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Reviewed Test')</span>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>

                <li class="sidebar-menu-item  {{menuActive('admin.exam.certificate*')}}">
                    <a href="{{route('admin.exam.certificate')}}" class="nav-link">
                        <i class="menu-icon las la-certificate"></i>
                        <span class="menu-title">@lang('Test Certificate')</span>
                    </a>
                </li>
                <li class="sidebar-menu-item  {{menuActive('admin.coupon*')}}">
                    <a href="{{route('admin.coupon.all')}}" class="nav-link">
                        <i class="menu-icon las la-percentage"></i>
                        <span class="menu-title">@lang('Manage Coupons')</span>
                    </a>
                </li> --}}

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.gateway*',3)}}">
                        <i class="menu-icon las la-credit-card"></i>
                        <span class="menu-title">@lang('Payment Gateways')</span>

                    </a>
                    <div class="sidebar-submenu {{menuActive('admin.gateway*',2)}} ">
                        <ul>

                            <li class="sidebar-menu-item {{menuActive('admin.gateway.automatic.index')}} ">
                                <a href="{{route('admin.gateway.automatic.index')}}" class="nav-link">
                                    <i class="menu-icon las la-dot-circle"></i>
                                    <span class="menu-title">@lang('Automatic Gateways')</span>
                                </a>
                            </li>
                            {{--<li class="sidebar-menu-item {{menuActive('admin.gateway.manual.index')}} ">
                            <a href="{{route('admin.gateway.manual.index')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Manual Gateways')</span>
                            </a>
                </li>--}}
            </ul>
        </div>
        </li>

        <li class="sidebar-menu-item sidebar-dropdown">
            <a href="javascript:void(0)" class="{{menuActive('admin.deposit*',3)}}">
                <i class="menu-icon las la-credit-card"></i>
                <span class="menu-title">@lang('Deposits')</span>
                @if(0 < $pending_deposits_count) <span class="menu-badge pill bg--primary ml-auto">
                    <i class="fa fa-exclamation"></i>
                    </span>
                    @endif
            </a>
            <div class="sidebar-submenu {{menuActive('admin.deposit*',2)}} ">
                <ul>

                    <li class="sidebar-menu-item {{menuActive('admin.deposit.pending')}} ">
                        <a href="{{route('admin.deposit.pending')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Pending Deposits')</span>
                            @if($pending_deposits_count)
                            <span class="menu-badge pill bg--primary ml-auto">{{$pending_deposits_count}}</span>
                            @endif
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.deposit.approved')}} ">
                        <a href="{{route('admin.deposit.approved')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Approved Deposits')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.deposit.successful')}} ">
                        <a href="{{route('admin.deposit.successful')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Successful Deposits')</span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item {{menuActive('admin.deposit.rejected')}} ">
                        <a href="{{route('admin.deposit.rejected')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Rejected Deposits')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.deposit.list')}} ">
                        <a href="{{route('admin.deposit.list')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('All Deposits')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{--  --}}
        <li class="sidebar-menu-item sidebar-dropdown">
            <a href="javascript:void(0)" class="{{menuActive('admin.resources*',3)}}">
                <i class="menu-icon las la-credit-card"></i>
                <span class="menu-title">@lang('Resources')</span>
                @if(0 < $pending_deposits_count) <span class="menu-badge pill bg--primary ml-auto">
                    <i class="fa fa-exclamation"></i>
                    </span>
                    @endif
            </a>
            <div class="sidebar-submenu {{menuActive('admin.resources*',2)}} ">
                <ul>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.announcement')}} ">
                        <a href="{{route('admin.resources.announcement')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Announcement')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.news_letter')}} ">
                        <a href="{{route('admin.resources.news_letter')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('News Letter')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.about_the_app')}} ">
                        <a href="{{route('admin.resources.about_the_app')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('About The App')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.upcoming_event')}} ">
                        <a href="{{route('admin.resources.upcoming_event')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Upcoming Event')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.thank_you_sponser')}} ">
                        <a href="{{route('admin.resources.thank_you_sponser')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Thank You Sponser')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.health_recommendation')}} ">
                        <a href="{{route('admin.resources.health_recommendation')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Health Recommendation')</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item {{menuActive('admin.resources.guideline_of_who')}} ">
                        <a href="{{route('admin.resources.guideline_of_who')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Guideline of WHO')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        {{--  --}}
        <li class="sidebar-menu-item  {{menuActive(['admin.discussion'])}}">

            <a href="{{route('admin.discussion')}}" class="nav-link">

                <i style="color: white;" class='fas fa-x'>&#xf500;</i>&nbsp;&nbsp;&nbsp;&nbsp;

                <span class="menu-title">@lang('Discussion')</span>

            </a>

        </li>

        <li class="sidebar-menu-item ">

            <a href='#/' id='download_result' class="nav-link">

                <i class="menu-icon las la-download"></i>

                <span class="menu-title">@lang('Download Result')</span>

            </a>

        </li>

        {{-- <li class="sidebar-menu-item sidebar-dropdown">
                    <a href="javascript:void(0)" class="{{menuActive('admin.ticket*',3)}}">
        <i class="menu-icon la la-ticket"></i>
        <span class="menu-title">@lang('Support Ticket') </span>
        @if(0 < $pending_ticket_count) <span class="menu-badge pill bg--primary ml-auto">
            <i class="fa fa-exclamation"></i>
            </span>
            @endif
            </a>
            <div class="sidebar-submenu {{menuActive('admin.ticket*',2)}} ">
                <ul>

                    <li class="sidebar-menu-item {{menuActive('admin.ticket')}} ">
                        <a href="{{route('admin.ticket')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('All Ticket')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('admin.ticket.pending')}} ">
                        <a href="{{route('admin.ticket.pending')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Pending Ticket')</span>
                            @if($pending_ticket_count)
                            <span class="menu-badge pill bg--primary ml-auto">{{$pending_ticket_count}}</span>
                            @endif
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('admin.ticket.closed')}} ">
                        <a href="{{route('admin.ticket.closed')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Closed Ticket')</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item {{menuActive('admin.ticket.answered')}} ">
                        <a href="{{route('admin.ticket.answered')}}" class="nav-link">
                            <i class="menu-icon las la-dot-circle"></i>
                            <span class="menu-title">@lang('Answered Ticket')</span>
                        </a>
                    </li>
                </ul>
            </div>
            </li>


            <li class="sidebar-menu-item sidebar-dropdown">
                <a href="javascript:void(0)" class="{{menuActive('admin.report*',3)}}">
                    <i class="menu-icon la la-list"></i>
                    <span class="menu-title">@lang('Report') </span>
                </a>
                <div class="sidebar-submenu {{menuActive('admin.report*',2)}} ">
                    <ul>
                        <li
                            class="sidebar-menu-item {{menuActive(['admin.report.transaction','admin.report.transaction.search'])}}">
                            <a href="{{route('admin.report.transaction')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Transaction Log')</span>
                            </a>
                        </li>

                        <li
                            class="sidebar-menu-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
                            <a href="{{route('admin.report.login.history')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Login History')</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="sidebar-menu-item  {{menuActive('admin.subscriber.index')}}">
                <a href="{{route('admin.subscriber.index')}}" class="nav-link"
                    data-default-url="{{ route('admin.subscriber.index') }}">
                    <i class="menu-icon las la-thumbs-up"></i>
                    <span class="menu-title">@lang('Subscribers') </span>
                </a>
            </li>

            --}}
            <li class="sidebar__menu-header">@lang('Settings')</li>

            <li class="sidebar-menu-item {{menuActive('admin.setting.index')}}">
                <a href="{{route('admin.setting.index')}}" class="nav-link">
                    <i class="menu-icon las la-life-ring"></i>
                    <span class="menu-title">@lang('General Setting')</span>
                </a>
            </li>
            {{--
                <li class="sidebar-menu-item {{menuActive('admin.setting.logo_icon')}}">
            <a href="{{route('admin.setting.logo_icon')}}" class="nav-link">
                <i class="menu-icon las la-images"></i>
                <span class="menu-title">@lang('Logo Icon Setting')</span>
            </a>
            </li>

            <li class="sidebar-menu-item {{menuActive('admin.extensions.index')}}">
                <a href="{{route('admin.extensions.index')}}" class="nav-link">
                    <i class="menu-icon las la-cogs"></i>
                    <span class="menu-title">@lang('Extensions')</span>
                </a>
            </li>

            <li class="sidebar-menu-item  {{menuActive(['admin.language.manage','admin.language.key'])}}">
                <a href="{{route('admin.language.manage')}}" class="nav-link"
                    data-default-url="{{ route('admin.language.manage') }}">
                    <i class="menu-icon las la-language"></i>
                    <span class="menu-title">@lang('Language') </span>
                </a>
            </li>

            <li class="sidebar-menu-item {{menuActive('admin.seo')}}">
                <a href="{{route('admin.seo')}}" class="nav-link">
                    <i class="menu-icon las la-globe"></i>
                    <span class="menu-title">@lang('SEO Manager')</span>
                </a>
            </li>

            <li class="sidebar-menu-item sidebar-dropdown">
                <a href="javascript:void(0)" class="{{menuActive('admin.email.template*',3)}}">
                    <i class="menu-icon la la-envelope-o"></i>
                    <span class="menu-title">@lang('Email Manager')</span>
                </a>
                <div class="sidebar-submenu {{menuActive('admin.email.template*',2)}} ">
                    <ul>

                        <li class="sidebar-menu-item {{menuActive('admin.email.template.global')}} ">
                            <a href="{{route('admin.email.template.global')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Global Template')</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-menu-item {{menuActive(['admin.email.template.index','admin.email.template.edit'])}} ">
                            <a href="{{ route('admin.email.template.index') }}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Email Templates')</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item {{menuActive('admin.email.template.setting')}} ">
                            <a href="{{route('admin.email.template.setting')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('Email Configure')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-menu-item sidebar-dropdown">
                <a href="javascript:void(0)" class="{{menuActive('admin.sms.template*',3)}}">
                    <i class="menu-icon la la-mobile"></i>
                    <span class="menu-title">@lang('SMS Manager')</span>
                </a>
                <div class="sidebar-submenu {{menuActive('admin.sms.template*',2)}} ">
                    <ul>
                        <li class="sidebar-menu-item {{menuActive('admin.sms.template.global')}} ">
                            <a href="{{route('admin.sms.template.global')}}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('API Setting')</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-menu-item {{menuActive(['admin.sms.template.index','admin.sms.template.edit'])}} ">
                            <a href="{{ route('admin.sms.template.index') }}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">@lang('SMS Templates')</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            --}}
            {{-- <li class="sidebar__menu-header">@lang('TEMPLATES')</li> --}}


            <li class="sidebar__menu-header">@lang('Frontend Manager')</li>

            {{-- <li class="sidebar-menu-item {{menuActive('admin.frontend.templates')}}">
            <a href="{{route('admin.frontend.templates')}}" class="nav-link ">
                <i class="menu-icon la la-html5"></i>
                <span class="menu-title">@lang('Manage Templates')</span>
            </a>
            </li> --}}

            <li class="sidebar-menu-item {{menuActive('admin.frontend.manage.pages')}}">
                <a href="{{route('admin.frontend.manage.pages')}}" class="nav-link ">
                    <i class="menu-icon la la-list"></i>
                    <span class="menu-title">@lang('Manage Pages')</span>
                </a>
            </li>

            <li class="sidebar-menu-item {{menuActive('admin.page')}}">
                <a href="{{route('admin.page.index')}}" class="nav-link ">
                    <i class="menu-icon la la-list"></i>
                    <span class="menu-title">@lang('Manage Pages(NEW)')</span>
                </a>
            </li>


            <li class="sidebar-menu-item sidebar-dropdown">
                <a href="javascript:void(0)"
                    class="{{menuActive('admin.frontend.sections*',3)}} {{ menuActive('admin.testimonial*',3)}} {{ menuActive('admin.faq*',3)}}{{ menuActive('admin.banner*',3)}}">
                    <i class="menu-icon la la-html5"></i>
                    <span class="menu-title">@lang('Manage Section')</span>
                </a>
                <div
                    class="sidebar-submenu {{menuActive('admin.frontend.sections*',2)}}{{ menuActive('admin.testimonial*',2)}} {{ menuActive('admin.faq*',2)}}{{ menuActive('admin.banner*',2)}} ">
                    <ul>
                        <li class="sidebar-menu-item  @if(collect(request()->segments())->last() == 'testimonial') active @endif"">

                            <a href=" {{route('admin.testimonial.index')}}" class="nav-link">

                            <i class="menu-icon las la-dot-circle"></i>

                            <span class="menu-title">@lang('Manage Testimonials')</span>

                            </a>

                        </li>

                        <li class="sidebar-menu-item  @if(collect(request()->segments())->last() == 'faq') active @endif"">

                            <a href=" {{route('admin.faq.index')}}" class="nav-link">

                            <i class="menu-icon las la-dot-circle"></i>

                            <span class="menu-title">@lang('Manage FAQs')</span>

                            </a>

                        </li>

                        <li
                            class="sidebar-menu-item  @if(collect(request()->segments())->last() == 'banner') active @endif">

                            <a href="{{route('admin.banner.index')}}" class="nav-link">

                                <i class="menu-icon las la-dot-circle"></i>

                                <span class="menu-title">@lang('Manage Banners')</span>

                            </a>

                        </li>
                        @php
                        $lastSegment = collect(request()->segments())->last();
                        @endphp
                        @foreach(getPageSections(true) as $k => $secs)
                        @if($secs['builder'])
                        <li class="sidebar-menu-item  @if($lastSegment == $k) active @endif ">
                            <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                                <i class="menu-icon las la-dot-circle"></i>
                                <span class="menu-title">{{__($secs['name'])}}</span>
                            </a>
                        </li>
                        @endif
                        @endforeach


                    </ul>
                </div>
            </li>
            {{-- <li class="sidebar__menu-header">@lang('CONTENT MANAGER')</li> --}}

            </ul>
    </div>
</div>
</div>
<!-- sidebar end -->
@push('script')
<script>
$("#download_result").on('click', function() {
    swal({
        position: 'top-end',
        title: 'Are you sure you want to download result in xlsx format',
        icon: "info",
        showCancelButton: true,
        // button: 'Okay',
        // button: 'Cancel',
        // cancelButtonText: "Cancel",
        // confirmButtonText: "CONFIRM",
        buttons: [true, "Okay"],
        dangerMode: false,
    }).then(
        function(isConfirm) {
            if (isConfirm) {
                let url = '{{ url("/admin/downloadResult") }}';
                // url = url.replace(':exam_id', exam_id);
                window.location.href = url
                // $.ajax({
                //     type: 'GET',
                //     url: '{{ url("/admin/downloadResult") }}',                        
                //     success: function (params) {
                //         console.log(params)
                //     }
                // })
                console.log('done')
            }
        });
})
</script>
@endpush