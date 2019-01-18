@include('partials/footer/footer-product-finder')
@include('partials/footer/footer-where-to-buy')

@include('partials/footer/footer-content-info')
@include('partials/footer/footer-colophon')

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
