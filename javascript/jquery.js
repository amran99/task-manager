function openContent(task_id){
	var content = document.getElementById(task_id);
	if (content.style.height=="250px") {
		content.style.height="50px";
	}else{
		content.style.height="250px";
	}
}
