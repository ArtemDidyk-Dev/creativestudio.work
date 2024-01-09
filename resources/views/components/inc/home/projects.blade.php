<section class="projects">
    <div class="container">
        <h2>{{ language('projects.home.title') }}</h2>
        <div class="projects__wrapper">
            <div class="projects__left">
                @foreach ($categories as $category)
                    <button data-category="{{ $category->user_category_id }}"
                        class="projects__left-item  @if ($loop->first) active @endif">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
            <div class="projects__right">
                @foreach ($categories as $category)
                    <div class="projects__item @if ($loop->first) active @endif" data-category="{{ $category->user_category_id }}" >
                        @foreach ($category->users as $users)
                           
                            <div class="projects__item-box element-{{$loop->iteration}}">
                                <div class="projects__box-element">
                                    <img width="250" height="210"
                                        src="{{ !empty($users->profile_photo)
                                            ? asset('storage/profile/' . $users->profile_photo)
                                            : asset('storage/no-photo.jpg') }}"
                                        alt="">
                                    <div class="projects__box-bottom-info">
                                        <span class="projects__box-bottom-info-title">{{ $users->name }}</span>
                                        <p class="projects__box-bottom-info-text"> {{ $category->name }}</p>
                                        <div class="projects__box-bottom-descrip">
                                            <div class="projects__box-descrip-left">
                                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.62402 0L9.30788 5.18237H14.7569L10.3486 8.38525L12.0324 13.5676L7.62402 10.3647L3.21563 13.5676L4.89949 8.38525L0.491099 5.18237H5.94017L7.62402 0Z"
                                                        fill="#FFB900" />
                                                </svg>
                                                <span>{{ number_format($users->reviews->avg('rating'), 1) ?? '0.0' }}</span>
                                                <span>({{ count($users->reviews) ?? 0 }})</span>
                                            </div>
                                            <a href="{{ route('frontend.profile.index', $users->id) }}"
                                                class="projects__box-descrip-right">
                                                <span>View profile</span>
                                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.12402 7.5L7.12402 1.5M7.12402 1.5H1.12402M7.12402 1.5V7.5"
                                                        stroke="#57A9F5" stroke-width="1.2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="projects__item-box link">
                            <div class="projects__item-link-inner">
                                <div class="projects__item-link-box">
                                    <img width="158" height="158" src="{{ asset('build/website/images/other/item-link-1.png') }}" alt="" >
                                </div>
                                <div class="projects__item-link-box">
                                    <img width="158" height="158" src="{{ asset('build/website/images/other/item-link-2.png') }}" alt="" >
                                </div>
                                <div class="projects__item-link-box">
                                    <img width="158" height="158" src="{{ asset('build/website/images/other/item-link-3.png') }}" alt="" >
                                </div>
                                <div class="projects__item-link-box last">
                                    <span>View all specialists in this category</span>
                                    <x-inc.btns.link-svg class="white" title="{{ language('See all') }}"
                                        href="{{ route('frontend.developer.index', ['user_category' => $category->user_category_id]) }}" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                            <path d="M3.62402 11L11.624 3M11.624 3H3.62402M11.624 3V11" stroke="#111111" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </x-inc.btns.link-svg>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

