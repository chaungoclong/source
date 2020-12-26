<?php if (isset($so_trang)): ?>
	<?php for($i = 1; $i <= $so_trang; $i++): ?>
		<a 
			href="?trang_hien_tai=<?php echo $i; ?>&tim_kiem=<?php if(isset($tim_kiem)) echo $tim_kiem ?>
			&mode=<?php if(isset($mode))  echo $mode; else echo 'e-v'; ?>"
		>
			<?php echo $i; ?>
		</a>
	<?php endfor ?>
<?php endif ?>