$(document).ready(function() {
$(".datepicker").datepicker({ dateFormat: 'dd-mm-yy' });

    var i=1;
    $('.home_banner').css('background-image','url(./images/homepage_banner/party_1.jpg)');
    setInterval(function(){

            $('.home_banner').css('background-image','url(./images/homepage_banner/party_'+i+'.jpg)');

        if(i <= 4){
            i++;
        }else{
            i=1;
        }
    },6000);
});