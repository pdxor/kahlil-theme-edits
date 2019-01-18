@if(get_field('video'))
  @push('content')
    <div class="row justify-content-center">
      <div class="col-sm-8">
        {!! get_field('video') !!}
      </div> <!-- /col -->
    </div> <!-- /row -->
  @endpush
@endif
