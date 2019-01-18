<article @php(post_class('row'))>
  <figure class="col-sm-3">
    {{ the_post_thumbnail($thumb_size, $thumb_classes) }}
  </figure>
  <div class="col-sm">
    <header>
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      @include('partials/products/markets')
    </header>
    <div class="entry-summary">
      @php(the_excerpt())
      @include('partials/products/tabs/tabs')
    </div>
  </div>
</article>
