$(function () {
    'use strict';
//================================chnge lang
$('.set_lang').on('click', function() {
  if ($(this).is(':checked') ) {
    var lang = "en";
  }
  else {
    var lang = "ar";
  }
  var toggleStatus = $(this).is(':checked');
  localStorage.setItem('langToggleStatus', toggleStatus);

  // Send AJAX request to the server to change the language
  $.ajax({
    url: 'refresh.php', // Replace with the actual URL to your server-side script
    method: 'POST', // or 'GET' depending on your server-side implementation
    data: { lang: lang }, // Pass the language value as data to the server
    success: function(response) {
      // Handle the success response, e.g., display a success message or reload the page
      console.log('Language changed successfully');
      location.reload(); // Reload the page to reflect the language change
    },
    error: function(xhr, status, error) {
      // Handle the error response, e.g., display an error message
      console.error('Language change failed:', error);
    }
  });
});

  // Retrieve the toggle button status from local storage
  var toggleStatus = localStorage.getItem('langToggleStatus');

  // Update the toggle button based on the retrieved status
  if (toggleStatus === 'true') {
    $('.set_lang').prop('checked', true);
  } else {
    $('.set_lang').prop('checked', false);
  }

  //=====================get benef data
  $('#search').on('blur',function(){
    var value = $(this).val();

      // Send AJAX request to the server to change the language
  $.ajax({
    url: 'refresh.php', 
    method: 'POST', 
    dataType: 'json', 
    data: { search : value }, 
    success: function(response) {
      $('.first').val(response[0].first_name);
      $('.first').val(response[0].first_name);
      $('.first').val(response[0].first_name);      

    },
    error: function(xhr, status, error) {
      console.error( error);
    }
  });
  } )




})