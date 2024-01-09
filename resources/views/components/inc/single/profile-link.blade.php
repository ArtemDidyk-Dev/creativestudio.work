<div class="single-profile-link {{$class ?? ''}}">
	<a href="{{$slot}}" class="single-profile-link-a">
		{{$slot}}
	</a>
	<img src="/images/icons/copy.svg" alt="" class="single-profile-link-copy" onclick="copyLink(this)">
</div>


@push('js')
<script>
function copyLink(elm) {

	const link = elm.previousElementSibling
	const oldText = link.innerHTML.trim()
	
	const input = document.createElement('input');
	input.value = oldText;
	document.body.appendChild(input);
	input.select();
	document.execCommand('copy');
	document.body.removeChild(input);

	link.textContent = 'Link Copied!';
	setTimeout(function() {
		link.textContent = oldText;
	}, 1500);
}
</script>
@endPush