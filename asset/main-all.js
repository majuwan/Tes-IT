function tampil() {
	// -------------------
	$("#menu").css("display","block");
	$("#menu").addClass('animate__animated animate__fadeInLeft');
	$("#menu-LR").addClass('animate__animated animate__bounceInDown');
	$("#content-menu").addClass('animate__animated animate__flipInX animate__delay-1s');
	$("#menu").removeClass('animate__animated animate__fadeOutLeft');
	$("#arow").removeClass('fa-angles-right');
	$("#arow").addClass('fa-angles-left');
	$("#rubber").addClass('animate__animated animate__rubberBand');

	// -------------------
	$("#set-user").removeClass('animate__animated animate__bounceInUp');
	$("#set-user").addClass('animate__animated animate__bounceOutDown');

	// -------------------
	$("#info-profil").removeClass('animate__animated animate__bounceInDown');	
	$("#info-profil").addClass('animate__animated animate__hinge');	
	$("#showInfo").css("display","block");
}

function hidenMenu() {
	$("#menu").removeClass('animate__animated animate__fadeInLeft');
	$("#menu-LR").removeClass('animate__animated animate__bounceInDown');	
	$("#content-menu").removeClass('animate__animated animate__flipInX animate__delay-1s');
	$("#arow").removeClass('fa-angles-left');
	$("#menu").addClass('animate__animated animate__fadeOutLeft');
	$("#arow").addClass('fa-angles-right');

	// -------------------
	$("#set-user").removeClass('animate__animated animate__bounceInUp');
	$("#set-user").addClass('animate__animated animate__bounceOutDown');
	$("#spin").removeClass('animate__animated animate__rotateIn');
	$("#rubber").removeClass('animate__animated animate__rubberBand');

	// -------------------
	$("#info-profil").removeClass('animate__animated animate__bounceInDown');	
	$("#info-profil").addClass('animate__animated animate__hinge');	
	$("#showInfo").css("display","block");
}

function setus() {
	// -------------------
	$("#set-user").css("display","block");
	$("#set-user").removeClass('animate__animated animate__bounceOutDown');
	$("#set-user").addClass('animate__animated animate__bounceInUp');
	$("#spin").addClass('animate__animated animate__rotateIn');

	// -------------------
	$("#menu").removeClass('animate__animated animate__fadeInLeft');
	$("#menu-LR").removeClass('animate__animated animate__bounceInDown animate__delay-1s');	
	$("#content-menu").removeClass('animate__animated animate__flipInX animate__delay-2s');
	$("#arow").removeClass('fa-angles-left');
	$("#menu").addClass('animate__animated animate__fadeOutLeft');
	$("#arow").addClass('fa-angles-right');

	//--------------------
	$("#info-profil").removeClass('animate__animated animate__bounceInDown');	
	$("#info-profil").addClass('animate__animated animate__hinge');	
	$("#showInfo").css("display","block");
}

function showInfo() {
	$("#info-profil").css("display","block");
	$("#info-profil").addClass('animate__animated animate__bounceInDown');	
	$("#span-info-RL").addClass('animate__animated animate__bounceInRight animate__delay-1s');	
	$("#span-info-conten").addClass('animate__animated animate__zoomInRight animate__delay-2s');	
	$("#showInfo").css("display","none");
	$("#info-profil").removeClass('animate__animated animate__hinge');

	// -------------------
	$("#set-user").removeClass('animate__animated animate__bounceInUp');
	$("#set-user").addClass('animate__animated animate__bounceOutDown');
	$("#spin").removeClass('animate__animated animate__rotateIn');
	$("#rubber").removeClass('animate__animated animate__rubberBand');

	$("#menu").removeClass('animate__animated animate__fadeInLeft');
	$("#menu-LR").removeClass('animate__animated animate__bounceInDown');	
	$("#content-menu").removeClass('animate__animated animate__flipInX animate__delay-1s');
	$("#arow").removeClass('fa-angles-left');
	$("#menu").addClass('animate__animated animate__fadeOutLeft');
	$("#arow").addClass('fa-angles-right');
}

function hideInfo() {
	$("#info-profil").removeClass('animate__animated animate__bounceInDown');	
	$("#info-profil").addClass('animate__animated animate__hinge');	
	$("#showInfo").css("display","block");
}

function nav(x) {
	$("#nav").addClass('animate__animated animate__rotateIn');
}

function stop(x) {
	$("#nav").removeClass('animate__animated animate__rotateIn');
}