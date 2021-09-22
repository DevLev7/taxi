<div class="bombPopup gift" data-timer="<?php the_field('bomb-timer', 'option'); ?>" data-timeout="<?php the_field('bomb-timeout', 'option'); ?>">

    <div class="close">
        <svg viewBox="0 0 129 129" width="15" height="15"><path d="M7.6 121.4c.8.8 1.8 1.2 2.9 1.2s2.1-.4 2.9-1.2l51.1-51.1 51.1 51.1c.8.8 1.8 1.2 2.9 1.2 1 0 2.1-.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8L70.3 64.5l51.1-51.1c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0L64.5 58.7 13.4 7.6C11.8 6 9.2 6 7.6 7.6s-1.6 4.2 0 5.8l51.1 51.1-51.1 51.1c-1.6 1.6-1.6 4.2 0 5.8z"></path></svg>
    </div>
	
    <div class="gift_wait">
        <img class="bomb_image" src="<?php echo THEME_IMAGES_GOODINI; ?>bomb.png" />
        <svg class="circle"><circle r="50" cx="55" cy="55"></circle></svg>
        <div class=""><div class="counter">N</div>сек.</div>
        <button type="button" class="bombbtn">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.75 24H5.25C4 24 3 22.99 3 21.75v-10.5C3 10.01 4 9 5.25 9h13.5C20 9 21 10.01 21 11.25v10.5c0 1.24-1 2.25-2.25 2.25zM5.25 10.5a.75.75 0 0 0-.75.75v10.5a.75.75 0 0 0 .75.75h13.5a.75.75 0 0 0 .75-.75v-10.5a.75.75 0 0 0-.75-.75z"/><path d="M17.25 10.5a.75.75 0 0 1-.75-.75V6A4.51 4.51 0 0 0 12 1.5 4.51 4.51 0 0 0 7.5 6v3.75a.75.75 0 1 1-1.5 0V6a6.01 6.01 0 0 1 6-6 6.01 6.01 0 0 1 6 6v3.75a.75.75 0 0 1-.75.75zM12 17c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zm0-2.5a.5.5 0 1 0 0 1 .5.5 0 1 0 0-1z"/><path d="M12 20a.75.75 0 0 1-.75-.75V16.5a.75.75 0 1 1 1.5 0v2.75A.75.75 0 0 1 12 20z"/></svg>
            <?php the_field('bomb-btn-wait', 'option'); ?>
        </button>
    </div>
	
    <div class="gift_take">
        <img class="image" src="<?php echo get_field('bomb-image', 'option')['url']; ?>" />
        <a href="<?php the_field('bomb-link', 'option'); ?>" <?php if(get_field('bomb-blank', 'option')){; ?>target="_blank"<?php } ?> class="bombbtn" >
            <?php the_field('bomb-btn-take', 'option'); ?>
        </a>
    </div>
	
</div>

<script>
function bombPopups() {
	// функция вывода значения куки по имени
	function get_cookie ( cookie_name ){
		var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
		if ( results )
			return ( unescape ( results[2] ) );
		else
			return null;
	}
	var timercookie = get_cookie ( "timerPromo" );
	
    $(".bombPopup").each(function () {
        var t = $(this),
            e = t.attr("data-timer"),
            n = t.attr("data-timeout");
		if(!timercookie){
            setTimeout(function () {
                t.find(".counter").html(e), 
				t.find("svg.circle circle").css({ animation: "countdown " + e + "s linear" }), 
				t.show();
                var n = setInterval(function () {
                    if (e <= 1) {
                        clearInterval(n), 
						t.find(".gift_wait").hide(), 
						t.find(".gift_take").show();
                        var o = new Date(new Date().getTime() + 36e5);
                        //document.cookie = "timerPromo" + "=Y; expires=" + o.toUTCString() + "; path=/";
                    } else e--;
                    t.find(".counter").html(e);
                }, 1e3);
            }, 1e3 * (n || 1));
		}
    }),
	$("body").on("click", ".bombPopup .close", function (t) {
		$(this).closest(".bombPopup").hide();
		var n = new Date(new Date().getTime() + 36e5);
		//document.cookie = "timerPromo" + "='Y'; expires=" + n.toUTCString() + "; path=/";
	});
}

bombPopups();
</script>