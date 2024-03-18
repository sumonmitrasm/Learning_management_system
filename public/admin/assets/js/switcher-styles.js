let html = document.querySelector('html');

//Switcher Styles
function switcherEvents() {
	'use strict';

	/***************** RTL Start*********************/
	$(document).on("click", '#myonoffswitch55', function () {
		if (this.checked) {
			$('body').addClass('rtl');
			$('body').removeClass('ltr');
			$("html[lang=en]").attr("dir", "rtl");
			$(".select2-container").attr("dir", "rtl");
			$('.fc-theme-standard').removeClass('fc-direction-ltr');
			$('.fc-theme-standard').addClass('fc-direction-rtl');
			$('.fc-header-toolbar').removeClass('fc-toolbar-ltr');
			$('.fc-header-toolbar').addClass('fc-toolbar-rtl');
			localStorage.setItem("dashticrtl", true);
			localStorage.removeItem("dashticltr");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

			var carousel = $('.owl-carousel');
			$.each(carousel, function (index, element) {
				// element == this
				var carouselData = $(element).data('owl.carousel');
				carouselData.settings.rtl = true; //don't know if both are necessary
				carouselData.options.rtl = true;
				$(element).trigger('refresh.owl.carousel');
			});
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
			}
		}
	});
	/***************** RTL End *********************/

	/***************** LTR Start *********************/
	$(document).on("click", '#myonoffswitch54', function () {

		if (this.checked) {
			$('body').addClass('ltr');
			$('body').removeClass('rtl');
			$("html[lang=en]").attr("dir", "ltr");
			$(".select2-container").attr("dir", "ltr");
			$('.fc-theme-standard').addClass('fc-direction-ltr');
			$('.fc-theme-standard').removeClass('fc-direction-rtl');
			$('.fc-header-toolbar').addClass('fc-toolbar-ltr');
			$('.fc-header-toolbar').removeClass('fc-toolbar-rtl');
			localStorage.setItem("dashticltr", true);
			localStorage.removeItem("dashticrtl");
			$("head link#style").attr("href", $(this));
			(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css"));
			var carousel = $('.owl-carousel');
			$.each(carousel, function (index, element) {
				// element == this
				var carouselData = $(element).data('owl.carousel');
				carouselData.settings.rtl = false; //don't know if both are necessary
				carouselData.options.rtl = false;
				$(element).trigger('refresh.owl.carousel');
			});
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
			}
		} 
	});
	/***************** LTR End*********************/

	/***************** LIGHT THEME Start*********************/
	$(document).on("click", '#myonoffswitch1', function () {
		if (this.checked) {
			$('body').addClass('light-mode');
			$('body').removeClass('dark-mode');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');

			$('#myonoffswitch3').prop('checked', true);
			$('#myonoffswitch6').prop('checked', true);

			localStorage.setItem('dashticlightMode', true)
			localStorage.removeItem('dashticdarkMode', false)
		} 
	});
	/***************** LIGHT THEME End *********************/

	/***************** DARK THEME Start*********************/
	$(document).on("click", '#myonoffswitch2', function () {
		if (this.checked) {
			$('body').addClass('dark-mode');
			$('body').removeClass('light-mode');
			$('body').removeClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('dark-menu');
			$('body').removeClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');

			$('#myonoffswitch5').prop('checked', true);
			$('#myonoffswitch8').prop('checked', true);

			html.style.removeProperty("--dark-body");
			html.style.removeProperty("--dark-theme");
			localStorage.removeItem("dashticbgColor");
			localStorage.removeItem("dashticthemeColor");

			localStorage.setItem('dashticdarkMode', true);
			localStorage.removeItem('dashticlightMode', false);
			
		} 
	});
	/***************** Dark THEME End*********************/

	/***************** VERTICAL-MENU Start*********************/
	$(document).on("click", '#myonoffswitch34', function () {
		if (this.checked) {
			$('body').removeClass('horizontal');
			$('body').removeClass('horizontal-hover');
			$(".main-content").removeClass("horizontal-content");
			$(".main-content").addClass("app-content");
			$(".main-container").removeClass("container");
			$(".main-container").addClass("container-fluid");
			$(".app-header").removeClass("hor-header");
			$(".app-header").addClass("side-header");
			$(".app-sidebar").removeClass("horizontal-main")
			$(".main-sidemenu").removeClass("container")
			$('#slide-left').removeClass('d-none');
			$('#slide-right').removeClass('d-none');
			$('body').addClass('sidebar-mini');

			$('#myonoffswitch13').prop('checked', true);

			localStorage.setItem("dashticvertical", true);
			localStorage.removeItem("dashtichorizontal");
			localStorage.removeItem("dashtichorizontalHover");
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				menuClick();
				responsive();
			}
		} 
	});
	/***************** VERTICAL-MENU End*********************/

	/***************** HORIZONTAL-CLICK-MENU Start*********************/
	$(document).on("click", '#myonoffswitch35', function () {
		if (this.checked) {
			if (window.innerWidth >= 992) {
				let li = document.querySelectorAll('.side-menu li')
				li.forEach((e, i) => {
					e.classList.remove('is-expanded')
				})
				var animationSpeed = 300;
				// first level
				var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
				var ul = parent.find('ul:visible').slideUp(animationSpeed);
				ul.removeClass('open');
				var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
				var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
				ul1.removeClass('open');
			}
			$('body').addClass('horizontal');
			$(".main-content").addClass("horizontal-content");
			$(".main-content").removeClass("app-content");
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
			$(".app-header").addClass("hor-header");
			$(".app-header").removeClass("side-header");
			$(".app-sidebar").addClass("horizontal-main")
			$(".main-sidemenu").addClass("container")
			$('body').removeClass('sidebar-mini');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('horizontal-hover');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');

			localStorage.setItem("dashtichorizontal", true);
			localStorage.removeItem("dashtichorizontalHover");
			localStorage.removeItem("dashticvertical");
			// $('#slide-left').removeClass('d-none');
			// $('#slide-right').removeClass('d-none');
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				ActiveSubmenu();
				menuClick();
				responsive();
				document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
			}
		}
	});
	/***************** HORIZONTAL-CLICK-MENU End*********************/

	/***************** HORIZONTAL-HOVER-MENU Start*********************/
	$(document).on("click", '#myonoffswitch111', function () {
		if (this.checked) {
			let li = document.querySelectorAll('.side-menu li')
			li.forEach((e, i) => {
				e.classList.remove('is-expanded')
			})
			var animationSpeed = 300;
			// first level
			var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('open');
			var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
			var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
			ul1.removeClass('open');
			$('body').addClass('horizontal-hover');
			$('body').addClass('horizontal');
			let subNavSub = document.querySelectorAll('.sub-slide-menu');
			subNavSub.forEach((e) => {
				e.style.display = '';
			})
			let subNav = document.querySelectorAll('.slide-menu')
			subNav.forEach((e) => {
				e.style.display = '';
			})
			// $('#slide-left').addClass('d-none');
			// $('#slide-right').addClass('d-none');
			$(".main-content").addClass("horizontal-content");
			$(".main-content").removeClass("app-content");
			$(".main-container").addClass("container");
			$(".main-container").removeClass("container-fluid");
			$(".app-header").addClass("hor-header");
			$(".app-header").removeClass("side-header");
			$(".app-sidebar").addClass("horizontal-main")
			$(".main-sidemenu").addClass("container")
			$('body').removeClass('sidebar-mini');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');

			localStorage.setItem("dashtichorizontalHover", true);
			localStorage.removeItem("dashtichorizontal");
			localStorage.removeItem("dashticvertical");
			HorizontalHovermenu();
			if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
				checkHoriMenu();
				responsive();
				document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
			}
		}
	});
	/***************** HORIZONTAL-HOVER-MENU End*********************/

	/***************** DEFAULT-MENU Start*********************/
	$(document).on("click", '#myonoffswitch13', function () {
		if (this.checked) {
			$('body').addClass('default-menu');
			hovermenu();
			$('body').removeClass('closed-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('sidenav-toggled');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("dashticdefaultmenu", true);
			localStorage.removeItem("dashticclosedmenu");
			localStorage.removeItem("dashticicontextmenu");
			localStorage.removeItem("dashticsideiconmenu");
			localStorage.removeItem("dashtichoversubmenu");
			localStorage.removeItem("dashtichoversubmenu1");
		}
	});
	/***************** DEFAULT-MENU End*********************/

	/***************** CLOSED-MENU Start*********************/
	$(document).on("click", '#myonoffswitch30', function () {
		if (this.checked) {
			$('body').addClass('closed-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("dashticclosedmenu", true);
			localStorage.removeItem("dashticdefaultmenu");
			localStorage.removeItem("dashticicontextmenu");
			localStorage.removeItem("dashticsideiconmenu");
			localStorage.removeItem("dashtichoversubmenu");
			localStorage.removeItem("dashtichoversubmenu1");
		}
	});
	/***************** CLOSED-MENU End*********************/

	/***************** ICON-TEXT-MENU Start*********************/
	$(document).on("click", '#myonoffswitch14', function () {
		if (this.checked) {
			$('body').addClass('icontext-menu');
			icontext();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("dashticicontextmenu", true);
			localStorage.removeItem("dashticdefaultmenu");
			localStorage.removeItem("dashticclosedmenu");
			localStorage.removeItem("dashticsideiconmenu");
			localStorage.removeItem("dashtichoversubmenu");
			localStorage.removeItem("dashtichoversubmenu1");

		}
	});
	/***************** ICON-TEXT-MENU End*********************/

	/***************** ICON-OVERLAY-MENU Start*********************/
	$(document).on("click", '#myonoffswitch15', function () {
		if (this.checked) {
			$('body').addClass('sideicon-menu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("dashticsideiconmenu", true);
			localStorage.removeItem("dashticdefaultmenu");
			localStorage.removeItem("dashticclosedmenu");
			localStorage.removeItem("dashticicontextmenu");
			localStorage.removeItem("dashtichoversubmenu");
			localStorage.removeItem("dashtichoversubmenu1");
		}
	});
	/***************** ICON-OVERLAY-MENU End*********************/

	/***************** HOVER-SUBMENU-MENU Start*********************/
	$(document).on("click", '#myonoffswitch32', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu1');
			localStorage.setItem("dashtichoversubmenu", true);
			localStorage.removeItem("dashticdefaultmenu");
			localStorage.removeItem("dashticclosedmenu");
			localStorage.removeItem("dashticicontextmenu");
			localStorage.removeItem("dashticsideiconmenu");
			localStorage.removeItem("dashtichoversubmenu1");
		}
	});
	/***************** HOVER-SUBMENU-MENU End*********************/

	/***************** HOVER-SUBMENU-MENU-1 Start*********************/
	$(document).on("click", '#myonoffswitch33', function () {
		if (this.checked) {
			$('body').addClass('hover-submenu1');
			hovermenu();
			$('body').addClass('sidenav-toggled');
			$('body').removeClass('default-menu');
			$('body').removeClass('icontext-menu');
			$('body').removeClass('sideicon-menu');
			$('body').removeClass('closed-menu');
			$('body').removeClass('hover-submenu');
			localStorage.setItem("dashtichoversubmenu1", true);
			localStorage.removeItem("dashticdefaultmenu");
			localStorage.removeItem("dashticclosedmenu");
			localStorage.removeItem("dashticicontextmenu");
			localStorage.removeItem("dashticsideiconmenu");
			localStorage.removeItem("dashtichoversubmenu");
		}
	});
	/***************** HOVER-SUBMENU-MENU-1 End*********************/

	/***************** BODY-STYLE Start*********************/
	$(document).on("click", '#myonoffswitch06', function () {
		if (this.checked) {
			$('body').addClass('body-style1');
			$('body').removeClass('body-default');
			localStorage.setItem("dashticbodystyle", true);
			localStorage.removeItem("dashticdefaultbody");
		}
	});

	$(document).on("click", '#myonoffswitch07', function () {
		if (this.checked) {
			$('body').removeClass('body-style1');
			$('body').addClass('body-default');
			localStorage.setItem("dashticdefaultbody", true);
			localStorage.removeItem("dashticbodystyle");
		}
	});
	/***************** BODY-STYLE End*********************/

	/***************** LAYOUT-STYLE Start*********************/
	$(document).on("click", '#myonoffswitch9', function () {
		if (this.checked) {
			$('body').addClass('layout-fullwidth');
			$('body').removeClass('layout-boxed');
			localStorage.setItem("dashticfullwidth", true);
			localStorage.removeItem("dashticboxedwidth");
		}
	});

	$(document).on("click", '#myonoffswitch10', function () {
		if (this.checked) {
			$('body').addClass('layout-boxed');
			$('body').removeClass('layout-fullwidth');
			localStorage.setItem("dashticboxedwidth", true);
			localStorage.removeItem("dashticfullwidth");
		}
	});
	/***************** LAYOUT-STYLE End*********************/

	/***************** LAYOUT-POSITIONS Start*********************/
	$(document).on("click", '#myonoffswitch11', function () {
		if (this.checked) {
			$('body').addClass('fixed-layout');
			$('body').removeClass('scrollable-layout');
			localStorage.setItem("dashticfixed", true);
			localStorage.removeItem("dashticscrollable");
		}
	});

	$(document).on("click", '#myonoffswitch12', function () {
		if (this.checked) {
			$('body').addClass('scrollable-layout');
			$('body').removeClass('fixed-layout');
			localStorage.setItem("dashticscrollable", true);
			localStorage.removeItem("dashticfixed");
		}
	});
	/***************** LAYOUT-POSITIONS End*********************/

	/***************** MENU-STYLES Start*********************/
	$(document).on("click", '#myonoffswitch3', function () {
		if (this.checked) {
			$('body').addClass('light-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('dark-menu');
			localStorage.setItem("dashticlightmenu", true);
			localStorage.removeItem("dashticcolormenu");
			localStorage.removeItem("dashticdarkmenu");
		}
	});
	
	$(document).on("click", '#myonoffswitch4', function () {
		if (this.checked) {
			$('body').addClass('color-menu');
			$('body').removeClass('light-menu');
			$('body').removeClass('dark-menu');
			localStorage.setItem("dashticcolormenu", true);
			localStorage.removeItem("dashticlightmenu");
			localStorage.removeItem("dashticdarkmenu");
		}
	});
	
	$(document).on("click", '#myonoffswitch5', function () {
		if (this.checked) {
			$('body').addClass('dark-menu');
			$('body').removeClass('color-menu');
			$('body').removeClass('light-menu');
			localStorage.setItem("dashticdarkmenu", true);
			localStorage.removeItem("dashticlightmenu");
			localStorage.removeItem("dashticcolormenu");
		}
	});
	/***************** MENU-STYLES End*********************/

	/***************** HEADER-STYLES Start*********************/
	$(document).on("click", '#myonoffswitch6', function () {
		if (this.checked) {
			$('body').addClass('light-header');
			$('body').removeClass('color-header');
			$('body').removeClass('dark-header');
			localStorage.setItem("dashticlightheader", true);
			localStorage.removeItem("dashticcolorheader");
			localStorage.removeItem("dashticdarkheader");
		} 
	});

	$(document).on("click", '#myonoffswitch7', function () {
		if (this.checked) {
			$('body').addClass('color-header');
			$('body').removeClass('light-header');
			$('body').removeClass('dark-header');
			localStorage.setItem("dashticcolorheader", true);
			localStorage.removeItem("dashticlightheader");
			localStorage.removeItem("dashticdarkheader");
		}
	});

	$(document).on("click", '#myonoffswitch8', function () {
		if (this.checked) {
			$('body').addClass('dark-header');
			$('body').removeClass('color-header');
			$('body').removeClass('light-header');
			localStorage.setItem("dashticdarkheader", true);
			localStorage.removeItem("dashticlightheader");
			localStorage.removeItem("dashticcolorheader");
		}
	});
	/***************** HEADER-STYLES End*********************/


	/***************** Add Switcher Classes *********************/
	//LTR & RTL
	if (!localStorage.getItem('dashticrtl') && !localStorage.getItem('dashticltr')) {

		/***************** RTL *********************/
		// $('body').addClass('rtl');
		/***************** RTL *********************/
		/***************** LTR *********************/
		// $('body').addClass('ltr');
		/***************** LTR *********************/

	}
	//Light-mode & Dark-mode
	if (!localStorage.getItem('dashticlight') && !localStorage.getItem('dashticdark')) {
		/***************** Light THEME *********************/
		// $('body').addClass('light-theme');
		/***************** Light THEME *********************/

		/***************** DARK THEME *********************/
		// $('body').addClass('dark-theme');
		/***************** Dark THEME *********************/
	}

	//Vertical-menu & Horizontal-menu
	if (!localStorage.getItem('dashticvertical') && !localStorage.getItem('dashtichorizontal') && !localStorage.getItem('dashtichorizontalHover')) {
		/***************** Horizontal THEME *********************/
		// $('body').addClass('horizontal');
		/***************** Horizontal THEME *********************/

		/***************** Horizontal-Hover THEME *********************/
		// $('body').addClass('horizontal-hover');
		/***************** Horizontal-Hover THEME *********************/
	}

	//Vertical Layout Style
	if (!localStorage.getItem('dashticdefaultmenu') && !localStorage.getItem('dashticclosedmenu') && !localStorage.getItem('dashticicontextmenu')&& !localStorage.getItem('dashticsideiconmenu')&& !localStorage.getItem('dashtichoversubmenu')&& !localStorage.getItem('dashtichoversubmenu1')) {
		/**Default-Menu**/
		// $('body').addClass('default-menu');
		/**Default-Menu**/

		/**closed-Menu**/
		// $('body').addClass('closed-menu');
		/**closed-Menu**/

		/**Icon-Text-Menu**/
		// $('body').addClass('icontext-menu');
		/**Icon-Text-Menu**/

		/**Icon-Overlay-Menu**/
		// $('body').addClass('sideicon-menu');
		/**Icon-Overlay-Menu**/

		/**Hover-Sub-Menu**/
		// $('body').addClass('hover-submenu');
		/**Hover-Sub-Menu**/

		/**Hover-Sub-Menu1**/
		// $('body').addClass('hover-submenu1');
		/**Hover-Sub-Menu1**/
	}

	//Body Style
	if (!localStorage.getItem('dashticdefaultbody') && !localStorage.getItem('dashticbodystyle')) {
	// $('body').addClass('body-style1');
	}

	//Boxed Layout Style
	if (!localStorage.getItem('dashticfullwidth') && !localStorage.getItem('dashticboxedwidth')) {
	// $('body').addClass('layout-boxed');
	}

	//Scrollable-Layout Style
	if (!localStorage.getItem('dashticfixed') && !localStorage.getItem('dashticscrollable')) {
	// $('body').addClass('scrollable-layout');
	}

	//Menu Styles
	if (!localStorage.getItem('dashticlightmenu') && !localStorage.getItem('dashticcolormenu') && !localStorage.getItem('dashticdarkmenu')) {
		/**Light-menu**/
		// $('body').addClass('light-menu');
		/**Light-menu**/

		/**Color-menu**/
		// $('body').addClass('color-menu');
		/**Color-menu**/

		/**Dark-menu**/
		// $('body').addClass('dark-menu');
		/**Dark-menu**/
	}
	//Header Styles
	if (!localStorage.getItem('dashticlightheader') && !localStorage.getItem('dashticcolorheader') && !localStorage.getItem('dashticdarkheader')) {
		/**Light-Header**/
		// $('body').addClass('light-header');
		/**Light-Header**/

		/**Color-Header**/
		// $('body').addClass('color-header');
		/**Color-Header**/

		/**Dark-Header**/
		// $('body').addClass('dark-header');
		/**Dark-Header**/

	}
	/***************** Add Switcher Classes *********************/

}
switcherEvents();


(function () {
	"use strict";
	/***************** RTL HAs Class *********************/
	let bodyRtl = $('body').hasClass('rtl');
	if (bodyRtl) {
		$('body').addClass('rtl');
		$('body').removeClass('ltr');
		$("html[lang=en]").attr("dir", "rtl");
		$(".select2-container").attr("dir", "rtl");
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

		var carousel = $('.owl-carousel');
		$.each(carousel, function (index, element) {
			// element == this
			var carouselData = $(element).data('owl.carousel');
			carouselData.settings.rtl = true; //don't know if both are necessary
			carouselData.options.rtl = true;
			$(element).trigger('refresh.owl.carousel');
		});
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
		}

	}
	/***************** RTL HAs Class *********************/

	/***************** Horizontal HAs Class *********************/
	let bodyhorizontal = $('body').hasClass('horizontal');
	if (bodyhorizontal) {
		if (window.innerWidth >= 992) {
			let li = document.querySelectorAll('.side-menu li')
			li.forEach((e, i) => {
				e.classList.remove('is-expanded')
			})
			var animationSpeed = 300;
			// first level
			var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
			var ul = parent.find('ul:visible').slideUp(animationSpeed);
			ul.removeClass('open');
			var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
			var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
			ul1.removeClass('open');
		}
		$('body').addClass('horizontal');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		$(".main-container").addClass("container");
		$(".main-container").removeClass("container-fluid");
		$(".app-header").addClass("hor-header");
		$(".app-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('horizontal-hover');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		// $('#slide-left').removeClass('d-none');
		// $('#slide-right').removeClass('d-none');
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
			ActiveSubmenu();
			menuClick();
			responsive();
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'noWrap'
		}
	}
	/***************** Horizontal HAs Class *********************/

	/***************** Horizontal Hover HAs Class *********************/
	let bodyhorizontalhover = $('body').hasClass('horizontal-hover');
	if (bodyhorizontalhover) {
		let li = document.querySelectorAll('.side-menu li')
		li.forEach((e, i) => {
			e.classList.remove('is-expanded')
		})
		var animationSpeed = 300;
		// first level
		var parent = $("[data-bs-toggle='sub-slide']").parents('ul');
		var ul = parent.find('ul:visible').slideUp(animationSpeed);
		ul.removeClass('open');
		var parent1 = $("[data-bs-toggle='sub-slide2']").parents('ul');
		var ul1 = parent1.find('ul:visible').slideUp(animationSpeed);
		ul1.removeClass('open');
		$('body').addClass('horizontal-hover');
		$('body').addClass('horizontal');
		let subNavSub = document.querySelectorAll('.sub-slide-menu');
		subNavSub.forEach((e) => {
			e.style.display = '';
		})
		let subNav = document.querySelectorAll('.slide-menu')
		subNav.forEach((e) => {
			e.style.display = '';
		})
		// $('#slide-left').addClass('d-none');
		// $('#slide-right').addClass('d-none');
		$(".main-content").addClass("horizontal-content");
		$(".main-content").removeClass("app-content");
		$(".main-container").addClass("container");
		$(".main-container").removeClass("container-fluid");
		$(".app-header").addClass("hor-header");
		$(".app-header").removeClass("side-header");
		$(".app-sidebar").addClass("horizontal-main")
		$(".main-sidemenu").addClass("container")
		$('body').removeClass('sidebar-mini');
		$('body').removeClass('sidenav-toggled');
		$('body').removeClass('closed-menu');
		$('body').removeClass('hover-submenu');
		$('body').removeClass('hover-submenu1');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		HorizontalHovermenu();
		if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
			checkHoriMenu();
			responsive();
			document.querySelector('.horizontal .side-menu').style.flexWrap = 'nowrap'
		}
	}
	/***************** Horizontal Hover HAs Class *********************/

	/***************** CLOSEDMENU HAs Class *********************/
	let bodyclosed = $('body').hasClass('closed-menu');
	if (bodyclosed) {
		$('body').addClass('closed-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** CLOSEDMENU HAs Class *********************/

	/***************** ICONTEXT MENU HAs Class *********************/
	let bodyicontext = $('body').hasClass('icontext-menu');
	if (bodyicontext) {
		$('body').addClass('icontext-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			icontext();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** ICONTEXT MENU HAs Class *********************/

	/***************** ICONOVERLAY MENU HAs Class *********************/
	let bodyiconoverlay = $('body').hasClass('sideicon-menu');
	if (bodyiconoverlay) {
		$('body').addClass('sideicon-menu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** ICONOVERLAY MENU HAs Class *********************/

	/***************** HOVER-SUBMENU HAs Class *********************/
	let bodyhover = $('body').hasClass('hover-submenu');
	if (bodyhover) {
		$('body').addClass('hover-submenu');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** HOVER-SUBMENU HAs Class *********************/

	/***************** HOVER-SUBMENU HAs Class *********************/
	let bodyhover1 = $('body').hasClass('hover-submenu1');
	if (bodyhover1) {
		$('body').addClass('hover-submenu1');
		if (!(document.querySelector('body').classList.contains('error-page'))) {
			hovermenu();
		}
		$('body').addClass('sidenav-toggled');
	}
	/***************** HOVER-SUBMENU HAs Class *********************/
	checkOptions();
})()

function checkOptions() {
	'use strict'

	// horizontal
	if (document.querySelector('body').classList.contains('horizontal')) {
		$('#myonoffswitch35').prop('checked', true);
	}

	// horizontal-hover
	if (document.querySelector('body').classList.contains('horizontal-hover')) {
		$('#myonoffswitch111').prop('checked', true);
	}

	//RTL 
	if (document.querySelector('body').classList.contains('rtl')) {
		$('#myonoffswitch55').prop('checked', true);
	}

	// light header 
	if (document.querySelector('body').classList.contains('light-header')) {
		$('#myonoffswitch6').prop('checked', true);
	}
	// color header 
	if (document.querySelector('body').classList.contains('color-header')) {
		$('#myonoffswitch7').prop('checked', true);
	}
	// dark header 
	if (document.querySelector('body').classList.contains('dark-header')) {
		$('#myonoffswitch8').prop('checked', true);
	}

	// light menu
	if (document.querySelector('body').classList.contains('light-menu')) {
		$('#myonoffswitch3').prop('checked', true);
	}
	// color menu
	if (document.querySelector('body').classList.contains('color-menu')) {
		$('#myonoffswitch4').prop('checked', true);
	}
	// dark menu
	if (document.querySelector('body').classList.contains('dark-menu')) {
		$('#myonoffswitch5').prop('checked', true);
	}
	// Body style
	if (document.querySelector('body').classList.contains('body-style1')) {
		$('#myonoffswitch06').prop('checked', true);
	}
	// Boxed style
	if (document.querySelector('body').classList.contains('layout-boxed')) {
		$('#myonoffswitch10').prop('checked', true);
	}
	// scrollable-layout style
	if (document.querySelector('body').classList.contains('scrollable-layout')) {
		$('#myonoffswitch12').prop('checked', true);
	}
	// closed-menu style
	if (document.querySelector('body').classList.contains('closed-menu')) {
		$('#myonoffswitch30').prop('checked', true);
	}
	// icontext-menu style
	if (document.querySelector('body').classList.contains('icontext-menu')) {
		$('#myonoffswitch14').prop('checked', true);
	}
	// iconoverlay-menu style
	if (document.querySelector('body').classList.contains('sideicon-menu')) {
		$('#myonoffswitch15').prop('checked', true);
	}
	// hover-submenu style
	if (document.querySelector('body').classList.contains('hover-submenu')) {
		$('#myonoffswitch32').prop('checked', true);
	}
	// hover-submenu1 style
	if (document.querySelector('body').classList.contains('hover-submenu1')) {
		$('#myonoffswitch33').prop('checked', true);
	}
}
checkOptions()

function resetData() {
	'use strict'
	$('#myonoffswitch54').prop('checked', true);
	$('#myonoffswitch1').prop('checked', true);
	$('#myonoffswitch34').prop('checked', true);
	$('#myonoffswitch3').prop('checked', true);
	$('#myonoffswitch6').prop('checked', true);
	$('#myonoffswitch07').prop('checked', true);
	$('#myonoffswitch9').prop('checked', true);
	$('#myonoffswitch11').prop('checked', true);
	$('#myonoffswitch13').prop('checked', true);
	$('body')?.addClass('light-mode');
	$('body')?.removeClass('dark-mode');
	$('body')?.removeClass('dark-menu');
	$('body')?.removeClass('light-menu');
	$('body')?.removeClass('color-menu');
	$('body')?.removeClass('dark-header');
	$('body')?.removeClass('light-header');
	$('body')?.removeClass('color-header');
	$('body')?.removeClass('layout-boxed');
	$('body')?.removeClass('icontext-menu');
	$('body')?.removeClass('sideicon-menu');
	$('body')?.removeClass('closed-menu');
	$('body')?.removeClass('hover-submenu');
	$('body')?.removeClass('hover-submenu1');
	$('body')?.removeClass('scrollable-layout');
	$('body')?.removeClass('sidenav-toggled');
	$('body')?.removeClass('body-style1');
	$('body')?.removeClass('scrollable-layout');


	$('body').removeClass('horizontal');
	$('body').removeClass('horizontal-hover');
	$(".main-content").removeClass("horizontal-content");
	$(".main-content").addClass("app-content");
	$(".main-container").removeClass("container");
	$(".main-container").addClass("container-fluid");
	$(".app-header").removeClass("hor-header");
	$(".app-header").addClass("side-header");
	$(".app-sidebar").removeClass("horizontal-main")
	$(".main-sidemenu").removeClass("container")
	$('#slide-left').removeClass('d-none');
	$('#slide-right').removeClass('d-none');
	$('body').addClass('sidebar-mini');
	if (document.querySelector('body').classList.contains('horizontal') && !(document.querySelector('body').classList.contains('error-page')) ) {
		checkHoriMenu();
		menuClick();
		responsive();
	}

	$('body').addClass('ltr');
	$('body').removeClass('rtl');
	$("html[lang=en]").attr("dir", "ltr");
	$(".select2-container").attr("dir", "ltr");
	localStorage.setItem("dashticltr", true);
	localStorage.removeItem("dashticrtl");
	$("head link#style").attr("href", $(this));
	(document.getElementById("style")?.setAttribute("href", "../assets/plugins/bootstrap/css/bootstrap.min.css"));
	var carousel = $('.owl-carousel');
	$.each(carousel, function (index, element) {
		// element == this
		var carouselData = $(element).data('owl.carousel');
		carouselData.settings.rtl = false; //don't know if both are necessary
		carouselData.options.rtl = false;
		$(element).trigger('refresh.owl.carousel');
	});
	if (document.querySelector('body').classList.contains('horizontal')&& !(document.querySelector('body').classList.contains('error-page'))) {
		checkHoriMenu();
	}
}