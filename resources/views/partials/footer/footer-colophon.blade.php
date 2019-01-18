@push('footer')
<div class="colophon">
  <div class="container">
    @if (has_nav_menu('footer_navigation'))
      {!! wp_nav_menu($footermenu) !!}
    @endif
    <div class="text-center">
      &copy; 2009 – <?php echo date('Y'); ?> MicroCare Electronics. All rights reserved.
      <br />Site designed and developed by <a href="https://www.thewalkergroup.com">The Walker Group</a>
    </div>
  </div>
</div>
@endpush
