new WOW().init();

if ($(window).width() < 501){
	var lazyLoadInstance = new LazyLoad({
	  threshold: 500
	})
	} else {
	var lazyLoadInstance = new LazyLoad({
	  threshold: 1000
	})
}

if (window.matchMedia("(min-width: 765px)").matches) {
$(document).ready(function (){
    $('#block_9 .items .item:eq(7)').nextAll('.item').addClass('none')
    $('#block_9 .items .item:eq(7)').addClass('color_bg')
    $('#block_9 .items .item:eq(7)').prepend('<span class="value1">Посмотреть больше</span>')
    $('#block_9 .items .item:eq(7) .logo').addClass('none')
})
$('#block_9 .items .item:eq(7)').click(function () {
    $('#block_9 .items .item:eq(7)').removeClass('color_bg')
    if($('#block_9 .item:eq(8)').hasClass('none')){
        $('#block_9 .items .item:eq(7)').nextAll('.item').removeClass('none')
        $('#block_9 .show').removeClass('none')
        if($(this).find($('.value1')).text() !== 'нажми на меня'){
            $(this).find($('.item .value1')).addClass('none')
            $(this).find($('.item .logo')).removeClass('none')
        }
    }

})
$('#block_9 .show').click(function () {

    if(!$('#block_9 .item:eq(8)').hasClass('none')){
       
         $('#block_9 .items .item:eq(7)').nextAll('.item').addClass('none')
           
       
        $('#block_9 .show').addClass('none')
     
        $('#block_9 .item .value1').removeClass('none')
        $('#block_9 .item:eq(7) .logo').addClass('none')
        $('#block_9 .items .item:eq(7)').addClass('color_bg')
      
    }
    

})

}

if (window.matchMedia("(min-width: 1153px)").matches) {
$('.block_5 .item').hover(function(){
    $(this).children(".text").css({'opacity': '1'})
}, function(){
    $(this).children(".text").css({'opacity': '0'})
})

$('.block_5 .details').click(function(){
    $(this).children(".text").css('opacity', '1')
    
}
)

}



var tl = gsap.timeline();

tl.from(".taxi", { duration: 3, ease: "back.out(2.1)", y: 500 });
tl.to(".podloj", { duration: 1, opacity:1, ease: "power1", x: 4 });
tl.from($(".podloj").find('>:first-child'), { duration: .5, opacity:0, ease: "power1", x: -150 });
tl.from($(".podloj").find('>:nth-child(2)'), { duration:.5, opacity:0, ease: "power1", x: -150 });
tl.from($(".podloj").find('>:nth-child(3)'), { duration: .5, opacity:0, ease: "power1", x: -150 });
tl.from($(".podloj").find('>:nth-child(4)'), { duration: .5, opacity:0, ease: "power1", x: -150 });
tl.from($(".podloj").find('>:nth-child(5)'), { duration: .5, opacity:0, ease: "power1", x: -150 });
tl.from($(".podloj").find('>:nth-child(6)'), { duration: .5, opacity:0, ease: "power1", x: -150 });



var block_show2 = false;

