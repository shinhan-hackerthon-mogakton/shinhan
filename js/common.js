// JavaScript Document

$(document).ready(function(){
	
	$(".menuBtn").click(function(){
		
		$(".subNavi").slideToggle(300);
		
		return false;
	});
	
	$(".close").click(function(){
		
		$(".login_wrap").fadeOut(300);
		
		return false;
	});
	$(".loginBtn").click(function(){
		
		$(".login_wrap").fadeIn(300);
		
		return false;
	});
	
	$(".login_button").click(function(){
		
		setTimeout(function() {

		  $(".login_wrap").fadeOut(300);
		
		}, 300);
		
		return false;
	});
	
});
