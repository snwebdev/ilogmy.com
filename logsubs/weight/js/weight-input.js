

Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

$(document).ready( function() {
   
    $('#date').val(new Date().toDateInputValue());
    $("#ilogmyTitle").html("weight");
    
    $('#weightInputForm').on("submit", function(e) {
        e.preventDefault();
        $("#alertDiv").html("");
       // alert("form submitted");
        
        //check if we have a record for this date
        var date = $("input[name='date']").val();
        
        var formData = $('#weightInputForm').serializeArray();

       
        //alert(date);
        $.ajax({
            type:"POST",
            url:"checkIfDateAlreadyUsed.php",
            data: formData,
            success: function (response) {
               if(response === "yes"){
                 //s alert("used date");
                  // $("#dateAlreadyUsedModal").modal('show');
                  $("#alertDiv").html('<div id="alert" class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert">×</a><strong>Warning!</strong> You already have a record for this date!</div></div>');
               } else {
                   //alert("new date");
                   $.ajax({
                       type:"POST",
                       url: "logWeight.php",
                       data: formData,
                       success: function() {
                          // alert ("recorded");
                          window.location.href = "display.php";
                       }
                   });
               }
            },
             error: function (response) {
                alert("error" +JSON.stringify(response));
            }
            
   
        });
    });
    
});

