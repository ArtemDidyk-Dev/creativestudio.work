<section class="search">
    <div class="container">
        <div class="search__inner">
            <div class="search__left">
                <div class="search__text">
                    <h1>{{ language('frontend.home.h1')}}</h1>
                    <p>{{ language('home-banner-subtitle')}}</p>
                </div>
                <form class="search__element-form" name="store" id="search" method="GET"
                    action="{{ route('frontend.developer.index') }}">
                    <img width="22" height="22" src="{{ asset('build/website/images/icons/search.svg') }}" alt="" class="search__element-form-ico">
                    <input type="text" name="keyword" class="search__element-form-input" placeholder="{{ language('Search here...') }}">
                    <x-inc.btns.search title="{{ language('Search') }}" >
                        <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.12402 11L11.124 3M11.124 3H3.12402M11.124 3V11" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </x-inc.btns.search>
                </form>
            </div>
            <div class="search__right">
                <img loading="lazy" width="490" height="470" src="{{ asset('build/website/images/other/search-banner.png') }}" alt="banner">
            </div>
        </div>
    </div>
</section>
