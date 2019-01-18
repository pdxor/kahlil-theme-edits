@if($the_resources)
  @foreach($the_resources as $item)

    @push('productnav')
    <li class="nav-item"><a class="flex-sm-fill nav-link" href="#{!! $item['id'] !!}">{!! $item['name'] !!}</a></li>
    @endpush

    @push('content')
    <section class="related-resources" id="{!! $item['id'] !!}">
      <h3>{!! $item['name'] !!}</h3>
      @include('partials/resources/related-resources-' . $item['id'])
    </section>
    @endpush

  @endforeach
@endif
