$(document).ready(function () {

    $('#patient-name').keyup(function () {
        
        // $('#submit-test').submit(function () {
            // console.log("object");
            // var data = $(this).serialize();

           /*  $.ajax({
                url: 'test.php',
                type: 'post',
                dataType: 'html',
                data: "data",
                success: function (data) {
                    $('#result').empty().html(data);
                    console.log("success");
                }
            }); */
            var patientName = $('#patient-name').val();
            $.ajax({
                // url: 'test.php',
                url: './patient-management.php',
                // dataType: 'html',
                data: {test: patientName},
                type: 'post',
                success: function(php_script_response){
                    // alert(php_script_response);
                }
        
             });
        
        });
    // });
});
// 
