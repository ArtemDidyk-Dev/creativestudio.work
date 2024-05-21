<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__left">
                <a href="{{ route('frontend.home.index') }}" class="header__logo">
                    <img width="112" height="112"  src="{{ asset('build/website/images/logo.png') }}" alt="logo">
                </a>
            </div>
            <div class="header__right">
                <nav>
                    <ul class="header__menu">
                        {!! $headerMenu !!}
                        @if (auth()->check())
                        <div class="header-btns">
                            <a href="{{ route('frontend.dashboard.chats') }}" class="header-message">
                                <img src="{{ asset('build/website/images/icons/contacts-email.svg') }}" alt="{{ language('general.title') }}">
                                <span @if ($message_count == 0) class="bg-grey" @endif>{{ $message_count }}</span>
                            </a>
                            <a href="{{ route('frontend.cabinet.notification') }}" class="header-message bell">
                                <img width="24" height="24" src="{{ asset('build/website/images/icons/icons8-bell-96.svg') }}" alt="{{ language('general.title') }}">
                                <span @if ($notification_count == 0) class="bg-grey" @endif>{{ $notification_count }}</span>
                            </a>
            
                        </div>
                        <div class="header-profile">
                            <div class="header-profile__wrapper">
                                <span class="user-img">
                                    <img src="{{ !empty(auth()->user()->profile_photo) ? asset('storage/profile/' . auth()->user()->profile_photo) : asset('storage/no-photo.jpg') }}"
                                        alt="{{ auth()->user()->name }}">
                                </span>
                                <span class="header-user-name">{{ auth()->user()->name }}</span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="drop-head">{{ language('frontend.common.account_details') }}</div>
                                <a class="dropdown-item" href="{{ route('frontend.dashboard.index') }}">
                                    {{ language('frontend.common.dashboard') }}</a>
                                <a class="dropdown-item" href="{{ route('frontend.profile.index', auth()->id()) }}">
                                    {{ language('frontend.common.view_profile') }}</a>
                                @if (\App\Services\CommonService::userRoleId(auth()->id()) == 3)
                                    <a class="dropdown-item" href="{{ route('frontend.dashboard.employer.profile-settings') }}">
                                        {{ language('frontend.common.profile_settings') }}</a>
                                @elseif(\App\Services\CommonService::userRoleId(auth()->id()) == 4)
                                    <a class="dropdown-item" href="{{ route('frontend.dashboard.freelancer.profile-settings') }}">
                                        {{ language('frontend.common.profile_settings') }}</a>
                                @endif
                                <a class="dropdown-item" href="javascript:void(0)"
                                    onclick="document.getElementById('formLogout').submit()">
                                    {{ language('frontend.common.logout') }}</a>
                                <form id="formLogout" action="{{ route('frontend.login.logout') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @else
                            <div class="header-btns no-auth">
                                <x-inc.btns.auth href="{{ route('frontend.cabinet.register') }}" 
                                    title="{{ language('frontend.common.register') }}" />
                                <x-inc.btns.auth href="{{ route('frontend.login.index') }}" 
                                    title="{{ language('frontend.common.login') }}" class="login">
                                    <svg width="20" height="20" viewBox="0 0 20 20"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.83344 6.25016C5.83344 5.42608 6.07781 4.62049 6.53565 3.93529C6.99349 3.25008 7.64423 2.71603 8.40559 2.40067C9.16695 2.0853 10.0047 2.00279 10.813 2.16356C11.6212 2.32433 12.3637 2.72117 12.9464 3.30389C13.5291 3.88661 13.9259 4.62903 14.0867 5.43729C14.2475 6.24554 14.165 7.08332 13.8496 7.84468C13.5342 8.60604 13.0002 9.25678 12.315 9.71462C11.6298 10.1725 10.8242 10.4168 10.0001 10.4168C8.89544 10.4155 7.8364 9.9761 7.05529 9.19498C6.27417 8.41387 5.83476 7.35483 5.83344 6.25016ZM13.4309 11.3093C12.9607 11.1927 12.4638 11.2575 12.0393 11.491C11.4153 11.837 10.7136 12.0185 10.0001 12.0185C9.28664 12.0185 8.5849 11.837 7.96094 11.491C7.53631 11.2579 7.03952 11.193 6.56927 11.3093C5.75776 11.5186 5.0395 11.9931 4.52869 12.6575C4.01787 13.3219 3.74382 14.138 3.75011 14.976V15.8185C3.75021 16.3463 3.8921 16.8643 4.16094 17.3185C4.27269 17.502 4.43005 17.6535 4.61769 17.7582C4.80534 17.8629 5.01689 17.9173 5.23177 17.916H14.7684C14.9834 17.9173 15.195 17.8628 15.3827 17.758C15.5704 17.6531 15.7277 17.5014 15.8393 17.3177C16.1083 16.8636 16.2502 16.3455 16.2501 15.8177V14.9727C16.2556 14.1352 15.9813 13.3199 15.4705 12.6562C14.9597 11.9925 14.2419 11.5184 13.4309 11.3093Z" />
                                    </svg>
                                </x-inc.btns.auth> 
                            </div>
                        @endif
                    </ul>
                </nav>
                @if (auth()->check())
                <div class="header-btns">
                    <a href="{{ route('frontend.dashboard.chats') }}" class="header-message">
                        <img src="{{ asset('build/website/images/icons/contacts-email.svg') }}" alt="{{ language('general.title') }}">
                        <span @if ($message_count == 0) class="bg-grey" @endif>{{ $message_count }}</span>
                    </a>
                    <a href="{{ route('frontend.cabinet.notification') }}" class="header-message bell">
                        <img width="24" height="24" src="{{ asset('build/website/images/icons/icons8-bell-96.svg') }}" alt="{{ language('general.title') }}">
                        <span @if ($notification_count == 0) class="bg-grey" @endif>{{ $notification_count }}</span>
                    </a>
    
                </div>
                <div class="header-profile">
                    <div class="header-profile__wrapper">
                        <span class="user-img">
                            <img src="{{ !empty(auth()->user()->profile_photo) ? asset('storage/profile/' . auth()->user()->profile_photo) : asset('storage/no-photo.jpg') }}"
                                alt="{{ auth()->user()->name }}">
                        </span>
                        <span class="header-user-name">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="dropdown-menu">
                        <div class="drop-head">{{ language('frontend.common.account_details') }}</div>
                        <a class="dropdown-item" href="{{ route('frontend.dashboard.index') }}">
                            {{ language('frontend.common.dashboard') }}</a>
                        <a class="dropdown-item" href="{{ route('frontend.profile.index', auth()->id()) }}">
                            {{ language('frontend.common.view_profile') }}</a>
                        @if (\App\Services\CommonService::userRoleId(auth()->id()) == 3)
                            <a class="dropdown-item" href="{{ route('frontend.dashboard.employer.profile-settings') }}">
                                {{ language('frontend.common.profile_settings') }}</a>
                        @elseif(\App\Services\CommonService::userRoleId(auth()->id()) == 4)
                            <a class="dropdown-item" href="{{ route('frontend.dashboard.freelancer.profile-settings') }}">
                                {{ language('frontend.common.profile_settings') }}</a>
                        @endif
                        <a class="dropdown-item" href="javascript:void(0)"
                            onclick="document.getElementById('formLogout').submit()">
                            {{ language('frontend.common.logout') }}</a>
                        <form id="formLogout" action="{{ route('frontend.login.logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                    <div class="header-btns no-auth">
                        <x-inc.btns.auth href="{{ route('frontend.cabinet.register') }}" 
                            title="{{ language('frontend.common.register') }}" />
                        <x-inc.btns.auth href="{{ route('frontend.login.index') }}" 
                            title="{{ language('frontend.common.login') }}" class="login">
                            <svg width="20" height="20" viewBox="0 0 20 20"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.83344 6.25016C5.83344 5.42608 6.07781 4.62049 6.53565 3.93529C6.99349 3.25008 7.64423 2.71603 8.40559 2.40067C9.16695 2.0853 10.0047 2.00279 10.813 2.16356C11.6212 2.32433 12.3637 2.72117 12.9464 3.30389C13.5291 3.88661 13.9259 4.62903 14.0867 5.43729C14.2475 6.24554 14.165 7.08332 13.8496 7.84468C13.5342 8.60604 13.0002 9.25678 12.315 9.71462C11.6298 10.1725 10.8242 10.4168 10.0001 10.4168C8.89544 10.4155 7.8364 9.9761 7.05529 9.19498C6.27417 8.41387 5.83476 7.35483 5.83344 6.25016ZM13.4309 11.3093C12.9607 11.1927 12.4638 11.2575 12.0393 11.491C11.4153 11.837 10.7136 12.0185 10.0001 12.0185C9.28664 12.0185 8.5849 11.837 7.96094 11.491C7.53631 11.2579 7.03952 11.193 6.56927 11.3093C5.75776 11.5186 5.0395 11.9931 4.52869 12.6575C4.01787 13.3219 3.74382 14.138 3.75011 14.976V15.8185C3.75021 16.3463 3.8921 16.8643 4.16094 17.3185C4.27269 17.502 4.43005 17.6535 4.61769 17.7582C4.80534 17.8629 5.01689 17.9173 5.23177 17.916H14.7684C14.9834 17.9173 15.195 17.8628 15.3827 17.758C15.5704 17.6531 15.7277 17.5014 15.8393 17.3177C16.1083 16.8636 16.2502 16.3455 16.2501 15.8177V14.9727C16.2556 14.1352 15.9813 13.3199 15.4705 12.6562C14.9597 11.9925 14.2419 11.5184 13.4309 11.3093Z" />
                            </svg>
                        </x-inc.btns.auth> 
                    </div>
                @endif
    
            </div>
            <div class="header__burger">
                <div class="header__burger-line"></div>
                <div class="header__burger-line"></div>
                <div class="header__burger-line"></div>
            </div>
        </div>
    </div>
</header>