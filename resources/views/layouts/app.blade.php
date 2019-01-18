@include ('partials.modals.modal-pdf')

<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('body_open'))
    <div id="top">
    @php(do_action('get_header'))
    @include('partials.alert')
    @include('partials.header')
    <div class="wrap" role="document">
			@include('partials.navbar')
      <div class="{!! $container !!}">
        <div class="content row">
          <main class="main">
            @include('partials.submenu')
            @include('partials.breadcrumbs')
            @stack('before-content')
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
              @yield('sidebar')
            </aside>
          @endif
        </div> <!-- /.row, /.content -->
      </div> <!-- /.container -->
      @stack('after-content')
    </div> <!-- /.wrap -->
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
    </div>
    @php(do_action('body_close'))
  </body>
</html>
