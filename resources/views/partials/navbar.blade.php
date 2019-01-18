
@if(isset($isplatform))
  @include('partials/navbar/navbar-sds-button')
@endif

<div class="navbar-wrapper">
<nav class="navbar navbar-expand-lg">
	<div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ $icon }}">
      </a>
      <button class="navbar-toggler ml-2 py-2 align-self-center" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				Menu
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
					@if (has_nav_menu('primary_navigation'))
						{!! wp_nav_menu($primarymenu) !!}
					@endif

          @if (has_nav_menu('corporate_navigation'))
            <div class="d-lg-none">
              {!! wp_nav_menu($corporatemenu) !!}
            </div>
          @endif
			</div> <!-- /.collapse -->
      <div class="ml-auto align-self-center d-flex">
        @stack('navbar-right')
      </div> <!-- /.ml-auto -->
		</div> <!-- /.container -->
	</nav>
  @stack('after-navbar')
</div>
