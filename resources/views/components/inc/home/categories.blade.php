<section class="categories">
    <div class="container">
        <h2>{{ language('categories.home.title') }}</h2>
        
        <div class="categories__wrapper span-{{(count($categories) + 1) % 5 }}">
            @foreach ($categories as $category)
                <a href="{{ route('frontend.developer.index', ['user_category' => $category->user_category_id]) }}"
                    class="categories__item">
                    <img loading="lazy" src="{{ $category->userCategory[0]->image ? $category->userCategory[0]->image : 'build/website/images/other/default_image.png' }}"
                        alt="">
                    <span>{{ $category->name }}</span>
                </a>
                @if ($loop->last)
                    <div 
                        class="categories__item last">
                      <span>Join us and work anywhere, anytime</span>
                      <p>There's never been a better time to take yourself online and start making money from your very own fine-tuned set of skills</p>
                    <x-inc.btns.link-svg class="white" title="{{ language('Join as a freelancer') }}"
                    href="{{ route('frontend.cabinet.register') }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                        <path d="M3.62402 11L11.624 3M11.624 3H3.62402M11.624 3V11" stroke="#111111" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </x-inc.btns.link-svg>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
