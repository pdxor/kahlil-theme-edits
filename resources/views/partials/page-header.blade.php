@stack('page-header-before')
<div class="page-header">
  @if(!is_singular('distributor'))
  <h1>{!! App\title() !!}</h1>
  @endif
  @stack('page-header')
</div>
@stack('page-header-after')
