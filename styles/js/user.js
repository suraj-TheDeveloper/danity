$(document).ready(function(){
    $("#user").submit(function(e){
        e.preventDefault();
        const forms = new FormData(this);
        var name = $("#name").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        if(name == "" && phone == "" && address == "") {
            $("#fail").html("Please fill all the fields");
        } else {
            $.ajax({
                url: 'styles/php/user.php',
                type: 'POST',
                contentType: false,
                processData: false,
                cache: false,
                dataType: 'html',
                data: forms,
                success: function(data) {
                    console.log(data);
                    // if(data == "Inserted") {
                    //     $("#success").html("Service Created");
                    //     window.location.href = 'index.php';
                    // } else {
                    //     $("#fail").html("Service not Created");
                    // }
                }
            })
        }
    });
});