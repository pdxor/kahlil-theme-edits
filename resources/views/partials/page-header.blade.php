@stack('page-header-before')
<div class="page-header">
  <h1>{!! App\title() !!}</h1>
  @stack('page-header')
</div>
@stack('page-header-after')
