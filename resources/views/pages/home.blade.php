<x-layout>

    <x-inc.home.search />
    <x-inc.home.promo />
    <x-inc.home.categories :categories="$categories" />
    <x-inc.home.projects :categories="$categories" />
    <x-inc.home.choose />
    <x-inc.home.developers :getProjects="$getProjects" :freelancers="$freelancers" />
    <x-inc.home.posts :blogs="$blogs" />
    <x-inc.home.banner :blogs="$blogs" />
    @push('meta')
        <title>
            {{ empty(language('frontend.home.title')) ? language('frontend.home.home') : language('frontend.home.title') }}
        </title>
        <meta name="description" content="{{ language('frontend.home.description') }}">
        <meta name="keywords" content="{{ language('frontend.home.keyword') }}">
        <link rel="stylesheet" href="/css/swiper-bundle.min.css" />
        <script src="/js/swiper-bundle.min.js"></script>
    @endPush


</x-layout>
