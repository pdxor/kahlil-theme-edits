@if($alert)
  <div class="alert alert-{{ $alert['alert_type'] }} mb-0 rounded-0">
    <div class="container">
      {!! $alert['content'] !!}
    </div> <!-- /.container -->
  </div> <!-- /.alert -->
@endif