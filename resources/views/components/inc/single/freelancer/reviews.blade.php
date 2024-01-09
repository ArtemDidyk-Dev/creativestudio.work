@if (!empty($reviews))
    @foreach($reviews as $review)
        <x-inc.single.freelancer.review 
            name="{{$review->user_name}}" 
            text="{!! $review->review !!}" 
            rating="{{$review->rating_view}}" 
            data="{{$review->created_at_view}}" />
    @endforeach
@else
    <div class="single-overview-not-found">
        <x-inc.single.title class="single-overview-title-reviews">
            {{ language('Reviews') }}
        </x-inc.single.title>
        No {{ language('Reviews') }}
    </div>
@endif