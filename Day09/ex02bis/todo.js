$(document).ready(function() {
let id = 0;
data = Array();
getCookie();
console.log(data);
for (t in data) {
	addTask(data[t]);
}

function getCookie() {
	let cookie = document.cookie.split(';');
	for (c in cookie) {
		let key = cookie[c].split('=');
		if (key[0].trim() == "list") {
			if (key[1] != "") {
				d = key[1].split(',');
				for (t in d) {
					data.push(d[t]);
				}
			}
		}
	}
}

function addCookie() {
	document.cookie = "list=" + data.toString();
}

function addTask(t) {
	$('#ft_list').prepend("<div class=\"task\">" + t + "</div>");
}

$('div .task').click(function(e) {
	let r = confirm("Do you want to remove this Task?");
	if (r == true) {
		$(e.target).remove();
		data.splice(data.indexOf(e.target.innerHTML), 1);
		addCookie();
	}
});

$('#add').click(function add() {
	let item = prompt("Please enter your task", "Do an internship video");
	
	if (item != null) {
		data.push(item);
		addTask(item);
		addCookie();
	}
});

});
