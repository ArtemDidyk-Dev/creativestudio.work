<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__left">
                <a href="{{ route('frontend.home.index') }}" class="header__logo">
                    <img src="{{ asset('build/website/images/logo.png') }}" width="130" height="60"
                        alt="{{ language('general.title') }}" class="header-logo">
                </a>
            </div>
            <div class="header__right">
                <nav>
                    <ul class="header__menu">
                        {!! $headerMenu !!}
                    </ul>
                </nav>
                @if (auth()->check())
                    <div class="header-btns">
                        <a href="{{ route('frontend.dashboard.chats') }}" class="header-message">
                            <img src="{{ asset('build/website/images/icons/contacts-email.svg') }}"
                                alt="{{ language('general.title') }}">
                            <span @if ($message_count == 0) class="bg-grey" @endif>{{ $message_count }}</span>
                        </a>
                        <a href="{{ route('frontend.cabinet.notification') }}" class="header-message bell">
                            <img width="24" height="24"
                                src="{{ asset('build/website/images/icons/icons8-bell-96.png') }}"
                                alt="{{ language('general.title') }}">
                            <span
                                @if ($notification_count == 0) class="bg-grey" @endif>{{ $notification_count }}</span>
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
                                <a class="dropdown-item"
                                    href="{{ route('frontend.dashboard.employer.profile-settings') }}">
                                    {{ language('frontend.common.profile_settings') }}</a>
                            @elseif(\App\Services\CommonService::userRoleId(auth()->id()) == 4)
                                <a class="dropdown-item"
                                    href="{{ route('frontend.dashboard.freelancer.profile-settings') }}">
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
                            title="{{ language('frontend.common.login') }}" class="login" />
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

