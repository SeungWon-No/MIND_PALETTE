var include = {

	headerContainer : null,
	footerContainer : null,

	init : function(){
		this.headerContainer = document.getElementById('header');
		this.footerContainer = document.getElementById('footer');


		if(this.headerContainer && this.headerContainer.children.length == 0) this.header();
		if(this.footerContainer && this.footerContainer.children.length == 0) this.footer();
	},
	header : function(){
		var _html = '';		
		this.headerContainer.innerHTML = _html;
	},

	footer : function(){
		var _html = '';
		this.footerContainer.innerHTML = _html;
	}
};


/*===================================
@ common
===================================*/
var common = {	

	header : null,
	navigation : null,
	stage : { width : 0 , height : 0 , top : 0 , ptop : 0 } ,
	toastPopElement : null,
	toastPopActive : false,
	toastPopTimer : null,

	init : function(){		

		$(document).on('click' , 'button.btn-point-note-nav' , function(){
			$(this).parents('.point-note').toggleClass('actived');
		});

		
		this.resize();
		this.scroll();
	},

	ready : function(){		
		
	},
	load : function(){
		
	},
	resize : function(){				
		common.stage.width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		common.stage.height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		common.stage.top = window.scrollTop || document.documentElement.scrollTop || document.body.scrollTop;
	},
	scroll : function(){
		common.stage.top = window.scrollTop || document.documentElement.scrollTop || document.body.scrollTop;		
		
		if($('#header').length > 0 ){
			if(common.stage.top >= 3 ){
				$('#header').addClass('scroll');				
			}else{
				$('#header').removeClass('scroll');
			};
		};
	},

	toastPopOpen : function( id ){
		
		if(!common.toastPopActive){
			if(common.toastPopTimer) clearTimeout(common.toastPopTimer);
			common.toastPopActive = true;
			common.toastPopElement = $('#' + id);
			common.toastPopElement.addClass('actived');
			common.toastPopTimer = setTimeout(function(){
				common.toastPopElement.removeClass('actived');
				common.toastPopActive = false;
			} , 1500);
		}
	}
};

var pop = {
		
	element : null,
	elementArr : [],
	isActive : false,
	zIndex : 99999,

	init : function(){
		//팝업 컨텐츠 외 영역 클릭시 닫기 이벤트
		$(document).on('click' , '.layer-pop-wrap' , function(e){
			if(pop.isActive){
				if($(e.target).parents('.pop-data').length == 0){					
					pop.close();
				}
			}
		});
	},
	
	// 팝업 열기
	open : function( _id , _item ){
		pop.isActive = true;
		$('html').addClass('fix');
		this.element = $('#' + _id);
		this.element.addClass('actived').css({ 'z-index' : pop.zIndex });
		this.elementArr.push(this.element);
		pop.zIndex += 1;
	},
	
	//팝업 닫기
	close : function( _item ){
		var $element;
		pop.isActive = false;
		$('html').removeClass('fix');
		/*
		if(_item){
			$(_item).parents('.layer-pop-wrap').removeClass('actived');
		}else{
			this.element.removeClass('actived');
		}
		*/
		if(_item){
			$element= $(_item);
			$element.removeClass('actived');
		}else{
			$element =pop.elementArr[pop.elementArr.length - 1];
			$element.removeClass('actived');
		}
		pop.elementArr.pop();


	},

	change : function(){

	}
};

function inputChange(_target){
	var target = $(_target);
	var value = target.val();
	if(value.length > 0){
		target.removeClass('valid-error');
		target.addClass('write');
	}else{
		target.removeClass('write');
	}
	
	var mobileState = isMobile();
	if(mobileState === true){
		if($('.login-footer').length > 0 ){
			$('.login-footer').hide();
		};
	};
};

function inputBlur(_target){
	$(_target).removeClass('write');
		
	var mobileState = isMobile();
	if(mobileState === true){
		if($('.login-footer').length > 0 ){
			$('.login-footer').show();
		};
	};
};

function isMobile(){
	return (navigator.userAgent.match(/iPhone|iPad|iPod|Android|Windows CE|BlackBerry|Symbian|Windows Phone|webOS|Opera Mini|Opera Mobi|POLARIS|IEMobile|lgtelecom|nokia|SonyEricsson/i) != null || navigator.userAgent.match(/LG|SAMSUNG|Samsung/) != null);
};

window.addEventListener('DOMContentLoaded' , common.ready);
window.addEventListener('load' , common.load);
window.addEventListener('resize' , common.resize);
window.addEventListener('scroll' , common.scroll);

(function(){	
	common.init();	
	pop.init();	
})();