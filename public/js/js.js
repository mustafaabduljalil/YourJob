$(window).scroll(function(){

	$(this).scrollTop() > 400 ? $("#btn-top").show() : $("#btn-top").hide() ;

	// $(this).scrollTop() > 40 ? $(".navbar-default").css('background-color','rgba(0,0,0,0.4)') : $(".navbar-default").css('background-color','transparent');
	// $(this).scrollTop() > 40 ? $(".navbar-default .navbar-nav>li>a").css('color','#fff') : $(".navbar-default .navbar-nav>li>a").css('color','#777');

	$("#btn-top").click(function(){

		$("html,body").animate({scrollTop:0},700);
	});


});


$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });
})    
    

    $(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});


$(document).on("click", ".open", function () {
     var myId = $(this).data('id');
     $(".modal-body #id").val( myId );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});



$(document).on("click", ".edit", function () {
     var myEmail = $(this).data('email');
     $("#email").val( myEmail );
     // As pointed out in comments, 
     // it is superfluous to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});




$(document).ready(function(){
    $('.profile').initial({charCount:2,width:200,height:200}); 
    $('.profile_search').initial({charCount:2,width:50,height:50,fontSize:18}); 
    $('.profile_nav').initial({charCount:1,width:25,height:25,fontSize:20}); 
    $('.profile_logo').initial({charCount:1,width:150,height:150,fontSize:60}); 


});