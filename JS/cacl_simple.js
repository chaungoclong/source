function calc(){
	var y = document.getElementsByTagName('input');
	var r = document.getElementById('result');
	for(var i = 0; i < y.length; ++i){
		switch(y[i].id){
			case "1": case "2": case "3":
			case "4": case "5": case "6":
			case "7": case "8": case "9":
			case "+": case "-": case "x":
			case "/": case ".":
			case "0":{
				console.log(y[i]);
				y[i].onclick=function(){
					r.value+=this.value;
				}
				break;
			}

			case "del":{
				console.log(y[i]);
				y[i].onclick=function(){
					r.value = r.value.substring(0,(r.value.length) - 1);
				}
				break;
			}

			case "del_all":{
				y[i].onclick=function(){
					r.value = "";
				}
				break;
			}

			case "rs":{
				console.log(y[i]);
				y[i].onclick=function(){
					r.value=r.value.replace("x", "*");
					r.value = eval(r.value);
				}
				break;
			}
		}
	}
}

function clock(){
	var date = new Date();
	var h, m, s, ss;
	h = date.getHours();
	m = date.getMinutes();
	s = date.getSeconds();
	ss = "AM"
	if(h > 12){
		h -= 12;
		ss = "PM";
	}
	if(h == 0){
		h = 12;
	}

	h = (h < 10) ? "0" + h : h;
	m = (m < 10) ? "0" + m : m;
	s = (s < 10) ? "0" + s : s;

	document.getElementById('h').value = h;
	document.getElementById('m').value = m;
	document.getElementById('s').value = s;
	document.getElementById('d').innerHTML = new Date().toDateString();
	document.getElementById('ss').value = ss;
	setTimeout(clock, 0);
}