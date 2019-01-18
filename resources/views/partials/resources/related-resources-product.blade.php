<?php
 ?>
<div class="row text-center">

		<?php foreach( $get_related_products as $p): // variable must be called $post (IMPORTANT) ?>
      <div class="col-sm-12 col-md-6 mb-4">
            <a class="related-product card d-flex w-100" href="<?php echo get_permalink( $p->ID ); ?>">
              <div class="card-header">
                <h6 class="my-0"><?php echo get_the_title( $p->ID ); ?></h6>
              </div>
              <div class="card-body">
  							<div class="caption">
  							</div>
  							<?php echo get_the_post_thumbnail($p->ID, 'category-thumb'); ?>
            </div> <!-- /.card-body -->
            </a> <!-- /.card -->
          </div>

		<?php endforeach; ?>
</div>
