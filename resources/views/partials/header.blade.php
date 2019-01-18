@include('partials/header-network-navigation')

<header class="banner py-2">
	<div class="container d-flex justify-content-between align-items-center">
		<a class="brand" href="/">
			<img src="{{ $logo }}" class="d-inline-block align-top img-fluid" alt="{{ $sitename }}">
		</a>
    <div class="d-flex">

      <div class="ml-auto align-self-center align-items-center d-flex">
        @if (has_nav_menu('corporate_navigation'))
          <i class="fa fa-external-link align-middle d-none d-sm-inline-block" aria-hidden="true"></i>
          <div class="d-none d-lg-block">{!! wp_nav_menu($corporatemenu) !!}</div>
        @endif
        <a class="btn btn-outline-primary ml-3" href="{{ $wheretobuy }}">{{ __('Where to Buy') }}</a>
      </div>


      @if(isset($returnto))
        <a class="btn btn-primary btn-{{ $returnto['slug'] }} ml-1" href="{{ $returnto['url'] }}"><i class="fa fa-external-link text-white" aria-hidden="true"></i> {{ __('Return to') }} {{ $returnto['name'] }}</a>
      @endif

    </div>
	</div>
</header>
