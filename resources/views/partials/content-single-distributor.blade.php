@include('partials.page-header')
<div class="row">
  <div class="col-sm-8">
    <h2><?php the_field('promotional_offer_title'); ?></h2>
    <p><img class="img-fluid" src="<?php the_field('promo_image'); ?>"></p>
  </div>
  <div class="col-sm-4">
    <p><img class="img-fluid" src="<?php the_field('sales_manager_picture'); ?>"></p>
    <strong><?php the_field('sales_manager_name'); ?></strong> <a href="mailto:<?php the_field('sales_email_address'); ?>">Contact Me</a>
  </div>
</div>
<div class="row">
  <div class="col-sm-8">
    <div class="col-sm-8">
      <h2><?php the_field('media_section_title'); ?></h2>
      <div class="row">
        <div class="col-sm-3">
              <p>links here</p>
              <p>links here</p>
        </div>
        <div class="col-sm-9">
          <p>links here</p>
          <p>links here</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <h2><?php the_field('content_links_section_title'); ?></h2>
      <p>links here</p>
      <p>links here</p>
    </div>
  </div>
  <div class="col-sm-4">
    <a href="<?php the_field('digital_ad_link'); ?>"><img class="img-fluid" src="<?php the_field('digital_ad_image'); ?>"></a>
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
