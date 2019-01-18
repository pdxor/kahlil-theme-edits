@if(get_field('download') || get_field('pdf'))
  @push('content')
    <div class="row">
      <div class="col-sm-8">
        {!! $downloads !!}
      </div> <!-- /col -->
    </div> <!-- /row -->
  @endpush
@endif
