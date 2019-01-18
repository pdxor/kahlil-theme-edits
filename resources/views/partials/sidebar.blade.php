@if(isset($iscorporate))
  @include('partials/sidebar/sidebar-corporate-contact')
@endif

<div class="sidebar-inner">
  @php(dynamic_sidebar('sidebar-primary'))
  @stack('after-sidebar')
</div>
