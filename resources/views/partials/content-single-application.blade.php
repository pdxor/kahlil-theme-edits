
@push('after-content')
{!! do_shortcode('[application-products]') !!}
@endpush

<div class="container">
<article @php(post_class('row align-items-center'))>
  <div class="col-md-6">
    <header>
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
    </header>
    <div class="entry-content">
      @php(the_content())
      @stack('content')
    </div>
  </div>
  <figure class="d-none d-md-block col-md-6 application-image">
    {{ the_post_thumbnail($thumb_size, $thumb_classes) }}
  </figure>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
</div>
