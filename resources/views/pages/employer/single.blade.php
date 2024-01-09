<x-layout>


<x-inc.single.layout>
	<x-slot name="breadcrumbs">
		<x-inc.breadcrumbs
			theme="white"
			:items="[
				[
					'title'	=> 'Projects',
					'link'	=> route('frontend.project.index'),
				],
				[
					'title'	=> $user->name,

				],
			]"
		/>
	</x-slot>
	<x-slot name="profileLeft">
		<x-inc.single.employer.profile
		name="{{$user->name}}"
		category="{{$user->user_category_name}}"
		profileLink="{{ $user->user_profile_link }}  "
		rate="{{$user->hourly_rate}}"
		proflieImg="{{ $user->profile_photo }}"
		id="{{$user->id}}"
		/>
	</x-slot>
	<x-slot  name="profiledescription">
		<x-inc.single.employer.details
		data="{{$user->created_at->format('M d, Y')}}"
		rating="{{$average_rating}}"
		ratingCount="{{$reviews_count}}"
		name="{{$user->name}}"
		established="{{$user->established}}"
		categoryName="{{$user->user_category_name}}"
		owner="{{$user->owner}}"
		/>
	</x-slot>
	<x-slot name="overview">
		<x-inc.single.employer.overview
		description="{!! $user->description !!}"
		/>
		<x-inc.single.employer.reviews
		:reviews="$reviews"
		/>
	</x-slot>
	<x-slot name="about">
		<x-inc.single.employer.projects :projects="$projects" />
	</x-slot>
	<x-slot name="modal">

	</x-slot>
</x-inc.single.layout>

@push('meta')

<title>{{$user->name ." - Employer"}}</title>
<meta name="description" content="{{language('frontend.developer.description')}}">
<meta name="keywords" content="{{language('frontend.developer.keywords')}}">

@endPush

</x-layout>
