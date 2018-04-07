$(document).ready(function() {
	init_task();
	$('#new').click(create_task);
});

function init_task () {
	var cookie = document.cookie;
	if (cookie != "")
	{
		var cook_list = cookie.split(';');
		for(var i = 0; i <cook_list.length; i++) {
			var task = cook_list[i].split('=');
			if (task[0].trim() != "nb_task")
				create(task[1].trim());
		}
	}
}

function create(task) {
	var elm = $("<div></div>").attr('class', 'item');
	$(elm).text(task);
	$('#ft_list').append(elm);
	$(elm).click(delete_task);
}

function create_task() {
	var task = prompt("What is it you wanna do ?");
	if (task != null && task != "") {
		create(task);
		nb_task = getCookie("nb_task");
		if (!nb_task || nb_task == "")
			nb_task = 1;
		else
			nb_task = parseInt(nb_task) + 1;
		setCookie("nb_task", nb_task, 2);
		setCookie("task" + nb_task, task, 2);
	}
}

function delete_task() {
	var yes = confirm("Do you want to delete this task?");
	if (yes)
	{
		var cookieId = getCookieByVal($(this).html());
		document.cookie = cookieId + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		$(this).remove();
		nb_task = getCookie("nb_task");
		nb_task = parseInt(nb_task) - 1;
		setCookie("nb_task", nb_task, 2);
	}
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie (name) {
	var cookie = document.cookie;
	if (cookie != "")
	{
		var cook_list = cookie.split(';');
		for(var i = 0; i <cook_list.length; i++) {
			var task = cook_list[i].split('=');
			if (task[0].trim() == name)
				return(task[1].trim());
		}
	}
	return (null);
}

function getCookieByVal (val) {
	var cookie = document.cookie;
	if (cookie != "")
	{
		var cook_list = cookie.split(';');
		for(var i = 0; i <cook_list.length; i++) {
			var task = cook_list[i].split('=');
			if (task[1].trim() == val)
				return(task[0].trim());
		}
	}
	return (null);
}