<style>
    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 200;
        src: url("/build/website/fonts/nunito-sans-v15-latin-200italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 300;
        src: url("/build/website/fonts/nunito-sans-v15-latin-300.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 300;
        src: url("/build/website/fonts/nunito-sans-v15-latin-300italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 400;
        src: url("/build/website/fonts/nunito-sans-v15-latin-regular.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 400;
        src: url("/build/website/fonts/nunito-sans-v15-latin-italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 500;
        src: url("/build/website/fonts/nunito-sans-v15-latin-500.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 500;
        src: url("/build/website/fonts/nunito-sans-v15-latin-500italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 600;
        src: url("/build/website/fonts/nunito-sans-v15-latin-600.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 600;
        src: url("/build/website/fonts/nunito-sans-v15-latin-600italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 700;
        src: url("/build/website/fonts/nunito-sans-v15-latin-700.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 700;
        src: url("/build/website/fonts/nunito-sans-v15-latin-700italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 800;
        src: url("/build/website/fonts/nunito-sans-v15-latin-800.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 800;
        src: url("/build/website/fonts/nunito-sans-v15-latin-800italic.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: normal;
        font-weight: 900;
        src: url("/build/website/fonts/nunito-sans-v15-latin-900.woff2") format("woff2");
    }

    @font-face {
        font-display: swap;
        font-family: "Nunito Sans";
        font-style: italic;
        font-weight: 900;
        src: url("/build/website/fonts/nunito-sans-v15-latin-900italic.woff2") format("woff2");
    }


    .header {
        padding: 17px 0px;
        position: relative;
        box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.06);
    }

    .header__inner {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    @media (max-width: 992px) {
        .header__inner {
            flex-direction: column;
        }
    }

    ul[class] {
        list-style: none;
    }

    ul {
        list-style: none;
    }

    .header__left {
        min-width: 130px;
        margin-right: auto;
    }

    .header__right {
        display: flex;
        align-items: center;
        width: 100%;
    }

    .header__right nav {
        margin-left: auto;
    }

    .header__right nav ul {
        display: flex;
    }

    .header__right nav ul li {
        position: relative;
        color: #111;
    }

    .header__right nav ul li a {
        color: #111;
        font-size: 15px;
        line-height: 21px;
        transition: all 0.3s;
    }

    .header__right nav ul li a:hover {
        color: #AC14F3;
        transition: all 0.3s;
        text-decoration: underline;
        text-underline-offset: 4px;
    }

    @media (max-width: 992px) {
        .header__right nav ul li a {
            color: #FFF;
        }
    }

    .header__right nav ul li.has-submenu {
        position: relative;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .header__right nav ul li.has-submenu:hover .arrow {
        transform: rotate(180deg);
    }

    .header__right nav ul li.has-submenu:hover .submenu {
        opacity: 1;
        z-index: 1;
        transition: all 0.3s;
    }

    .header__right nav ul li.has-submenu .arrow {
        background-image: url("/images/icons/arrow-hed.svg");
        position: absolute;
        right: -17px;
        width: 11px;
        height: 11px;
        background-size: contain;
        background-repeat: no-repeat;
        top: 8px;
        transition: all 0.3s;
    }

    @media (max-width: 992px) {
        .header__right nav ul li.has-submenu .arrow {
            filter: invert(1);
        }
    }

    .header__right nav ul li.has-submenu .submenu {
        display: flex;
        z-index: -2;
        opacity: 0;
        flex-direction: column;
        position: absolute;
        list-style-type: none;
        min-width: 215px;
        top: 32px;
        background: #AC14F3;
        border-radius: 12px;
        padding: 10px;
        transition: all 0.3s;
    }

    .header__right nav ul li.has-submenu .submenu li+li {
        margin-left: 0px;
        margin-top: 10px;
    }

    .header__right nav ul li.has-submenu .submenu li {
        padding-bottom: 0px;
    }

    .header__right nav ul li.has-submenu .submenu li a {
        color: #FFF;
    }

    .header__right nav ul li.has-submenu .submenu li a:hover {
        color: #161C2D;
    }

    @media (max-width: 992px) {
        .header__right nav ul li.has-submenu:hover .arrow {
            transform: none;
        }

        .header__right nav ul li.has-submenu .submenu {
            display: none;
        }

        .header__right nav ul li.has-submenu.active .arrow {
            transform: rotate(180deg);
        }

        .header__right nav ul li.has-submenu.active .submenu {
            display: flex;
        }
    }

    .header__right nav ul li+li {
        margin-left: 30px;
    }

    @media (max-width: 992px) {
        .header__right nav ul {
            display: none;
        }

        .header__right nav ul.active {
            display: flex;
            width: 100%;
            position: absolute;
            top: 0px;
            flex-direction: column;
            padding: 30px;
            border-bottom: 2px solid #AC14F3;
            z-index: 2;
            justify-content: flex-start;
            align-items: flex-start;
            left: 0px;
            background: #161C2D;
        }

        .header__right nav ul.active li {
            width: auto;
            min-width: 115px;
        }

        .header__right nav ul.active li+li {
            margin-left: 0px;
            margin-top: 15px;
        }
    }

    .header__right .header-btns {
        display: flex;
        margin-left: auto;
        align-items: center;
    }

    .header__right .header-btns.no-auth a {
        color: #AC14F3;
        border: 1.5px solid #AC14F3;
        padding: 8px 24px;
        line-height: 24px;
        font-size: 14px;
        border-radius: 50px;
        transition: all 0.3s;
    }

    .header__right .header-btns.no-auth a:hover {
        color: #FFF;
        background: #AC14F3;
    }

    @media (max-width: 992px) {
        .header__right .header-btns.no-auth a {
            padding: 4px 24px;
        }
    }

    .header__right .header-btns.no-auth a+a {
        color: #fff;
        margin-left: 20px;
        border: 1.5px solid #AC14F3;
        background: #AC14F3;
    }

    .header__right .header-btns.no-auth a+a:hover {
        color: #AC14F3;
        background: #fff;
    }

    .header__right .header-btns .header-message {
        position: relative;
    }

    .header__right .header-btns .header-message+.header-message {
        margin-left: 15px;
    }

    .header__right .header-btns .header-message span {
        position: absolute;
        top: -10px;
        left: 21px;
        background-color: #AC14F3;
        border-radius: 50%;
        width: 23px;
        height: 23px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        padding: 0px 7px;
        font-weight: 400;
        color: #ffffff;
    }

    .header__right .header-btns .header-message.bell span {
        left: 12px;
        top: -13px;
    }

    @media (max-width: 992px) {
        .header__right .header-btns {
            margin-top: 20px;
            margin-right: auto;
        }
    }

    .header__right .header-profile {
        margin-left: 30px;
        position: relative;
    }

    .header__right .header-profile .header-profile__wrapper {
        display: flex;
        align-items: center;
        margin-left: 30px;
        cursor: pointer;
    }

    @media (max-width: 992px) {
        .header__right .header-profile .header-profile__wrapper {
            margin-left: 0px;
        }
    }

    .header__right .header-profile .header-profile__wrapper:hover .header-user-name {
        color: #AC14F3;
    }

    .header__right .header-profile .header-user-name {
        margin-left: 8px;
        font-size: 14px;
        position: relative;
    }

    .header__right .header-profile .header-user-name::after {
        display: inline-block;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
    }

    .header__right .header-profile .user-img {
        display: inline-block;
        position: relative;
        margin-right: 5px;
    }

    .header__right .header-profile .user-img>img {
        height: 46px;
        -o-object-fit: cover;
        object-fit: cover;
        width: 46px;
        border-radius: 50%;
    }

    .header__right .header-profile .btn-menu {
        margin: 0 15px;
        transition: 0.3s;
        color: #AC14F3;
        font-weight: 400;
        text-decoration: none;
    }

    .header__right .header-profile .btn-menu:hover {
        color: #161C2D;
    }

    .header__right .header-profile .dropdown-menu {
        display: none;
    }

    .header__right .header-profile .dropdown-menu.emp {
        padding-top: 0px;
        position: absolute;
        background: #AC14F3;
        min-width: 180px;
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        overflow: hidden;
        right: 0px;
        top: 57px;
        padding-bottom: 10px;
        z-index: 1;
    }

    .header__right .header-profile .dropdown-item {
        padding: 5px;
        padding: 5px;
        transition: 0.3s;
        color: #FFF;
        font-weight: 500;
        text-decoration: none;
    }

    .header__right .header-profile .dropdown-item:hover {
        color: #161C2D !important;
        background: none !important;
    }

    .header__right .header-profile .drop-head {
        background: #161C2D;
        padding: 6px;
        padding: 6px;
        font-weight: 600;
        color: #FFF;
        border: none;
    }

    @media (max-width: 992px) {
        .header__right .header-profile {
            margin-left: 0px;
            margin-top: 5px;
        }
    }

    @media (max-width: 992px) {
        .header__right {
            width: auto;
            flex-direction: column;
        }
    }

    .header__burger {
        display: none;
        flex-direction: column;
        position: absolute;
        width: 30px;
        top: 34px;
        height: 20px;
        z-index: 3;
        right: 30px;
    }

    .header__burger-line {
        height: 3px;
        border-radius: 15px;
        background-color: #AC14F3;
        transition: all 0.3s;
        width: 100%;
    }

    .header__burger-line+.header__burger-line {
        margin-top: 5px;
    }

    .header__burger.active {
        top: 32px;
    }

    .header__burger.active .header__burger-line:first-child {
        display: none;
    }

    .header__burger.active .header__burger-line:nth-child(2) {
        transform: rotate(47deg) translate(5px, 5px);
    }

    .header__burger.active .header__burger-line:nth-child(3) {
        transform: rotate(-45deg) translate(0, -1px);
    }

    @media (max-width: 992px) {
        .header__burger {
            display: flex;
        }
    }

    @media (max-width: 567px) {
        .header {
            padding: 10px 0px;
        }
    }
</style>

<script>
    	
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.querySelector('.header__burger');
    const menu = document.querySelector('.header__menu');
    const arrowHeaders = document.querySelectorAll('.has-submenu .arrow');
    const headerMenus = document.querySelectorAll('.has-submenu');
    const profile = document.querySelector('.header-profile__wrapper');
    if (profile) {
        let profileMore = document.querySelector('.dropdown-menu');
        profile.addEventListener("click", () => {
            profileMore.classList.toggle('emp');
        })

    }
    burger.addEventListener('click', () => {
        classToggle(burger, 'active');
        classToggle(menu, 'active');
    })

    arrowHeaders.forEach((arrow, index) => {
        arrow.addEventListener('click', () => {
            headerMenus[index].classList.toggle('active')
        })
    });
    function classToggle(element, classAdd) {
        element.classList.toggle(classAdd);
    }
});

</script>
