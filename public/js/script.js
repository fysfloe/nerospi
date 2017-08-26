jQuery(function($) {
  $('button.value-control').click(function() {
    var feature = $(this).data('feature');
    var $field = $('#' + feature);
    var fieldVal = parseInt($field.val());

    if($(this).data('control') === '+' && fieldVal < $field.attr('max')) {
      $field.val(fieldVal + 1);
    } else if($(this).data('control') === '-' && fieldVal > $field.attr('min')) {
      $field.val(fieldVal - 1);
    }
  })
})
