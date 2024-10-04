<?php
include 'Students.php';
$students = Students::getAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Students</h1>
                <a href="Create.php" type="button" class="btn btn-outline-primary">Add student</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-striped table-bordered table-hover" style="border: 1px;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FIO</th>
                            <th scope="col">PHONE</th>
                            <th scope="col">MANZIL</th>
                            <th scope="col">PHOTO</th>
                            <th scope="col">OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <th scope="row"><?=htmlspecialchars($student->id)?></th>
                                <td><?=htmlspecialchars($student->fio)?></td>
                                <td><?=htmlspecialchars($student->phone)?></td>
                                <td><?=htmlspecialchars($student->manzil)?></td>
                                <td>
                                    <?php if (!empty($student->photo) && file_exists($student->photo)): ?>
                                        <img src="<?=$student->photo?>" style="max-width: 100px; max-height: 100px;">
                                    <?php else: ?>
                                        <img src="path/to/default/image.jpg" style="max-width: 100px; max-height: 100px;">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="Update.php?student_id=<?=$student->id?>" class="btn btn-primary">Update</a>
                                    <a href="Delete.php?student_id=<?=$student->id?>" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
