@push('content')

<div class="postmeta card resources-meta bg-light mb-5">
  <div class="card-body">
	@if(get_field('author'))
		<p><strong>{{ __('Author:') }}</strong> {{ get_field('author') }}</p>
	@endif
	<p>
		@if(get_field('publication'))
		  <strong>{{ __('Originally published:') }}</strong>
		    {!! get_field('publication') !!}
        @endif
        @if(get_field('published_date'))
          , <time>{!! get_field('published_date') !!}</time>
	   @endif
	</p>
	<p>
		<strong>{{ __('Keywords:') }}</strong>
		 {!! $tags !!}
  </div>
</div>

@endpush
