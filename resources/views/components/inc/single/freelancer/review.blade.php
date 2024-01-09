<div class="single-freelancer-review">
	<x-inc.single.title class="single-overview-title-reviews">
		{{ language('Reviews') }}
	</x-inc.single.title>
	<div class="single-freelancer-review-title">
		{{$name}}
		<div class="single-freelancer-review-title-date">
			{{$data}}
		</div>
	</div>
	<div class="single-freelancer-review-rating">
		<x-inc.previews.rating
			ratingStars="{{$rating}}"
		/>
	</div>
	<div class="single-freelancer-review-text">
		{!! $text !!}
	</div>
</div>
