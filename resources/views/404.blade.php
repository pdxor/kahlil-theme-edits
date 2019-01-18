@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <div class="text-center">

        <div class="alert alert-warning">
          {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
        </div>

      <h1 class="my-5">
        <div>{{ __('How Embarassing') }}</div>
        <div>{{ __('Our team was just fixing this.') }}</div>
      </h1>
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <h3 class="mb-3">
            {{ __('Our New Product Finder Will Help You Solve Critical Cleaning Problems Quickly') }}
          </h3>
          <div class="mt-5 mb-5"><a class="btn btn-primary" href="https://tools.microcare.com/product-finder/">Start the Product Finder</a></div>
        </div>
      </div>
      <img class="img-fluid" src="{{ $fourohfourimage }}">

    </div>
      {!! get_the_posts_navigation() !!}
  @endif
@endsection
