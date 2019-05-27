$(document).ready(function(){
	$.ajax({
		url: 'select.php',
		success: function (response) {
			var mtx = JSON.parse(response);
			if (Array.isArray(mtx) && mtx[0] != '') {
				for (j = 0; j < mtx.length; j++)
				{
					if (mtx[j] != '') {
						save = mtx[j].split(';');
						older_plus(save[1]);
					}
				}
			}
		}
		});
})

function ask()
{
	var name = prompt("Please enter a name of new TO DO:");
	if (name != '') {
		add(name);
	}
}

function add(name)
{
	if (name != '') {
		var up_todo = $('#ft_list').prepend($('<div>' + name + '</div>').click(remove));
	}
	$.ajax({
		type: "GET",
		url: "insert.php?" + name + "=" + name
	});
}

function older_plus(name)
{
  if (name != '') {
	  var up_todo = $('#ft_list').prepend($('<div>' + name + '</div>').click(remove));
  }
}

function remove()
{
	if (confirm("Do you really want to delete this TO DO?")) {
		this.remove();
		removeList(this.innerHTML);
	}
}

function removeList(name) {
	$.ajax({
		type: "GET",
		url: "delete.php?" + name + "=" + name,
		success: function () {}
	});
}