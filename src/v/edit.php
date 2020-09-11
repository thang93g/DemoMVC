<form method="post" enctype="multipart/form-data">
    Name:<input type="text" name="name" value="<?php echo $student['name'] ?>">
    Class:<input type="text" name="class" value="<?php echo $student['class'] ?>">
    Address:<input type="text" name="address" value="<?php echo $student['address'] ?>">
    <input type="submit" value="edit">
</form>
