@include('partials/footer/footer-product-finder')
@if(!is_singular('distributor'))
@include('partials/footer/footer-where-to-buy')
@include('partials/footer/footer-content-info')
@include('partials/footer/footer-colophon')
@endif
@if(is_singular('distributor'))
@include('partials/footer/dist-resources-footer')
@include('partials/footer/footer-corporate-footer')
@endif

@stack('footer')

<div class="bg-light">
  <div class="container">
    <div class="d-flex justify-content-center">

      <div class="d-block d-lg-none">
      @include('partials/network-navigation')
      </div>

    </div>
  </div>
</div>
