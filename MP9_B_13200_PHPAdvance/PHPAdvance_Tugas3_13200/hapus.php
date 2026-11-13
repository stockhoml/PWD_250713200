<?php
    require 'koneksi.php';

    (hapus.php.?id=){
        $id = $_GET['id'];

        if($id === '' || ctype_digit($id) === false){
            echo '<p style="color:red;">!! ID tidak valid. !!</p>';
        }else{
            $stmt = mysqli_prepare($conn, "DELETE FROM buku WHERE id = ?");
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);

            if(mysqli_stmt_affected_rows($stmt) === 0){
                echo '<p>Data berhasil dihapus.</p>';
            }else{
                echo '<p style="color:red;">!! Data tidak ditemukan. !!</p>';
            }
        }
    }
?>