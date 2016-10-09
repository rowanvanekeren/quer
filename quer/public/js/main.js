$(document).ready(function() {
$(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    $(".homepage-events-repeated:first-child").addClass("homepage_first-event");

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

    /* Set the width of the side navigation to 250px */

    /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */





});

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "-250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}