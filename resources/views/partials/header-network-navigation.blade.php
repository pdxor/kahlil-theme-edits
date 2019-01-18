<header class="bg-light">
  <div class="container">
    <div class="row d-flex">

      @if($languages_list_menu)
      <div class="btn-group mr-auto ml-2">
        <button class="btn btn-light text-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-language" aria-hidden="true"></i><span class="sr-only">{{ __('Translate', 'microcare_theme') }}</span> <span class="hidden-sm hidden-xs caret"></span>
        </button>
        <nav id="menu-translate" class="dropdown-menu">
            {!! $languages_list_menu !!}
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Google Translate</h6>

            @if (has_nav_menu('google_languages'))
              {!! strip_tags(wp_nav_menu($googletranslatemenu), '<a><span>') !!}
            @endif

        </nav>
      </div> <!-- /.btn-group -->
      @endif

      <div class="d-none d-lg-block ml-auto">
        @include('partials/network-navigation')
      </div>

  </div>
</div>
</header>
