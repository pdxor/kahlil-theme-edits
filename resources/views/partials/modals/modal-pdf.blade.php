@push('footer')

<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">{{ __('Download') }} <span class="pdf-title">{{ __('PDF') }}</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="loader" class="fade"><i class="mx-auto fa fa-refresh fa-spin fa-5x fa-fw text-secondary"></i></div>
        <div id="loaded">
          <div class="alert alert-info text-center">
            <h4>{{ __('Thank you for your interest!') }}</h4>
            <p class="message-info">{!! __('Enter your name and email address for more information about MicroCare products and services.') !!}</p>
          </div>
          @php(do_action('pdf_modal_form'))
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <a id="submit-button" href="#" class="btn btn-primary">{!! __('Sign Up and Download PDF') !!}</a>
        <a id="pdf-button" href="#" target="_new" class="btn btn-link text-secondary" onclick="jQuery('#pdfModal').modal('hide')">Skip and Download PDF</a>
      </div>
    </div>
  </div>
</div>

@endpush
