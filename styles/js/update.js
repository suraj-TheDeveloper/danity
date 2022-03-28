$(document).ready(function(){
    $("#forms").submit(function(e){
        e.preventDefault();
        const forms = new FormData(this);
        $.ajax({
            url: 'styles/php/update.php',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'html',
            data: forms,
            success: function(data) {
                console.log(data);
                if(data == "Updated") {
                    $("#success").html("Service Updated");
                    window.location.href = 'index.php';
                } else {
                    $("#fail").html("Service not Created");
                }
            }
        })
    });
});