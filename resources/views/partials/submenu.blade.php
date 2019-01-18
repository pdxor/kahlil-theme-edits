@push('before-content')

@if(wp_nav_menu($submenu))
<div class="bg-light py-2">
  <nav class="submenu container">
      @if (has_nav_menu('primary_navigation') )
        {!! wp_nav_menu($submenu) !!}
      @endif
  </nav>
</div>
@endif

@endpush
