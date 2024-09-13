/**************************************
	App
	16/09/2014

**************************************/

var home = 0;

jQuery.extend( jQuery.fn, {
    // Name of our method & one argument (the parent selector)
    within: function( pSelector ) {
        // Returns a subset of items using jQuery.filter
        return this.filter(function(){
            // Return truthy/falsey based on presence in parent
            return $(this).closest( pSelector ).length;
        });
    }
});

var clndr = {};
$(function() {	
	var eventsArray = [];
	/*
		var eventsArray = [
		  { start: '2014-10-24', end: '2014-10-24', title: 'La fête du tri' }
	];*/
	
	// I18n FR
	moment.lang('fr'); 

	clndr.setup = $('#calendar').clndr({
		events: eventsArray,
		multiDayEvents: {
			startDate: 'start',
			endDate: 'end'
		},
		ready: function() {
						
		},
		clickEvents: {
			click: function(target) {
				$('#calendar .event').each(function  () {
					$(this).removeClass('active');
				})
				.promise()
				.done( function  () {
					if($(target.element).hasClass('event')){
						$(target.element).addClass('active');
						var event = '';
						for (var i=0; i<target.events.length; i++) {
							var imgEvent = (target.events[i].imgSrc != null)? '<figure><img title="'+target.events[i].imgAlt+'" alt="'+target.events[i].imgAlt+'" src="'+target.events[i].imgSrc+'" class="right"><figcaption>'+target.events[i].imgAlt+'</figcaption></figure>' : '';
							
							var horaireEvent = (target.events[i].horaire != '')?  '<p> à <strong>'+target.events[i].horaire+'</strong></p>' : '';

							var lieuEvent = (target.events[i].lieu != '')? '<p>Lieu : <strong>'+target.events[i].lieu+'</strong></p>' : '';

							event += '<div>'+ imgEvent +'<h3>'+target.events[i].title+'</h3><p><strong>'+target.events[i].agendaDate+'</strong></p>'+ horaireEvent + lieuEvent + target.events[i].agendaLien +'</div>';
							event += (i < (target.events.length-1))? '<hr/>' : '';
						}
                        

						$(".menu-event").html(event);	
					}
				})
				
			},
			nextMonth:     function(month)  { },
			previousMonth: function(month)  { },
			nextYear:      function(month)  { },
			previousYear:  function(month)  { },
			today:         function(month)  { },
			onMonthChange: function(month)  { },
			onYearChange:  function(month)  { }
		},
		doneRendering: function() {
			//
			//
		}
	});
	if (typeof( monthCalendarInit ) !== "undefined") {
		clndr.setup.setMonth(parseInt(monthCalendarInit - 1));
	}
	if (typeof( eventCalendarInit ) !== "undefined") {
		$('#calendar .calendar-day-' + eventCalendarInit).addClass('active');
	}
});


// ----------------------------------------------------------
// Ready Event
// ----------------------------------------------------------

