@if($showresources)
  @include('partials/content-addon-video')
  @include('partials/content-addon-download')
  @include('partials/content-addon-newsletters')
  @include('partials/resources/related-resources-meta')
  @include('partials/resources/related-resources-title')
  @include('partials/resources/related-resources-base')
@endif

@include('partials.page-header')
<article @php(post_class('row'))>
  <div class="entry-content col-md-12">
    @php(the_content())
    @stack('content')
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/partials/comments.blade.php'))
</article>
