var value = 0;
var count = setInterval(run, 1000);

function run() {
	value++;
	window.alert(value);
}

function stop(argument) {
	clearInterval(count);
}