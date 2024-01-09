<img src="{{$proflieImg}}" alt="{{$name}}" class="freelancer-profile-img">
<div class="freelancer-profile-details">
	<h1 class="freelancer-profile-title">
		{{$name}}
	</h1>
	<div class="freelancer-profile-subtitle">
		{{$category}}
	</div>
	<x-inc.single.profile-link class="offset">
		{{$profileLink}}
	</x-inc.single.profile-link>

	@if(auth()->id() != $id)
	<x-inc.btns.with-image
		color="black"
		image="/images/icons/email.svg"
		title="{{ language('Send message') }}"
		link="{{ route('frontend.dashboard.create-chat', $id) }}"
	/>
	@endif
	<div class="single-layout__line"></div>
	
</div>