function scrollTracking3(){
    if (block_show2) {
        return false;
    }

    var wt = $(window).scrollTop();
    var et = $('#block_3').offset().top;

    if ( (et*0.95) < wt){
        block_show2 = true;
        $('#block_3').addClass('show')

        var tl = gsap.timeline();
tl.to($(".smallGraph").find('.small3'), { duration: 1, ease: "power1", y: -20 });
tl.to($(".smallGraph").find('.small2'), { duration: 1, ease: "power1", y: -20 });
tl.to($(".smallGraph").find('.small1'), { duration: 1, ease: "power1", y: -20 });
var purple = 'url(#paint37_linear_lestnica)'
gsap.to('.bigGraph .shadow',{duration: 11.5, ease: "power1", y: -200 })
tl.to($('.line').find('>:nth-child(1)'),{duration:0.3, ease: "power1", fill: purple})
tl.to($('.line').find('>:nth-child(2)'),{duration:0.3, ease: "power1", fill: purple})
tl.to($('.line').find('>:nth-child(3)'),{duration:0.3, ease: "power1", fill: purple})
tl.to($('.line').find('>:nth-child(4)'),{duration:0.3, ease: "power1", fill: purple})
tl.to($('.line').find('>:nth-child(5)'),{duration:0.3, ease: "power1", fill: purple})
var time = gsap.timeline()
gsap.from('.coin',{duration: .4, ease: "power1", rotate: '90deg',transformOrigin: 'center' })
// tl.to('.coin',{duration: .5, ease: "power1",   repeat: -1, "--x": 1, "--y": 0, "--z":-1, "--angle": "360deg",transformOrigin: 'center' })
// tl.to('.coin',{duration: .5, ease: "power1",   repeat: -1, "--x": 1, "--y": 0, "--z":-1, "--angle": "360deg",transformOrigin: 'center' })
// tl.to('.coin',{duration: .5, ease: "power1", rotate3D: '0, 0, -1,45deg',transformOrigin: 'center' })
// tl.to('.coin',{duration: .5, ease: "power1", rotate3D: '1, 0, -5, 45deg',transformOrigin: 'center' })
time.to($('.steps').find('>:first-child'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(2)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(3)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(4)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(5)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(6)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(7)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(8)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(9)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(10)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(11)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(12)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(13)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(14)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(15)'), {duration:0.3, ease: "power1", fill: purple});
time.to($('.steps').find('>:nth-child(16)'), {duration:0.3, ease: "power1", fill: purple});

var raketaTime = gsap.timeline()

raketaTime.to($('.raketa_graph').find('>:nth-child(9)'),{duration:0.7, ease: "power1", y: -40, opacity:0})
raketaTime.to($('.raketa_graph').find('>:nth-child(3)'),{duration:0.7, ease: "power1", opacity: 1})
raketaTime.to($('.raketa_line').find('>:nth-child(2)'),{duration:0.3, ease: "power1", fill: '#FC780B'})
raketaTime.to($('.raketa_graph').find('>:nth-child(7)'),{duration:0.7, ease: "power1", y: -40, opacity:0})
raketaTime.to($('.raketa_graph').find('>:nth-child(2)'),{duration:0.7, ease: "power1", opacity: 1})
raketaTime.to($('.raketa_line').find('>:nth-child(3)'),{duration:0.3, ease: "power1", fill: '#FC780B'})
raketaTime.to($('.raketa_line').find('>:nth-child(5)'),{duration:0.3, ease: "power1", fill: '#FC780B'})
raketaTime.to($('.raketa_graph').find('>:nth-child(5)'),{duration:0.7, ease: "power1", y: -40, opacity:0})
raketaTime.to($('.raketa_graph').find('>:nth-child(1)'),{duration:0.7, ease: "power1", opacity: 1})
raketaTime.to($('.raketa_line').find('>:nth-child(4)'),{duration:0.3, ease: "power1", fill: '#FC780B'})
raketaTime.to($('.raketa_line').find('>:nth-child(1)'),{duration:0.3, ease: "power1", fill: '#FC780B'})

var calckTime = gsap.timeline()
calckTime.to('.calc1',{duration: .4, ease:"power1",fill: '#EF4E16'})
calckTime.to('.calcNumb1',{duration: .3, ease:"power1",fill: '#FFAD02'})
calckTime.to('.calc1',{duration: .3, ease:"power1",fill: '#DDE4F4'})

calckTime.to('.calc2',{duration: .4, ease:"power1",fill: '#EF4E16'})
calckTime.to('.calcNumb2',{duration: .3, ease:"power1",fill: '#FFAD02'})
calckTime.to('.calc2',{duration: .3, ease:"power1",fill: '#DDE4F4'})

calckTime.to('.calcPoint',{duration: .4, ease:"power1",fill: '#EF4E16'})
calckTime.to('.calcNumbPoint',{duration: .3, ease:"power1",fill: '#FFAD02'})
calckTime.to('.calcPoint',{duration: .3, ease:"power1",fill: '#DDE4F4'})

calckTime.to('.calc9',{duration: .4, ease:"power1",fill: '#EF4E16'})
calckTime.to('.calcNumb9',{duration: .3, ease:"power1",fill: '#FFAD02'})
calckTime.to('.calc9',{duration: .3, ease:"power1",fill: '#DDE4F4'})

calckTime.to('.calc7',{duration: .4, ease:"power1",fill: '#EF4E16'})
calckTime.to('.calcNumb7',{duration: .3, ease:"power1",fill: '#FFAD02'})
calckTime.to('.calc7',{duration: .3, ease:"power1",fill: '#DDE4F4'})

var phone = gsap.timeline()
phone.to('.first_button',{duration: .8, ease:"power1",fill: '#333366'})
phone.to('.first_button',{duration: .8, ease:"power1",fill: '#CED3F8'})
phone.to('.screen_button1',{duration: .4, ease:"power1",fill: '#FCBA06'})
phone.to('.screne_text',{duration: .4, ease:"power1",fill: '#333366'}, "-=.4")
phone.to($('.firstCard').find('>:nth-child(14)'),{duration: .8, ease:"power1",opacity: 0})
phone.to('.screen_button1',{duration: .4, ease:"power1",fill: '#333366'},"-=.4")
phone.to('.screne_text',{duration: .4, ease:"power1",fill: '#FCBA06'}, "-=.8")
phone.to('.second_button',{duration: .8, ease:"power1",fill: '#333366'})
phone.to('.second_button',{duration: .8, ease:"power1",fill: '#CED3F8'})
phone.to('.screneCircle',{duration: .8, ease:"power1",fill: 'green'})
phone.to('.secondCard',{duration: .8, ease:"power1",opacity: .85})
phone.to('.screneCircle',{duration: .8, ease:"power1",fill: '#DFE4F4'},"-=.8")


        
    }
}
$(document).ready(function(){
  scrollTracking3();
  $(window).scroll(function(){
      scrollTracking3();
  });
});



var block_show = false;

function scrollTracking(){
    if (block_show) {
        return false;
    }

    var wt = $(window).scrollTop();
    var et = $('#block_5').offset().top;

    if ( (et*0.95) < wt){
        block_show = true;
        $('#block_5').addClass('show')
        gsap.to(".grid_block .item", 1, {scale: 1, yoyo: true,  ease: "power1.inOut", delay:0,stagger: {amount: 1,  grid: "auto", from: "center"} });
    }
}
$(document).ready(function(){
  scrollTracking();
  $(window).scroll(function(){
      scrollTracking();
  });
});


var block_show1 = false;

function scrollTracking2(){
    if (block_show1) {
        return false;
    }

    var wt = $(window).scrollTop();
    var et = $('#block_7').offset().top;

    if ( (et*0.95) < wt){
        block_show1 = true;
        $('#block_7').addClass('show')
        gsap.to("#block_7 .favor_item ", 1, {scale: 1, yoyo: true,  ease: "power1.inOut", delay:0,stagger: {amount: 1,  grid: "auto", from: "center"} });
    }
}
$(document).ready(function(){
  scrollTracking2();
  $(window).scroll(function(){
      scrollTracking2();
  });
});










var block_show4 = false;

function scrollTracking4(){
    if (block_show4) {
        return false;
    }

    var wt = $(window).scrollTop();
    var et = $('#manager').offset().top;

    if ( (et*0.95) < wt){
        block_show4 = true;
        $('#manager').addClass('show')
       
        gsap.registerPlugin(MotionPathPlugin);

        gsap.from("#car",{
            duration: 5,
            ease: "power1.inOut",
            motionPath:"M0 0 L274 -145"
        } )
        gsap.to('.calculator',{duration:5, delay:1.5, ease: 'power1.inOut', opacity:1 })
        gsap.to('.wheel', {duration: 5, delay:.1, ease: 'power1.inOut', rotate: '-360deg', transformOrigin: 'center'})
        var phone = gsap.timeline()
        phone.to('.phone_btn1',{duration: .8, ease:"power1",fill: '#333366'})
        phone.to('.phone_btn1',{duration: .8, ease:"power1",fill: '#CED3F8'})
        phone.to('.phone_screen',{duration: .4, ease:"power1",opacity: 1})
        phone.to('.phone_send',{duration: .4, ease:"power1",opacity: 1},"-=.4")
        phone.to('.phone_btn2',{duration: .8, ease:"power1",fill: '#333366'})
        phone.to('.phone_btn2',{duration: .8, ease:"power1",fill: '#CED3F8'})
        phone.to('.phone_agree',{duration: .8, ease:"power1",fill: 'green'})
        
    }
}
$(document).ready(function(){
  scrollTracking4();
  $(window).scroll(function(){
      scrollTracking4();
  });
});


$(document).ready(function(){

	

	// = Вешаем событие прокрутки к нужному месту
	//	 на все ссылки якорь которых начинается на #
	$('a[href^="#"]').bind('click.smoothscroll',function (e) {
		e.preventDefault();

		var target = this.hash,
		$target = $(target);
        $(".mobile.menus").removeClass('active');
        $(".mobile-icon").removeClass('active');
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top
		}, 900, 'swing', function () {
			window.location.hash = target;
		});
	});

});