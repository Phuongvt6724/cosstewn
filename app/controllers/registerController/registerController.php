<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/cosstewn/app/" . "models/registerModel/registerModel.php";
    $register = new Register();

    if(isset($_POST['submit'])) {
        extract($_POST);
        $name = ucwords($ho . ' ' . $ten);
        $user = $register->getInfoUser($email);
        var_dump($user);
        $pass = hash_hmac('sha256', $repass, 'coscoscos');
        // $pass = $repass;

        if (is_array($user) && $user['email'] === $email) {
            echo "<script>alert('Email đã tồn tại!'); window.location.href = document.referrer;</script>";
            exit(); 
        } else if (is_array($user) && $user['so_dien_thoai'] === $so_dien_thoai) {
            echo "<script>alert('Số điện thoại đã tồn tại!'); window.location.href = document.referrer;</script>";
            exit(); 
        } else {
            $id = $register->addNewUser($name, $email, $phone, $address, $pass, null);
            $id_encode = base64_encode($id);
            // header("Location: ../index.php?page=ho-so&u=$id_encode");
            echo "<script>window.location.href='/cosstewn/app/controllers/index.php?page=ho-so&u=" . $id_encode . "';</script>";
        }
    } else {
        // echo 1111;
        $data_user = $_SESSION['data_user'];
        if(isset($data_user['name']) && isset($data_user['email']) && isset($data_user['avatar'])) {
            $id = $register->addNewUser($data_user['name'], $data_user['email'], '', '', '', $data_user['avatar']);
            $id_encode = base64_encode($id);
            // header("Location: ../index.php?page=ho-so&u=$id_encode");
            echo "<script>window.location.href='/cosstewn/app/controllers/index.php?page=ho-so&u=" . $id_encode . "';</script>";
        }
    }
?>