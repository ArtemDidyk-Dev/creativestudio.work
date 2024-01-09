<img src="{{ $proflieImg }}" alt="{{ $name }}" class="freelancer-profile-img">
<div class="freelancer-profile-details">
    <h1 class="freelancer-profile-title">
        {{ $name }}
    </h1>
    <div class="freelancer-profile-subtitle">
        {{ $category }}
    </div>
    <div class="freelancer-profile-tags">
        @if ($rate > 0)
            <x-inc.single.tag title="{{ $rate }} {{ language('frontend.currency') }}" />
        @endif
        <x-inc.single.tag title="{{ language('( Per Hour )') }}" />
    </div>

    <x-inc.single.profile-link class="offset">
        {{ $profileLink }}
    </x-inc.single.profile-link>
    @if (auth()->id() != $id)
        <x-inc.btns.with-image color="black" image="/images/icons/email.svg" title="{{ language('Send message') }}"
            link="{{ route('frontend.dashboard.create-chat', $id) }}" />
    @endif
	<div class="single-layout__line"></div>
</div>
