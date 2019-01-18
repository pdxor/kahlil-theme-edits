@push('page-header-after')
<article>
  {!! term_description() !!}
</article>
<form class="form-inline">
  <div class="form-group">
  <p class="mr-3">Show formulations for:</p> {!! facetwp_display( 'facet', 'formulations' ); !!}
  </div>
</form>
@endpush

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="facetwp-wrapper">
    <div class="facetwp-loader text-center fade">
      <i class="fa fa-refresh fa-spin fa-5x fa-fw text-secondary"></i>
    </div>
    <div class="facetwp-template">

    @while (have_posts()) @php(the_post())
      @include('partials.content-'.get_post_type())
    @endwhile

    </div>
    <div class="row justify-content-end">
      <div class="col-sm-9 text-center">
        {!! facetwp_display( 'pager' ) !!}
      </div>
    </div>
  </div>

@endsection
