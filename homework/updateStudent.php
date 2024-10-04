<?php
include 'Students.php';

if (isset($_POST['ok'])) {
    if (!empty($_POST['fio']) && !empty($_POST['phone']) && !empty($_POST['manzil']) && !empty($_POST['id']) && isset($_POST['old_photo'])) {
        
        $id = $_POST['id'];

        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo'];
            $data = explode('.', $photo['name']);
            $filepath = date('Y-m-d_H-i-s_') . '.' . end($data);

            if (move_uploaded_file($photo['tmp_name'], 'img/' . $filepath)) {
                $data = [
                    'id' => htmlspecialchars(strip_tags($id)),
                    'fio' => htmlspecialchars(strip_tags($_POST['fio'])),
                    'phone' => htmlspecialchars(strip_tags($_POST['phone'])),
                    'manzil' => htmlspecialchars(strip_tags($_POST['manzil'])),
                    'photo' => 'img/' . $filepath 
                ];
            } else {
                echo "Rasmni yuklashda xato.";
                exit; 
            }
        } else {
            $data = [
                'id' => htmlspecialchars(strip_tags($id)),
                'fio' => htmlspecialchars(strip_tags($_POST['fio'])),
                'phone' => htmlspecialchars(strip_tags($_POST['phone'])),
                'manzil' => htmlspecialchars(strip_tags($_POST['manzil'])),
                'photo' => htmlspecialchars(strip_tags($_POST['old_photo']))
            ]; 
        }

        if (Students::update($data, $id)) {
            header("Location: index.php"); 
            exit; 
        } else {
            echo "Yangilanishda xato.";
        }
    } else {
        echo "Barcha maydonlarni to'ldiring.";
    }
}
?>
