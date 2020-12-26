<?php 
	function getData($conn, $username, $pass){
		$sql="SELECT * FROM acc WHERE username=? AND pass=?";
		$tmp=$conn->prepare($sql);
		$tmp->bind_param("ss", $username, $pass);
		$tmp->execute();
		$kq=$tmp->get_result();
		$arrKq=[];
		$index = 0;
		if($kq->num_rows){
			while($row = $kq->fetch_assoc()){
				$arrKq[0] = $row['id'];
				$arrKq[1] = $row['username'];
				$arrKq[2] = $row['pass'];
				$arrKq[3] = $row['img'];
			}
		}
		else{
			$arrKq[0] = 0;
		}
		$tmp->close();
		return $arrKq;
	}
?>