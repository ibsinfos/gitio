jQuery(document).ready(function($) {

	$("#foo1").carouFredSel({
		circular: true,
		responsive: true,
		infinite: true,
		auto: true,
		prev:{	
			button: "#foo1_prev",
			key: "left"
		},
		next:{
			button: "#foo1_next",
			key: "right"
		},
		pagination: "#foo1_pag",
		items: {
			//	height: '30%',	//	optionally resize item-height
			visible: {
				min: 1,
				max: 100000
			}
		},		scroll: {			duration: 1000,			easing: 'linear'		}
	});			setInterval(function(){		$("#foo1_next").click();			}, 5000);	
});