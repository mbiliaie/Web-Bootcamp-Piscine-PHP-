function setCookie(name,value,days)
{
	var actPeriod = new Date();

	actPeriod.setTime(actPeriod.getTime()+(days*24*60*60*30));
	document.cookie = name + "=" + value + "; expires="+ actPeriod.toGMTString() + "; path=/";
	return ;
}

function deleteCookie(name)
{
	setCookie(name, 'deleted', -2);
	return ;
}

function makeClear(num)
{
	var n = num + "";
	while (n.length < 5)
	{
		n = "0" + n;
	}
	return (n);
}

var k = 0;

function plusBlock(str)
{
	var div = document.createElement('div');
	var ft_list = document.getElementById('ft_list');

	div.setAttribute("name", 'todo' + makeClear(k++));
	div.addEventListener(
		"click",
		function()
		{
			if (confirm('Do you really want to delete this todo ?'))
			{
				ft_list.removeChild(div);
				deleteCookie(div.getAttribute('name'));
			}
		}, false);
	div.innerHTML = str.replace('%3D', '=').replace('%3B', ';');
	setCookie(div.getAttribute('name'), str.replace('=', '%3D').replace(';', '%3B'), 7);
	ft_list.insertBefore(div, ft_list.firstChild);
}

function newTodo()
{
	var str = prompt("Enter the new todo");
	if (str.length > 0)
		plusBlock(str);
}

function getCookie()
{
	var saveCookie = document.cookie.split(';');
	var mtx = {};

	for (var n in saveCookie)
	{
		var src = saveCookie[n].split("=");

		if (src.length > 1 && /todo\d+/.test(src[0]))
		{
			mtx[src[0].trim()] = src[1].trim();
		}
	}
	return (mtx);
}

var cookies = getCookies();
var sortedKeys = Object.keys(cookies).sort();

for (var n in orderedVals)
{
	deleteCookie(orderedVals[n]);
	plusBlock(cookies[orderedVals[n]]);
}