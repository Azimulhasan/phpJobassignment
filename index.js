alert("This is this hell");
$(document).ready(function(){
    
    $(".upper").fadeOut(3000);
    $(".lower").fadeOut(3000)
    setInterval(()=>$(".main").fadeIn(4000),3000)
});

