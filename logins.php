<?php 
    session_start();
    require 'connect.php';
 
    // menangkap data yang dikirim dari form login
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    // menyeleksi data pada tabel admin dengan username dan password yang sesuai
    $data = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email='$email' and password='$password'");
 
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
 
    if($cek > 0){
        $_SESSION['email'] = $email;
        $_SESSION['status'] = "login";
        header("location:homepage.php");
    }
    else{
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
?>