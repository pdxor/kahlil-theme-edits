@push('after-sidebar')
<div class="p-0">
  <ul class="list-group list-group-contact">
    <li class="list-group-item bg-dark text-white p-2">
      <h4 class="m-0 ">
        <div class="row">
          <div class="col-md-3 col-xs-3 hidden-sm d-flex align-items-end">
            <img class="img-fluid" src="@asset('images/sidebar-contact.png')">
          </div>
          <div class="col-md-9 col-sm-12 col-xs-9">
            {{ __('Ask an Expert About') }}
            <small><?=get_bloginfo('name');?></small>
          </div>
        </div> <!-- /row -->
      </h4>
    </li>
    <li class="list-group-item">
        <h5>North America</h5>
        <address>
          <div>1 800 638 0125</div>
          <div>+1 860 827 0626</div>
        </address>
    </li>
    <li class="list-group-item">
        <h5>Europe (Belgium)</h5>
        <address>+32 2 251 9505</address>
    </li>
    <li class="list-group-item">
        <h5>Asia (Singapore)</h5>
        <address>+65 6271 0182</address>
    </li>
    <li class="list-group-item">
      <a href="/contact-us/" class="btn btn-secondary btn-lg btn-block">Email Your Question</a>
    </li>
  </ul>
</div>
@endpush
