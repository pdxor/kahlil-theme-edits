@if(has_term( '', 'market' ))
  <div class="formulated-for py-2 mb-1">
    {{ __('Formulated for: ') }}
    @foreach(Archive::formulations(get_the_id()) as $term)
      <span class="badge badge-pill badge-secondary" style="background-color: {!! get_field('color', $term); !!}">{!! $term->name !!}</span>
    @endforeach
  </div>
@endif
