<div class="address-list-item d-flex col-xl-3 col-lg-4 col-md-6 mb-4">
  <div class="card address-card w-100 {{ isset($is_featured) && get_field('featured', $is_featured) ? 'border-'. get_queried_object()->slug : '' }}">
    @if(isset($is_featured) && get_field('featured', $is_featured))
    <div class="card-header text-center bg-{{ get_queried_object()->slug }} text-white">
      {{ __('Featured Distributor') }}
    </div>
    @endif
    <div class="card-body">

      @if(isset($is_featured))
       {!! get_the_post_thumbnail( $is_featured, 'medium', array( 'class' => 'img-fluid mb-3' ) ) !!}
      @endif

    <h5 class="card-title"> {{ get_the_title($is_featured) }}</h5>
    <address>
      {!! get_field('address', $is_featured) ? get_field('address', $is_featured) . '<br />' : '' !!}
      {!! get_field('address_2', $is_featured) ? get_field('address_2', $is_featured) . '<br />' : '' !!}
      {!! get_field('city', $is_featured) ? get_field('city', $is_featured) . ', ' : '' !!}
      {!! get_field('state/province', $is_featured) ? get_field('state/province', $is_featured) : '' !!}
      {!! get_field('zip/postal_code', $is_featured) ? get_field('zip/postal_code', $is_featured) . '<br />' : '' !!}
      {!! get_field('country', $is_featured) ? get_field('country', $is_featured) : '' !!}
    </address>

    <address class="text-sm">
      {!! get_field('phone', $is_featured) ? '<strong>Phone: </strong>' . get_field('phone', $is_featured) . '<br />' : '' !!}
      {!! get_field('fax',$is_featured) ? '<strong>Fax: </strong>' . get_field('fax', $is_featured) . '<br />' : '' !!}
      {!! get_field('e-mail', $is_featured) ? '<strong>E-Mail: </strong>' . get_field('e-mail', $is_featured) . '<br />' : '' !!}
    </address>
    </div>
    @if(get_field('url', $is_featured))
      <div class="card-footer bg-white">
        <a class="btn btn-{{ TaxonomyBusinessUnit::btnclass($is_featured) }} btn-sm" href="{!! TaxonomyBusinessUnit::btnurl(get_field('url', $is_featured)) !!}"><i class="fa fa-star" aria-hidden="true"></i> {{ __('Visit Website') }}</a>
      </div>
    @endif
  </div>
</div>
