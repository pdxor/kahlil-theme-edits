@push('navbar-right')
<div class="align-self-center"><button id="sds-menu-button" class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#SDSTray" aria-expanded="false" aria-controls="collapseExample">{{ __('Safety Data Sheets') }} <span class="d-none d-lg-inline">{{ __('(SDS)') }}</span> <i class="fa fa-search" aria-hidden="true"></i></button></div>
@endpush

@push('after-navbar')
<div class="bg-dark sds-tray-wrapper">
  <div class="collapse container hidden-xs" id="SDSTray">
    <form id="sds-search-form" role="search" method="get" class="search-form" action="{!! home_url( '/' ) !!}">
      <input type="hidden" name="post_type" value="product" />
      <input type="hidden" class="search-submit" value="Search" />
      <div class="form-group w-100 form-group-lg py-3 mb-0">
        <div class="input-group w-100">
        <label class="control-label sr-only" for="SDSSearch">{!! __('Search for Safety Data Sheets') !!}</label>
          <input name="s" class="form-control" type="text" id="SDSSearch" placeholder="{!! __('Search') !!} {!! $sitename !!} {!! __('for Safety Data Sheets by product name or number') !!}">
          <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-lg" value="GO" /><i class="fa fa-search" aria-hidden="true"></i></button>
           </span>
        </div>
      </div>
    </form>
  </div>
</div>
@endpush
