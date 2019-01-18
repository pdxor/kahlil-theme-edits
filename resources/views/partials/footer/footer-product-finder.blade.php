@if(!is_404())
@push('footer')
<section class="footer-addon footer-addon-product-finder">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
    <h2>
      <div>{!! __('Solve Critical Cleaning Problems Quickly', 'microcare_theme') !!}</div>
      <div>{!! __('with the MicroCare Product Finder', 'microcare_theme') !!}</div>
    </h2>
    <div><a class="btn btn-primary" href="https://www.microcare.com/product-finder/">Start the Product Finder</a></div>
      </div> <!-- /.col -->
    </div> <!-- /.row -->
  </div> <!-- /.container -->

</section>
@endpush
@endif