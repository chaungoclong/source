<table border="1px" style="border-collapse: collapse;">
	<tr>
		<th style="text-align: center;">SỐ BÁO DANH</th>
		<th>HỌ VÀ TÊN</th>
		<th>ĐIỂM</th>
	</tr>
	<tr>
		<td><?php if(isset($result[0])) echo $result[0];?></td>
		<td><?php if(isset($result[1])) echo $result[1];?></td>
		<td><?php if(isset($result[2])) echo $result[2];?></td>
	</tr>
</table>