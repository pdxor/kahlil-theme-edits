<article @php(post_class('row mb-5'))>
  <div class="col-md-8">
    <header>
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      <div class="entry-meta">@include('partials/entry-meta')</div>
    </header>
    <div class="entry-summary">
      @php(the_excerpt())
    </div>
  </div>
  <figure class="col-md-4">
    <a href="{{ get_permalink() }}">
  		@php(the_post_thumbnail( $thumb_size, $thumb_classes))
  	</a>
  </figure>
</article>
