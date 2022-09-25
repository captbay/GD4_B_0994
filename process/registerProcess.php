<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){
    // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $phonenum = $_POST['phonenum'];
        $membership = $_POST['membership'];
        //counter ga unik
        $gaunik = 0;
 
        //number phone check kalo ada yang ga unik
        $query = mysqli_prepare($con, "SELECT COUNT(*) FROM users WHERE phonenum = ?");
        mysqli_stmt_bind_param($query, 's', $phonenum);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        // fetch column
        $cekPhonenum = mysqli_fetch_row($result)[0];
    


        //check email unik
            // Check email
        $query = mysqli_prepare($con, "SELECT COUNT(*) FROM users WHERE email = ?");
        mysqli_stmt_bind_param($query, 's', $email);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        // fetch column
        $cekEmail = mysqli_fetch_row($result)[0];

        // if phone number already exist
        if ($cekEmail > 0 && $cekPhonenum > 0) {
            $gaunik++;
            echo
            '<script>
            alert("Email dan nomor telpon sudah di regis!");
            </script>';
        } else if ($cekPhonenum > 0) { 
            $gaunik++;
            echo
            '<script>
            alert("Phone num sudah di regis!");
            </script>';
        } else if($cekEmail > 0){
            $gaunik++;
            echo
            '<script>
            alert("Email sudah di regis!");
            </script>';
        }

        if($gaunik > 0) { 
            echo
            '<script>
            window.history.back()
            </script>';
        }else{
            // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con,
            "INSERT INTO users(email, password, name, phonenum, membership)
            VALUES
            ('$email', '$password', '$name', '$phonenum', '$membership')")
            or die(mysqli_error($con)); 
            // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                '<script>
                alert("Register Success");
                window.location = "../index.php"
                </script>';
            }else{
                echo
                '<script>
                alert("Register Failed");
                </script>';
            }
        }      

    }else{
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>