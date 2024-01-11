<section class="banner">
    <div class="container">
        <div class="banner__box">
            <div class="banner__box-content">
                <span>{{ language('banner_home_title') }}</span>
                <p>{{ language('banner_home_text') }}</p>
                <x-inc.btns.link-svg class="full-pink" title="{{ language('Join as a freelancer') }}"
                    href="{{ route('frontend.cabinet.register') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                        fill="none">
                        <path d="M8.12402 17.5L16.124 9.5M16.124 9.5H8.12402M16.124 9.5V17.5" stroke="white"
                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-inc.btns.link-svg>
            </div>
            <div class="banner__box-right">
                <img width="577" height="460" loading="lazy"  src="{{ asset('build/website/images/other/banner-bootom.png') }}" alt="">
                <span class="banner__box-suntext">{{ language('banner_plug') }}</span>
            </div>
            
        </div>
    </div>
</section>
