$(document).ready(function() {
$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

    var i=1;
    $('.home_banner').css('background-image','url(./images/homepage_banner/party_1.jpg)');
    setInterval(function(){

            $('.home_banner').css('background-image','url(./images/homepage_banner/party_'+i+'.jpg)');

        if(i <= 3){
            i++;
        }else{
            i=1;
        }
    },6000);
});