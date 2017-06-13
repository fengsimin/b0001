$(function() {
	'use strict';

	var ifeiwu = {'blog':{'page':0}};

	var
	app = new senna.App();
	app.addSurfaces('container');
	app.addRoutes(new senna.Route(/.*/, senna.HtmlScreen));
	app.on('startNavigate', function(event) {

	});
	app.on('endNavigate', function(event) {
	    ifeiwu.blog.page = 0;
	    cover();
	    info();
	});

	//封面响应式
	var cover = function() {
		$('.cover').css({'position':'fixed', 'width':$('.about').width()});
	};
	
	//介绍
	var info = function() {
		if ($(window).width()<=960) {
			$('.info').addClass('mobile').removeClass('active');
			$('.info').css('height','40px');
		} else {
			$('.info').removeClass('mobile active');
			$('.info').css('height','auto');
		}
	}
	
	cover();
	info();
	
	$(window).resize(function() {
		cover();
		info();
	});
	
	$(document).on('click', '.info.mobile', function() {
		var $this = $(this);
		
		if ($this.is('.active')) {
			$this.css('height', '40px').removeClass('active');
		} else {
			$this.css('height', this.scrollHeight+'px').addClass('active');
		}
		
	});
	
	//ajax滚动加载博客
	/*$(window).scroll(function() {
		var
		$this = $(this),
		windowH = $this.height(),
		documentH = $(document).height();

		if( documentH > windowH && ($this.scrollTop() + windowH) == documentH )
		{
			ifeiwu.blog.page++;

			$('.ajax-loading').slideDown(200);
            
			$.getJSON(location.href, {'page':ifeiwu.blog.page, 'isLoading': true}, function(json) {
				if (json.data) {
					$('.ajax-loading').hide();
					$('.blog-list').append(json.data);
				} else {
					$('.ajax-loading').text('已经到底啦！');
					
					setTimeout(function() {
						$('.ajax-loading').slideUp();
					}, 3000);
				}
			});
		}
	});*/
	
	//年份菜单
	$(document.body).on('click', '.year-menu', function(event) {
		event.preventDefault();

		$(this).toggleClass('active');
		$('.year-list').fadeToggle();
	});

    //向下滚窗口的高度
    $(document.body).on('click', '.scroll .down', function(event) {
		event.preventDefault();

        var
        $window = $(window),
        windowH = $window.height(),
        windowST = $window.scrollTop(),
        documentH = $(document).height();

        if ((windowST + windowH) != documentH) {
            $('html,body').animate({scrollTop: (windowH + windowST)}, 500);
        }

	});

    //返回顶部
    $(document.body).on('click', '.scroll .up', function(event) {
		event.preventDefault();

		$('html,body').animate({scrollTop: 0}, 500);
	});

	//代码高亮
	//prettyPrint();
	
	//关闭页面
	/*$(document.body).on('click', '.close', function(event) {
		event.preventDefault();
		
		window.opener = null;
	    window.open('', '_self');
	    window.close();
	});*/
	
});
