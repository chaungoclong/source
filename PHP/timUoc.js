var number = 2000000;
var count = 0;
var estimate = 1;

for(var i = 2; i <= number; ++i){
	while(n % i == 0){
		count++;
		n /= i;
	}
	estimate *= (count + 1);
	count = 0;
}

console.log(estimate);
