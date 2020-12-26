<link rel="stylesheet" href="../CSS/thuoc_no.css">
<footer class="footer">
	<?php if (isset($so_trang)): ?>
		<?php for($i = 1; $i <= $so_trang; $i++): ?>
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php if(isset($tim_kiem)) echo $tim_kiem; ?>"><?php echo $i ?></a>
		<?php endfor ?>
	<?php endif ?>
</footer>
	
</div>