import * as Cookies from "js-cookie";
function alreadySubscribed() {
  $('#pdfModal').find('#submit-button, .gform_confirmation_wrapper, form').addClass('d-none');
  $('#pdfModal').find('.alert').removeClass('alert-info').addClass('alert-success');
  $('#pdfModal').find('.alert .message-info').addClass('d-none');
  $('#pdfModal').find('#pdf-button').removeClass('btn-link text-secondary').addClass('btn-primary');
  $('#pdfModal').find('#pdf-button').text('Download PDF');
}

    // Interrupt PDF download to show modal
    $('a[href$=".pdf"]').click(function(e) {
      
            // Prevent the default click behavior
            e.preventDefault();      
      
            // Fire the modal
            $('#pdfModal').modal();
            
            // If the user has already subscribed, hide the form and the submit button
            if(Cookies.get('newsletter') == '1') {
              alreadySubscribed();
            }              
      
            // Get the object of te link that was clicked
            var button = $(e.target);
      
            // Get the URL of the PDF that was clicked
            var pdf = button.attr('href');
      
            // Get the attachment title
            var title = (button.attr('title')) ? button.attr('title') : '';
      
            // Insert the download link into the modal
            $('#pdfModal').find('#pdf-button').attr('href', pdf);
      
            // Insert the link title into the modal
            if(title != null) {
              $('#pdfModal').find('.pdf-title').text(title);
              $("#pdfModal .pdf-filename input").val(title);
            }
      
            // Insert the link into the confirmation message if it's shown
            $('#pdfModal').find('#confirmation-button').attr('href', pdf);
      
            // Return
            return false;
      
          });
      
          // Submit the modal form when the modal button is clicked
          $('#submit-button').on('click', function() {
            $(this).addClass('disabled');
            $('#pdfModal #loaded').addClass('fade').removeClass('show');
            $('#pdfModal #loader').addClass('show');
            $('#pdfModal').find('form').submit();
          });
      
          // Unhide "Continue to Download" link when form submitted.
          jQuery(document).bind("gform_confirmation_loaded", function () {
            Cookies.set('newsletter', '1');
            $('#pdfModal #loaded').addClass('show'); 
            $('#pdfModal #loader').removeClass('show');
            alreadySubscribed();
          });

          // If the form re-renders (like in the case of a validation error) make sure everything is visible.
          jQuery(document).bind('gform_post_render', function(){
            $('#submit-button').removeClass('disabled');
            $('#pdfModal #loaded').addClass('show'); 
            $('#pdfModal #loader').removeClass('show');
        
        });
      