$(document).ready(function(){
  $('#office-name').live('change', function() {
    if($(this).val().length != 0) {
      $.getJSON('/offices/get_administration_ajax',
                  {Office.id: $(this).val()},
                  function(administrations) {
                    if(administrations !== null) {
                      populateAdministrationList(administrations);
                    }
        });
      }
    });
});

function populateAdministrationsList(administrations) {
  var options = '';

  $.each(administrations, function(index, administration) {
    options += '<option value="' + index + '">' + administration + '</option>';
  });
  $('#administration_office_name').html(options);
  $('#office-administration').show();

}