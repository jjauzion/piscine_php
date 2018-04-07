$(document).ready(function() {
	init_task();
	$('#new').click(create_task);
	$('#ft_list').on("click", ".item", delete_task);
});

function init_task () {
	$.get(
			'select.php',
			'false',
			display_get,
			'html'
		 );
	function display_get (code_html) {
		$(code_html).appendTo("#ft_list");
	}
}

function create(task) {
	var message = {content:task};
	console.log('message envoye:');
	console.log(message);
	$.post(
			'insert.php',
			message,
			fct_retour,
			'text'
		  );
	console.log('post completed');
	function fct_retour(rec_html) {
		console.log(rec_html);
	}
	var elm = $("<div></div>").attr('class', 'item');
	$(elm).text(task);
	$('#ft_list').append(elm);
	$(elm).click(delete_task);
}

function create_task() {
	var task = prompt("What is it you wanna do ?");
	if (task != null && task != "") {
		create(task);
	}
}

function delete_task() {
	var yes = confirm("Do you want to delete this task?");
	if (yes)
	{
		var task = {task:$(this).html()};
		$.post(
				'delete.php',
				task,
				fct_retour,
				'text'
			  );
		function fct_retour(rec_html) {
			console.log(rec_html);
		}
		$(this).remove();
	}
}
