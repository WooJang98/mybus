$(document).ready(function() {
    
    $(".replay-mode").submit(function(event) {
        
        event.preventDefault();

        var formData = {
            client: $(".client_r").val(),
            vnum: $(this).find(".vnum").val(),
            date: $(".date-picker.selected").attr("date"), //date
            
        };
    
        $.ajax({
            type: "GET",
            url: "/searchReplay", 
            data: formData, 
            dataType: "json",

            success: function(response) {
                console.log(response); 
            },
            error: function(error) {
                console.error("오류 발생:", error);
            }
        });
    });
});



