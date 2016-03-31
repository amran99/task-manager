//tabs for login
if (document.getElementById("signup")) {
	jQuery(document).ready(function() {
		jQuery('.tabs .tab-links a').on('click', function(e)  {
			var currentAttrValue = jQuery(this).attr('href');
			// Show/Hide Tabs
			jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
			// Change/remove current tab to active
			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
			e.preventDefault();
		});
	});
}


function openContent(task_id){
	var content = document.getElementById(task_id);
	if (content.style.height=="160px") {
		content.style.height="30px";
	}else{
		content.style.height="160px";
	}
}
