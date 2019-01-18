@include('partials.page-header')
<div class="row">
  <div class="col-sm-8">
    <h2><?php the_field('promotional_offer_title'); ?></h2>
    <p><img class="img-fluid" src="<?php the_field('promo_image'); ?>"></p>
  </div>
  <div class="col-sm-4">
    <p><img class="img-fluid" src="<?php the_field('sales_manager_picture'); ?>"></p>
  </div>
</div>
</div>
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
