$(document).ready(function() {
  $('#keyword').on('keyup', function() {
    $('#products-library').load('functions/live-search.php?keyword=' + $('#keyword').val());
  })
})