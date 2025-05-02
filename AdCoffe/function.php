<?php
//koneksi
$koneksi = mysqli_connect("localhost","root","","controlpanelcoffe");

// check eror connection
if ( mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

//daftar user
if(isset($_POST["register"])){
    //jika tombol register di klik
    $email = $_POST["email"];
    $password = $_POST["password"]; //pure inputan user

    //fungsi enkripsi
    $epassword = password_hash($password,PASSWORD_DEFAULT);

    //insert to db
    $insert = mysqli_query($koneksi,"INSERT INTO user (email,password) values('$email','$epassword')");

    if($insert){
       //jika berhasil 
       header("location:login.php");
    } else{
        //jika gagal
        echo"
        <script>
        alert('Register failed');
        windows.location.href='register.php';
        </script>
        ";
    }
}

//login user
if(isset($_POST["login"])){
    //jika tombol login di klik
    $email = $_POST["email"];
    $password = $_POST["password"]; //pure inputan user


    //insert to db
    $cekdb = mysqli_query($koneksi,"SELECT * FROM user where email='$email'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $passwordsekarang = $pw["password"];

    if($hitung > 0){
        //jika ada
        //verifikasi password
        if(password_verify($password,$passwordsekarang)){
            //jika passwordnya benar
            $_SESSION['login'] = true;
            header('location:index.php'); //ke halaman utama
            
        }else{
        //jika password salah
        echo'
        <script>
        alert("Login failed");
        windows.location.href="login.php";
        </script>
        ';
        }
    }
}

//keranjang belanja
// session_start();
// $userId = $_SESSION['user_id'];  // Pastikan user sudah login

// $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id");
// $stmt->bindParam(':user_id', $userId);
// $stmt->execute();
// $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

//menambah keranjang belanja
// function addToCart($userId, $productId, $quantity) {
//     global $pdo;
    
//     // Cek apakah produk sudah ada di keranjang
//     $stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
//     $stmt->bindParam(':user_id', $userId);
//     $stmt->bindParam(':product_id', $productId);
//     $stmt->execute();
//     $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     if ($existingItem) {
//         // Jika ada, update jumlah produk
//         $stmt = $pdo->prepare("UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id");
//         $stmt->bindParam(':quantity', $quantity);
//         $stmt->bindParam(':user_id', $userId);
//         $stmt->bindParam(':product_id', $productId);
//         $stmt->execute();
//     } else {
//         // Jika tidak ada, tambahkan produk baru ke keranjang
//         $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
//         $stmt->bindParam(':user_id', $userId);
//         $stmt->bindParam(':product_id', $productId);
//         $stmt->bindParam(':quantity', $quantity);
//         $stmt->execute();
//     }
// }

// //menghapus item di keranjang
// function removeFromCart($userId, $productId) {
//     global $pdo;
//     $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id");
//     $stmt->bindParam(':user_id', $userId);
//     $stmt->bindParam(':product_id', $productId);
//     $stmt->execute();
// }

//login admin
if(isset($_POST["loginadmin"])){
    //jika tombol login di klik
    $username_admin = $_POST["username_admin"];
    $password_admin = $_POST["password_admin"]; //pure inputan user


    //insert to db
    $cekdb = mysqli_query($koneksi,"SELECT * FROM admin where username_admin='$username_admin'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $passwordadmin = $pw["password_admin"];

    if($hitung > 0){
        //jika ada
        //verifikasi password
        if(password_verify($password_admin,$password_admin)){
            //jika passwordnya benar
            header('location:indexadmin.php'); //ke halaman utama
        }else{
        //jika password salah
        echo'
        <script>
        alert("Login failed");
        windows.location.href="adminpanel/loginadmin.php";
        </script>
        ';
        }
    }
}
?>