@push('footer')
<footer class="content-info">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-white">
      @php(dynamic_sidebar('sidebar-footer'))
      </div>
      <div class="col-md-6 text-right">
        <h3>{{ __('Follow Us!') }}</h3>
        <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
            <a class="text-corporate" href="https://www.youtube.com/channel/UC7Shw-MSSiM_FW1K8Bbi1SQ">
              <span class="fa-stack fa-3x">
                <i class="fa fa-square text-white fa-stack-1x" aria-hidden="true"></i>
                <i class="fa fa-youtube-square fa-stack-1x" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="text-corporate" href="https://www.linkedin.com/company/microcare-corporation/">
              <span class="fa-stack fa-3x">
                <i class="fa fa-square text-white fa-stack-1x" aria-hidden="true"></i>
                <i class="fa fa-linkedin-square fa-stack-1x" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="text-corporate" href="https://twitter.com/MicroCareNews/">
              <span class="fa-stack fa-3x">
                <i class="fa fa-square text-white fa-stack-1x" aria-hidden="true"></i>
                <i class="fa fa-twitter-square fa-stack-1x" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="text-corporate" href="https://www.facebook.com/MicroCareCorporation/">
              <span class="fa-stack fa-3x">
                <i class="fa fa-square text-white fa-stack-1x" aria-hidden="true"></i>
                <i class="fa fa-facebook-square fa-stack-1x" aria-hidden="true"></i>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div> <!-- /.row --> 
  </div> <!-- /.container -->
</footer>
@endpush
