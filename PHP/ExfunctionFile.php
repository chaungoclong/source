<?php 
	function upfile($conn, $user, $pass, $url){
		$sql="INSERT INTO acc(img) VALUES(?) WHERE username=? AND pass=?";
		$tmp=$conn->prepare($sql);
		$tmp->bind_param("sss", $url, $user, $pass);
		if($tmp->execute()){
			return 1;
		}
		return 0;
	}

	function updatefile($conn, $user, $pass, $url){
		$sql="UPDATE acc SET img=?  WHERE username=? AND pass=?";
		$tmp=$conn->prepare($sql);
		$tmp->bind_param("sss", $url, $user, $pass);
		if($tmp->execute()){
			return 1;
		}
		return 0;
	}
?>