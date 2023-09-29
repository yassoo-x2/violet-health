/* globale $ */
$(function () {
  'use strict';




//-----------------------filter
  $('#filterproduct').on('keyup', function() {
    var searchText = $(this).val().toLowerCase();
    $('#prodlist #product ').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
    });
  });

  $('#filtercountry').on('keyup', function() {
    var searchText = $(this).val().toLowerCase();
    $('#countrylist .country-feild').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1)
    });
  });

        // When the hospital selection changes
        $("#hospital-select").change(function() {
          const selectedHospital = $(this).val();
          const clinicSelect = $("#clinic-select");

          // Enable all clinic options by default
          clinicSelect.find("option").prop("disabled", false);

          // Disable specific clinic options if a certain hospital is selected
          if (selectedHospital !== "عين البيضا / العيادات - مشفى عين البيضا") {
              clinicSelect.find("option[value='جراحة عامة']").prop("hidden", true);
              clinicSelect.find("option[value='عيادة نفسية']").prop("hidden", true);
              clinicSelect.find("option[value='عيادة عظمية']").prop("hidden", true);
          }
      });


      $("#personal-info-form").submit(function() {
        let isValid = true;

        // Iterate through all select inputs with the class 'select-input'
        $("select").each(function() {
            const selectedOption = $(this).find("option:selected");
            
            // Check if the selected option is disabled
            if (selectedOption.is(":disabled")) {
                isValid = false;

                // Display an error message using Swal or any other method
                Swal.fire({
                    icon: 'error',
                    title: 'الرجاء اختيار قيمة صالحة في جميع الحقول',
                });

                return false; // Exit the loop early
            }
        });

        // Prevent form submission if any select input had an invalid option
        if (!isValid) {
            return false;
        }
    });


});