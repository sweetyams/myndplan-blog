function checkForInput(element) {
  // element is passed to the function ^
  
  var $label = $(element).siblings('label');

  if ($(element).val().length > 0) {
    $label.addClass('input-has-value');
  } else {
    $label.removeClass('input-has-value');
  }
}

// The lines below are executed on page load
$('input, textarea').each(function() {
  checkForInput(this);
});

// The lines below (inside) are executed on change & keyup
$('input, textarea').on('change keyup', function() {
  checkForInput(this);  
});