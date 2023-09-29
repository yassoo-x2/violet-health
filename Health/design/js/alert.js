$(function () {
    'use strict';
    
    $("#visit_date").blur(function() {
        const selectedDate = new Date($("#visit_date").val());
        const currentDate = new Date();

        // Check if the selected date is Friday, Saturday, or in the past
        if (selectedDate.getDay() === 5 || selectedDate.getDay() === 6 || selectedDate <= currentDate) {
            // Prevent form submission


            // Display an error message
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: false,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
                Toast.fire({
                    icon: 'error',
                    title: 'لايمكن الحجز ايام العطلة او في تاريخ سابق'
                })
                $("#visit_date").val('');
        }
    });
















})