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


    $(window).click(function(e) {
        var duration = 2000;
        var target = $(e.target);
        console.log(target);
        var containerLogin = $('#login_home');
        var containerRegister = $('#register_home');
        if(!target.is('#login_btn_nav') && containerLogin.has(e.target).length === 0  && !target.is('#login_home')){

            $('#login_home').removeClass('login_form_keep');
            $('#login_home').addClass('login_form_out');
            $('#login_home').removeClass('login_form');



      /*          setTimeout(function(){
               $('#login_home').addClass('hidden');
            }, duration);*/
        }
        if(!target.is('#register_btn_nav') && containerRegister.has(e.target).length === 0  && !target.is('#register_home')){
            $('#register_home').removeClass('register_form_keep');
            $('#register_home').addClass('register_form_out');
            $('#register_home').removeClass('register_form');
        }
    });


});
function choose_event(id){
    window.location.href = "./add_advertisement/" +id;
}
function getEventWrapper(i){
    if(i == 0){

        $('#existing_event_btn').removeClass('add_event_active');
        $('#new_event_btn').addClass('add_event_active');
        $('.existing_event_collapse').removeClass('existing_event_collapse_anim');
        $('.new_event_collapse').addClass('new_event_collapse_anim');
    }else if(i ==1){
        $('#existing_event_btn').addClass('add_event_active');
        $('#new_event_btn').removeClass('add_event_active');
        $('.new_event_collapse_anim').addClass('new_event_collapse');
        $('.existing_event_collapse').addClass('existing_event_collapse_anim');
        $('.new_event_collapse').removeClass('new_event_collapse_anim');
    }

}

$('#menucontainer').click(function(event){
    event.stopPropagation();
});

var cookie = document.cookie;
var logorreg = cookie.split(';');
var errors = false;
function keep_login_at_error(){
    errors = true;
    if(logorreg[0] == "logorreg=log"){
    $('#login_home').addClass('login_form_keep');
    $('#login_home').removeClass('login_form');
    $('#login_home').removeClass('hidden');

    $('#register_home').addClass('hidden');

        console.log("login uitgevoerd");
       // $('.showLog').removeClass('hidden');
    }

}



function keep_register_at_error(){
    errors = true;
    if(logorreg[0] == "logorreg=reg"){
    $('#register_home').addClass('register_form_keep');
    $('#register_home').removeClass('register_form');
    $('#register_home').removeClass('hidden');
    $('#login_home').addClass('hidden');
        console.log("reg uitgevoerd");

    }

}
function open_login(){
    if(errors == true){

    }
    document.cookie = "logorreg=log";
    $('.showLog').addClass('hidden');
    $('#login_home').removeClass('login_form_keep');
    $('#login_home').addClass('login_form');
    $('.login_form_out').addClass('login_form');
    $('.login_form').removeClass('login_form_out');
    $('.login_form').removeClass('hidden');
}

function open_register(){
    if(errors == true){

    }
    $('.showReg').addClass('hidden');
    document.cookie = "logorreg=reg";
    $('#register_home').removeClass('register_form_keep');
    $('#register_home').addClass('register_form');
    $('.register_form_out').addClass('register_form');
    $('.register_form').removeClass('register_form_out');
    $('.register_form').removeClass('hidden');
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "-250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

