<a href="index.php?page=add">Add</a>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>class</th>
        <th>address</th>
        <th>image</th>
        <th colspan="2">action</th>
    </tr>
    <?php if (empty($students)): ?>
    <tr>
        <th colspan="5">NO data</th>
    </tr>
    <?php else: ?>
    <?php foreach ($students as $key=>$student): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $student->getName() ?></td>
        <td><?php echo $student->getClass() ?></td>
        <td><?php echo $student->getAddress() ?></td>
        <td><img style="width: 80px;height: 80px" src="<?php echo $student->getImage() ?>"> </td>
        <td><a href="index.php?page=edit&id=<?php echo $student->getId() ?>">edit</a> </td>
        <td><a href="index.php?page=delete&id=<?php echo $student->getId() ?>">delete</a> </td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>