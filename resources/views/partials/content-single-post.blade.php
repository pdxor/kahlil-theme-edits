@include('partials/content-addon-download')
@include('partials/resources/related-resources-title')
@include('partials/resources/related-resources-base')

@include('partials.page-header')
<div class="entry-meta">@include('partials/entry-meta')</div>
<article @php(post_class('row'))>
  <div class="entry-content col-md-8">
    @php(the_content())
    @stack('content')
  </div>
  <figure class="col-md-4">
  	@php(the_post_thumbnail( $thumb_size, $thumb_classes))
  </figure>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
