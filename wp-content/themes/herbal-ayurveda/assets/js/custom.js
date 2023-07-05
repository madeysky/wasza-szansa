function herbal_ayurveda_menu_open_nav() {
	window.herbal_ayurveda_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function herbal_ayurveda_menu_close_nav() {
	window.herbal_ayurveda_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.herbal_ayurveda_currentfocus=null;
  	herbal_ayurveda_checkfocusdElement();
	var herbal_ayurveda_body = document.querySelector('body');
	herbal_ayurveda_body.addEventListener('keyup', herbal_ayurveda_check_tab_press);
	var herbal_ayurveda_gotoHome = false;
	var herbal_ayurveda_gotoClose = false;
	window.herbal_ayurveda_responsiveMenu=false;
 	function herbal_ayurveda_checkfocusdElement(){
	 	if(window.herbal_ayurveda_currentfocus=document.activeElement.className){
		 	window.herbal_ayurveda_currentfocus=document.activeElement.className;
	 	}
 	}
 	function herbal_ayurveda_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.herbal_ayurveda_responsiveMenu){
			if (!e.shiftKey) {
				if(herbal_ayurveda_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				herbal_ayurveda_gotoHome = true;
			} else {
				herbal_ayurveda_gotoHome = false;
			}

		}else{

			if(window.herbal_ayurveda_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.herbal_ayurveda_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.herbal_ayurveda_responsiveMenu){
				if(herbal_ayurveda_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					herbal_ayurveda_gotoClose = true;
				} else {
					herbal_ayurveda_gotoClose = false;
				}
			
			}else{

			if(window.herbal_ayurveda_responsiveMenu){
			}}}}
		}
	 	herbal_ayurveda_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});