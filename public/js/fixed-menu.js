jQuery(document).ready(function($) {    
    
    //selector đến menu cần làm việc

    var TopFixMenu = $(".navbar-inverse");

    // dùng sự kiện cuộn chuột để bắt thông tin đã cuộn được chiều dài là bao nhiêu.

    $(window).scroll(function(){

    // Nếu cuộn được hơn 150px rồi

        if($(this).scrollTop()>280){

        // Tiến hành show menu ra    

        TopFixMenu.addClass("fixed-menu");

        }else{

        // Ngược lại, nhỏ hơn 150px thì hide menu đi.

            TopFixMenu.removeClass("fixed-menu");

        }}

    )

});