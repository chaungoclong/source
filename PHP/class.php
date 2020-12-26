<!DOCTYPE html>
<html>
<head>
	<title>class</title>
</head>
<body>
	<?php 
	class person{
		private $weight;
		public function showInfo1(){
			echo "this is my weight: ".$this->weight."<br>";
		}
		public function setWeight($weight){
			$this->weight = $weight;
		}
	}
		class hocsinh extends person{
			private $name, $age;
			public function hamTao($name, $age, $weight){
				$this->setAge($age);
				$this->setName($name);
				$this->setWeight($weight);
			}

			public function setName($name){
				$this->name = $name;
			}
			public function setAge($age){
				$this->age = $age;
			}
			public function showInfo(){
				echo "Name: ".$this->name."<br>Age: ".$this->age."<br>";
				$this->showInfo1();
			}
		}

		$hocsinh = new hocsinh();
		$hocsinh->hamTao("hello", 18, 70);
		$hocsinh->showInfo();
		
		//$hocsinh->name = "OK";
	?>
</body>
</html>