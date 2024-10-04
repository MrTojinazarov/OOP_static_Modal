<?php
include 'Students.php';

if (isset($_POST['ok'])) {
    if (!empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['manzil']) && !empty($_FILES['photo'])) {


        $data = explode('.', $_FILES['photo']['name']);
        $filepath = date('Y-m-d_H-i-s_') . '.' . $data[1];
        move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $filepath);

        $photo = 'img/' . $filepath;

        $data =[
            'fio' => $_POST['fio'],
            'phone' => $_POST['phone'],
            'manzil' => $_POST['manzil'],
            'photo' => $photo
        ];

        Students::create($data);
        header("Location: index.php");
    }
}
