$(document).ready(function(){
    $("#details").submit(function(e){
        e.preventDefault();
        console.log("hitted");
        const forms = new FormData(this);
        $.ajax({
            url: 'styles/php/carts.php',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'html',
            data: forms,
            success: function(data) {
                // console.log(data);
                if(data == "Inserted") {
                    $("#button").removeClass("btn-outline-primary");
                    $("#button").addClass("btn-outline-success");
                    $("#button").html("Added to cart");
                } else {
                    $("#button").removeClass("btn-outline-primary");
                    $("#button").addClass("btn-outline-danger");
                    $("#button").html("Failed");
                }
            }
        })
    });
});