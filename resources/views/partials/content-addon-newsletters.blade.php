@if(have_rows('newsletter_pdf'))
  @push('content')
    <div class="row">
      <div class="col-12">
        {!! $downloads !!}
      </div> <!-- /col -->
    </div> <!-- /row -->
  @endpush
@endif