$(document).ready(function(){
	
	// Menu de niveau 1 desktop
	// 2eme niveau du menu pratique : desactivation des liens 
	$('#main-nav li.menu-agenda a').removeAttr('href');
	$('#submenu-menu-pratique .menu-pratique.has-dropdown > a ').removeAttr('href').css('cursor', 'default');

	if(home){
		function updateOwlNavig (num) {
			$('#owlNavig a').each(function  () {
				var thishref = $(this).attr('href');
				var thispatt = new RegExp("item-"+ num);
				var thismatch = thispatt.test(thishref);
				if (thismatch) {
					$(this).addClass('focused');
				} else {
					$(this).removeClass('focused');
				}
			});
		}

		var owl = $('.owl-carousel');
		$('.owl-carousel .item').each(function( index,element ) {
			$(this).data('hash','item-'+index);
		})
		.promise()
		.done(
			function() {
			owl.on('initialized.owl.carousel', function(event) {
				updateOwlNavig (event.page.index);
			});

			owl.owlCarousel({
				items:1,
				//loop:true,
				center:true,
				margin:0,
				//info: true,
				//lazyLoad:true,
				pagination:false,
				URLhashListener:true,
				autoplayHoverPause:true,
                transitionStyle : "fade"/*,
				startPosition: 'URLHash',
				onInitialized :  function  (event) {	
					//alert(event.page.index)
					//$('#owlNavig a:first').trigger('mouseover');
				}*/
			});
			
			owl.on('changed.owl.carousel', function(event) {
				updateOwlNavig (event.page.index);
			});
		});
				
		// Menu actus
		$(".close-menu-toutes-les-actus").on('click', function  () {
			$(".menu-toutes-les-actus").animate({opacity: "hide", top: 0, height:0  }, 300);
		});
		$(".toutes-les-actus").on("click", function(){
			//$(".menu-toutes-les-actus").animate({opacity: "show", bottom: $(this).height(), height:$(this).height()  }, 300);
			$(".menu-toutes-les-actus").animate({opacity: "show", bottom: ($("#slider").height() + 114), height: ($("#slider").height() + 114)  }, 300);
		});


        // Ajoute la class vertical tous les 2 flip-container
        $('#ecogestes .flip-container').each(function( index,element ) {
                if(index==1||index==3||index==4||index==6||index==9||index==10) $(this).addClass('vertical');
        });
	}
	else {
		$('.gestes-navigation a').each(function  () {
			$(this).data('href', $(this).attr('href'));
			$(this).attr('href', 'javascript:void(0);');
			
/*			if (typeof( $("div.complet > div").attr('class') ) !== "undefined") {
				var tabClassBestiare = $("div.complet > div").attr('class').split(' ');
				if($(this).parent('div').hasClass(tabClassBestiare[1]))
					$(this).addClass('on');
			}*/
		})
		.promise()
		.done(function  () {
		
			$('.gestes-navigation a:not(.on)').click(function  () {

				var lien = $(this).data('href') + '#mainContent';
	
				// Si nous ne sommes pas dans un geste
				if (!$( ".bestiaire").length) {
					document.location.href = lien;
				} 
				else {
					$( ".bestiaire div.colonneTexte h1" ).animate({
						opacity: 0,
						left: "-=800"
						}, 300, function() {
							$( ".bestiaire div.colonneTexte div").css("width",$( ".bestiaire div.colonneTexte div").css("width"));
							$( ".bestiaire div.colonneTexte div").animate({
									marginLeft: "-=800px",
									opacity: 0
								}, 300, function() {
								$( ".bestiaire div.colonneIllust").animate({
									opacity: 0,
									right: "-=800"
								}, 300, function() {
									// Animation complete => Redirection.
									document.location.href = lien;
								});
						});
					});
				}	
			});

			//var colg = $( ".bestiaire div.colonneTexte" ).first();
			//var cold = $( ".bestiaire div.colonneIllust");

			/*var tl = new TimelineLite();
			tl.staggerTo(colg.find('p'), 0.5, {marginLeft:-300,  autoAlpha:0}, 0.2)
			.to(cold.find('#bulle'), 0.5, {rotation:30, autoAlpha:0}) 
			.to(colg.find('h1'), 0.5, {marginLeft:-300, autoAlpha:0})			
			.to(cold.find('.circle-text-dessus'), 0.5, {rotation:-30, autoAlpha:0}) 
			.to(cold.find('figure'), 1, {rotation:45, scaleX:2, scaleY:2,  autoAlpha:0}) ;
			tl.play();
			*/			

		});
		
		$(".navig-autres-actus").owlCarousel({
			items:4,
			loop:false,
			margin:10,
			nav:true,
			slideBy: 1,
			responsive:{
				0:{
					items:1
				},
				640:{
					items:3
				},
				1024:{
					items:4
				}
			}
		});
		
		/* diaporama */
		$('.fotorama').fotorama({
			width: '100%',
			nav: 'thumbs',
			thumbwidth: 130,
			thumbheight: 130,
			thumbmargin: 10,
			swipe: 'true'
		});

		/* Verical timeline */
		var $timeline_block = $('.cd-timeline-block');
		
		if($timeline_block.length){
			//hide timeline blocks which are outside the viewport
			$timeline_block.each(function(){
				if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
					$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
				}
			});

			//on scolling, show/animate timeline blocks when enter the viewport
			$(window).on('scroll', function(){
				$timeline_block.each(function(){
					if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
						$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
					}
				});
			});
		}
	}


$("#back-top").hide();

	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});

// ----------------------------------------------------------
// Load Event
// ----------------------------------------------------------
$(window).load(function  () {
	if(home){
	}
	else {
		$( ".bestiaire div.colonneTexte h1" ).animate({
			opacity: 1,
			left: "+=800"
			}, 300, function() {
				$( ".bestiaire div.colonneTexte div").css("width",$( ".bestiaire div.colonneTexte div").css("width"));
				$( ".bestiaire div.colonneTexte div").animate({
						marginLeft: "+=800px",
						opacity: 1
					}, 300, function() {
					$( ".bestiaire div.colonneIllust").animate({
						opacity: 1,
						right: "+=800"
					}, 300, function() {
						// Animation complete => Redirection.
						$('#bulle').circliful();
					});
			});
		});

		// test en dur - à supprimer !
		$("img[src*='v65']").hide();
		if($("img[src*='v65']").length){
			$(".fotorama__stage").css('height', '0');
		}
	}
	
	$("#bandeau-intersites").attr('src', '//intersites.agglo-larochelle.fr/bandeau/');

	console.log('//Loaded');
});

// ----------------------------------------------------------
// Global Events
// ----------------------------------------------------------
$(window).resize(function(event) {
	$('.popover').hide();
	var topBarR = $('#main-nav #topmenu');
	var topBarOffsetR = topBarR.offset();
	//console.log(topBarOffsetR.left);
	$(".popover").css({left: topBarOffsetR.left });

});

$(document).click(function(event) {
	var t = $(event.target);
	if( t.within('div.popover').length || t.within('.clndr-control-button').length){
		//console.log('In ');
	} else {
		$('.popover').hide();
	}
});


// EOF