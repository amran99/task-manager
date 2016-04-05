function openContent(task_id){
	var columnHeights = [$("#column0").height(),$("#column1").height(),$("#column2").height(),$("#column3").height()];
	var largest = columnHeights.sort()[columnHeights.length - 1];
	
	var content = document.getElementById(task_id);
	var behindDiv = document.getElementById("behindDiv");
	if (content.style.height=="250px") {
		largest += 50;
		content.style.height="50px";
		behindDiv.style.height=largest+"px";
		
	}else{
		content.style.height="250px";
		largest += 250;
		behindDiv.style.height=largest+"px";
	}
	console.log(largest);
}
