@push('content')
  @php(the_content())
  @include('partials/products/product-where-to-buy')
  @include('partials/products/tabs/tabs')
@endpush

@include('partials/products/product-technical-details')

@include('partials/resources/related-resources-base')


<div class="container">
  <article @php(post_class('row'))>
    <div class="col-sm-3">
      <figure class="product-image">
        {{ the_post_thumbnail($thumb_size, $thumb_classes) }}
      </figure>
      <div class="product-nav nav-smooth" id="product-nav">
          <ul class="nav nav-pills flex-column" role="tablist">
            <li class="nav-item"><a class="flex-sm-fill nav-link" href="#top">Description</a></li>
              @stack('productnav')
          </ul>
      </div> <!-- /#product-nav -->
    </div> <!-- /.col-sm-3 -->
    <div class="col-sm">
      <header>
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
        @include('partials/products/markets')
      </header>
      <div class="entry-content">
        @stack('content')
      </div>
      <footer>
        {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
      </footer>
      @php(comments_template('/partials/comments.blade.php'))
    </div>
  </article>
</div> <!-- /.container -->
