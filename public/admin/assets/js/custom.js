(function($) {
    "use strict";

    // ______________ Page Loading
    $(window).on("load", function(e) {
        $("#global-loader").fadeOut("slow");
    })

    $('.fc-month-button').addClass('fc-state-active');
    $('.fc-agendaWeek-button').removeClass('fc-state-active');
    // ______________Cover Image
    $(".cover-image").each(function() {
        var attr = $(this).attr('data-image-src');
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css('background', 'url(' + attr + ') center center');
        }
    });

    $('.table-subheader').click(function() {
        $(this).nextUntil('tr.table-subheader').slideToggle(100);
    });

    // ______________ Horizonatl
    $(document).ready(function() {
        $("a[data-theme]").click(function() {
            $("head link#theme").attr("href", $(this).data("theme"));
            $(this).toggleClass('active').siblings().removeClass('active');
        });
        $("a[data-bs-effect]").click(function() {
            $("head link#effect").attr("href", $(this).data("effect"));
            $(this).toggleClass('active').siblings().removeClass('active');
        });
    });


    // ______________Full screen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    })


    // __________MODAL
    // showing modal with effect
    $('.modal-effect').on('click', function(e) {
        e.preventDefault();
        var effect = $(this).attr('data-bs-effect');
        $('#modaldemo8').addClass(effect);
    });
    // hide modal with effect
    $('#modaldemo8').on('hidden.bs.modal', function(e) {
        $(this).removeClass(function(index, className) {
            return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
        });
    });

    // ______________Back to top Button
    $(window).on("scroll", function(e) {
        if ($(this).scrollTop() > 0) {
            $('body').addClass('side-shadow');
            $('#back-to-top').fadeIn('slow');
        } else {
            $('body').removeClass('side-shadow');
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e) {
        $("html, body").animate({
            scrollTop: 0
        }, 0);
        return false;
    });


    // ______________ Chart-circle
    if ($('.chart-circle').length) {
        $('.chart-circle').each(function() {
            let $this = $(this);

            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: '#e5e9f2',
                lineCap: 'round'
            });
        });
    }
    // ______________ Chart-circle
    if ($('.chart-circle-primary').length) {
        $('.chart-circle-primary').each(function() {
            let $this = $(this);

            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: hexToRgba(myVarVal, 0.4),
                lineCap: 'round'
            });
        });
    }

    // ______________ Chart-circle
    if ($('.chart-circle-secondary').length) {
        $('.chart-circle-secondary').each(function() {
            let $this = $(this);

            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: 'rgba(247, 45, 102, 0.4)',
                lineCap: 'round'
            });
        });
    }

    // ______________ Chart-circle
    if ($('.chart-circle-success').length) {
        $('.chart-circle-success').each(function() {
            let $this = $(this);

            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: 'rgba(45, 206, 137, 0.5)',
                lineCap: 'round'
            });
        });
    }

    // ______________ Chart-circle
    if ($('.chart-circle-warning').length) {
        $('.chart-circle-warning').each(function() {
            let $this = $(this);

            $this.circleProgress({
                fill: {
                    color: $this.attr('data-color')
                },
                size: $this.height(),
                startAngle: -Math.PI / 4 * 2,
                emptyFill: '#e5e9f2',
                lineCap: 'round'
            });
        });
    }

    // ______________ Global Search
    $(document).on("click", "[data-bs-toggle='search']", function(e) {
        var body = $("body");

        if (body.hasClass('search-gone')) {
            body.addClass('search-gone');
            body.removeClass('search-show');
        } else {
            body.removeClass('search-gone');
            body.addClass('search-show');
        }
    });
    var toggleSidebar = function() {
        var w = $(window);
        if (w.outerWidth() <= 1024) {
            $("body").addClass("sidebar-gone");
            $(document).off("click", "body").on("click", "body", function(e) {
                if ($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
                    $("body").removeClass("sidebar-show");
                    $("body").addClass("sidebar-gone");
                    $("body").removeClass("search-show");
                }
            });
        } else {
            $("body").removeClass("sidebar-gone");
        }
    }
    toggleSidebar();
    $(window).resize(toggleSidebar);

    const DIV_CARD = 'div.card';
    // ______________ Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    // ______________ Popover
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
        html: true
    })

    // ______________ Card Remove
    $(document).on('click', '[data-bs-toggle="card-remove"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.remove();
        e.preventDefault();
        return false;
    });

    // ______________ Card Collapse
    $(document).on('click', '[data-bs-toggle="card-collapse"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-collapsed');
        e.preventDefault();
        return false;
    });

    // ______________ Card Fullscreen
    $(document).on('click', '[data-bs-toggle="card-fullscreen"]', function(e) {
        let $card = $(this).closest(DIV_CARD);
        $card.toggleClass('card-fullscreen').removeClass('card-collapsed');
        e.preventDefault();
        return false;
    });

    // sparkline1
    $(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4], {
        height: 20,
        type: 'bar',
        colorMap: {
            '7': '#a1a1a1'
        },
        barColor: '#ff5b51'
    });

    // sparkline2
    $(".sparkline_bar1").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6, ], {
        height: 20,
        type: 'bar',
        colorMap: {
            '7': '#c34444'
        },
        barColor: '#44c386'
    });

    // sparkline3
    $(".sparkline_bar2").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6, ], {
        height: 20,
        type: 'bar',
        colorMap: {
            '7': '#a1a1a1'
        },
        barColor: '#4454c3'
    });
    

    /*Switcher Toggle Start*/
	$('.layout-setting').on("click", function (e) {
		if (!(document.querySelector('body').classList.contains('dark-mode'))) {
			$('body').addClass('dark-mode');
			$('body').removeClass('light-mode');

            localStorage.setItem('dashticdarkMode', true)
            localStorage.removeItem('dashticlightMode', false)
		} else {
			$('body').removeClass('dark-mode');
			$('body').addClass('light-mode');

            localStorage.setItem('dashticlightMode', true)
            localStorage.removeItem('dashticdarkMode', false)
		}
	});
	/*Switcher Toggle End*/

   

})(jQuery); 
