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
