$(document).ready(function(){
    $("#forms").submit(function(e){
        e.preventDefault();
        const forms = new FormData(this);
        var service = $("#service").val();
        var price = $("#price").val();
        if(service == "" && price == "") {
            $("#fail").html("Please fill all the fields");
        } else {
            $.ajax({
                url: 'styles/php/service.php',
                type: 'POST',
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'html',
                data: forms,
                success: function(data) {
                    if(data == "Inserted") {
                        $("#success").html("Service Created");
                        window.location.href = 'index.php';
                    } else {
                        $("#fail").html("Service not Created");
                    }
                }
            })
        }
    });
});