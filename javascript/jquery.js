function openContent(task_id){
	var content = document.getElementById(task_id);
	if (content.style.height=="160px") {
		content.style.height="30px";
	}else{
		content.style.height="160px";
	}
}
