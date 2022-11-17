
$(document).ready(function(){
    
    $(".upper").fadeOut(3000);
    $(".lower").fadeOut(3000)
    setInterval(()=>$(".main").fadeIn(2000),2000)
    $('.country').on('change', function() {
        var country_id = this.value;
        $.ajax({
            url: "./statefromcountry.php",
            type: "POST",
            data: {
                country_id: country_id
            },
            cache: false,
            success: function(result){
                $(".state").html(result);
                $('.city').html('<option value="">Select State First</option>'); 
            }
        });
    });    
    $('.state').on('change', function() {
        var state_id = this.value;
        $.ajax({
            url: "./cityfromstate.php",
            type: "POST",
            data: {
                state_id: state_id
            },
            cache: false,
            success: function(result){
                $(".city").html(result);
            }
        });
    });
});

