<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <select name="data" size="1">
            <option value="create">TẠO DATABASE CỦA BẠN</option>
            <option value="table">TẠO BẢNG</option>
            <option value="insert">THÊM DỮ LIỆU</option>
        </select>
        <input type="submit" name="send" value="GỬI">
    </form>
    <?php 
        if(isset($_POST['send'])){
           $action = $_POST['data'];
           switch($action){
            case "create":{
                header('location: createDB1.php');
                break;
            }
           }
        }
    ?>
</body>
</html>