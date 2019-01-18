@extends('layouts.app')

@section('content')

        <h1>
					{{ __('Where to Buy') }} : <span class="highlight"> @php(single_term_title())</span>
				</h1>

<hr>

<div class="row mt-5 mb-5">
  <div id="archive-filters" class="col-sm-12">
    <div class="alert alert-info text-center">
      <h3>Find distributors in your country:</h3>
        <form class="form-inline d-flex justify-content-center">
          <div class="text-lg mr-3">{{ __('Country') }}:</div>
          <select class="custom-select filter form-control form-control-lg" data-filter="country">
            <option value="none"  {{ TaxonomyBusinessUnit::selectedcountry('none') }}>Select Your Country</option>
            @foreach(TaxonomyBusinessUnit::allcountries() as $name)
              <option value="{{ $name }}" {{ TaxonomyBusinessUnit::selectedcountry($name) }}>{{ $name }}</option>
            @endforeach
          </select>
        </form>
      </div>
      <script type="text/javascript">
      (function($) {
        // change
        $('#archive-filters').on('change', 'select', function(){
          // vars
          var url = window.location.origin + window.location.pathname;
            args = {};
          // loop over filters
          $('#archive-filters .filter').each(function(){
            // vars
            var filter = $(this).data('filter'),
              vals = [];
            // find checked inputs
            $(this).find('option:selected').each(function(){
              vals.push( $(this).val() );
            });
            // append to args
            args[ filter ] = vals.join(',');
          });
          // update url
          url += '?';
          // loop over args
          $.each(args, function( name, value ){
            url += name + '=' + value + '&';
          });
          // remove last &
          url = url.slice(0, -1);
          // reload page
          window.location.replace( url );
        });
      })(jQuery);
      </script>

  </div>
</div>

@if ( have_posts() )
<div id="distributors-list">

@php($is_featured = null)

@if(TaxonomyBusinessUnit::featuredlocations())
<div class="row mb-5">

  @foreach(TaxonomyBusinessUnit::featuredlocations() as $is_featured)
    @include('partials.content-'.get_post_type())
  @endforeach
  @php($is_featured = null)

</div>

@endif

<h2>{{ __('Distributors') }}</h2>
<p>Listed Alphabetically, {{ __('Page') }} {{ (get_query_var('paged')) ? get_query_var('paged') : 1 }}
<div class="row">

  @while (have_posts()) @php(the_post())
    @include('partials.content-'.get_post_type())
  @endwhile

</div> <!-- /.facetwp-template -->

@php(wp_bootstrap4_pagination())

</div> <!-- /#distributors-list -->
@endif

  <hr class="my-5">

  <h3>{{ __('To speak with a Critical Cleaning Expert, Contact MicroCare here:') }}</h3>
  <div class="row mb-5">

    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
             <h6 class="card-title">{{ __('North America') }}</h6>
             <a href="tel://18006380125" class="btn btn-primary btn-sm"><i class="fa fa-phone"></i> (800) 638-0125</a>
           </div>
           <div class="card-footer">
             <small>National Sales Manager, Dan Sinclair</small>
           </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
             <h6 class="card-title">{{ __('Europe (Belgium)') }}</h6>
             <a href="tel://+3222519505" class="btn btn-primary btn-sm"><i class="fa fa-phone"></i> +32 2 251 9505</a>
           </div>
           <div class="card-footer">
             <small>Europe Business Manager, Scott Wells</small>
           </div>
      </div>
    </div>

  	<div class="col-sm-4">
      <div class="card">
        <div class="card-body">
  			     <h6 class="card-title">{{ __('Asia (Singapore)') }}</h6>
             <a href="tel://+65%206271%200182" class="btn btn-primary btn-sm"><i class="fa fa-phone"></i> +65 6271 0182</a>
           </div>
           <div class="card-footer">
             <small>Asia Regional Manager, Jerald Chan</small>
           </div>
  		</div>
  	</div>

  </div> <!-- /.row -->
@endsection