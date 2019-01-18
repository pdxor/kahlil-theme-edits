<?php
	$videos = get_field('videos');
	$this_id = get_the_ID();
 ?>

		<div class="list-group">
		<?php foreach( $videos as $p): // variable must be called $post (IMPORTANT) ?>

			<a class="list-group-item list-group-item-action" href="<?php echo get_permalink( $p->ID ); ?>">
        <div class="row align-items-center">
          <div class="col-1 icon">
            @include('partials/resources/icons/icons-' . get_post_type($p))
					</div>
					<div class="col">
						<?php echo get_the_title( $p->ID ); ?>
					</div>
        </div>
			</a>

		<?php endforeach; ?>
		</div>
