function setCookie(name,value,days)
{
	var actPeriod = new Date();

	actPeriod.setTime(actPeriod.getTime()+(days*24*60*60*30));
	document.cookie = name + "=" + value + "; expires="+ actPeriod.toGMTString() + "; path=/";
	return ;
}

function deleteCookie(name)
{
	setCookie(name, 'deleted', -1);
	return ;
}

function makeClear(num)
{
	var n = num + "";
	while (n.length < 2)
	{
		n = "0" + n;
	}
	return (n);
}

function vipeOut(txt)
{
	if (confirm('Do you really want to delete this todo ?'))
	{
		console.log(txt);
		$("#"+txt).remove();
		deleteCookie(txt);
	}
}

var k = 0;
function plusBlock(txt)
{
	k++;
	$("#ft_list").append("<div "+"id="+"todo"+makeClear(k)+" onclick=vipeOut(\""+"todo"+makeClear(k)+"\") "+"name="+"todo"+makeClear(k)+">"+txt+"</div>");
	setCookie("todo"+makeClear(k), txt.replace('=', '%3D').replace(';', '%3B'), 7);
}

function newTodo()
{
	var txt = prompt("Enter the new todo");
	if (txt.length > 0)
	{
		plusBlock(txt);
	}
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

var cookies = getCookie();
var orderedVals = Object.keys(cookies).sort();

for (var n in orderedVals)
{
	deleteCookie(orderedVals[n]);
	plusBlock(cookies[orderedVals[n]]);
}