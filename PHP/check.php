<?php 
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(isset($_GET['san_pham'])){
			foreach($_GET['san_pham'] as $val){
				echo $val."-";
			}
		}
	}
 ?>