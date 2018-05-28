$(function(){

	$("#error_firstname") . hide();
	$("#error_lastname").hide();
	$("#error_usename").hide();
	$("#error_email").hide();
	$("#error_password").hide();
	var e_firstname = false;
	var e_lastname = false;
	var e_username = false;
	var e_email = false;
	var e_password = false;

	$("username").focusout (function()
	{
		alert("test");
	});
});