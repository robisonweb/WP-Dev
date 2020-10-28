(function (window,document) {
    'use strict';
	if(!window['IntersectionObserver']){
		var windowLoad=function(){
			var items = document.querySelectorAll('[data-lazy]');
			for(var i=items.length-1;i>-1;--i){
				var el = items[i],
					tagName = el.tagName;
                if (!el || !el.hasAttribute('data-lazy')) {
                    if (el) {
                        el.removeAttribute('data-lazy');
                    }
                } else {
                    el.removeAttribute('data-lazy');
                    if (tagName!=='IMG' && (tagName === 'DIV' || !el.hasAttribute('data-tf-src'))) {
						el.className=el.className.replace(' tf_lazy','');
                    } else if (tagName !== 'svg') {
                        var src = el.getAttribute('data-tf-src'),
                                srcset = el.getAttribute('data-tf-srcset');
                        if (src) {
                            el.setAttribute('src', src);
                            el.removeAttribute('data-tf-src');
                        }
                        if (srcset) {
							var sizes=el.getAttribute('data-tf-sizes');
							if(sizes){
								el.setAttribute('sizes', sizes);
								el.removeAttribute('data-tf-sizes');
							}
                            el.setAttribute('srcset', srcset);
                            el.removeAttribute('data-tf-srcset');
                        }
                        el.removeAttribute('loading');
                    }
                }
			}
			document.body.className+=' page-loaded';
		};
		if (document.readyState === 'complete') {
                windowLoad();
		} else {
			window.addEventListener('load', windowLoad, {once:true, passive:true});
		}
	}	
}(window,document));