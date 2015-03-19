<?php
session_start();
include "../koneksi/conn.php";


if (isset($_POST['login'])) {




// FETCH DATA FROM INPUT FIELD
$user = mysqli_real_escape_string($sqli, $_POST['id']);
$pass = mysqli_real_escape_string($sqli, $_POST['passw']);

  // CHECK ALL FIELD HAS BEEN FILLED UP


if ($user && $pass) 
{
  $juml=strlen($user);
             if ($juml == 9) 
                {
                   // QUERY FROM DATABASE
                   $kueri = "SELECT * FROM mahasiswa WHERE nim_mahasiswa='$user' and password = '$pass'";
                   $query = mysqli_query($sqli, $kueri);
                   $a = mysqli_fetch_array ($query);
                   $checkuser = mysqli_num_rows($query); 

                   // CHECK IF USERNAME EXIST ON DATABASE
                   if($checkuser != 0) 
                       {
                        $_SESSION['id'] = $a ['NIM_MAHASISWA'];
                        $_SESSION['nama'] = $a ['NAMA_MAHASISWA'];
                        $_SESSION['tipe'] = "Mahasiswa";
                         echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../user/index.php">';
                       }
                      
                }



            else if ($juml == 15)
                     {

                        $kueri = "SELECT * FROM dosen WHERE nip_dosen='$user' and password = '$pass'";
                        $query = mysqli_query($sqli, $kueri);
                        $a = mysqli_fetch_array ($query);
                        $checkuser = mysqli_num_rows($query); 
  
                       // CHECK IF USERNAME EXIST ON DATABASE
                       if($checkuser != 0) 
                           {
                            $_SESSION['id'] = $a ['NIP_DOSEN'];
                             $_SESSION['nama'] = $a ['NAMA_DOSEN']; 
                             $_SESSION['tipe'] = "Dosen";  
                          } 
                         
                          echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../user/index.php">';
                     }






           else 
           { 
           $kueri = "SELECT * FROM pengurus WHERE nip_pengurus='$user' and password = '$pass'";
           $query = mysqli_query($sqli, $kueri);
           $a = mysqli_fetch_array ($query);
           $checkuser = mysqli_num_rows($query); 
          
           // CHECK IF USERNAME EXIST ON DATABASE
           if($checkuser != 0) 
           {
            
            $_SESSION['id'] = $a ['NIP_PENGURUS'];
            $_SESSION['nama'] = $a ['NAMA_PENGURUS'];   
            $_SESSION['tipe'] = "Admin";
           }
           echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../admin/index.php">';
           }


}
else

 {echo '<META HTTP-EQUIV="Refresh" content =" 0; URL= ../index.php">';}
}




/*   // FETCHING PASSWORD IN DATABASE WHERE USERNAME COINCIDES
  

    // CHECK IF ENTERED PASSWORD MEETS THE USERNAME PASSWORD
   if ($pass== $checkpass) {

     // IF ALL OKAY SET SESSION
    setcookie("id", $a, time()+7200);
    $_SESSION['user'] = $user;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 60);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
   } else {

     // SET VARIABLE THAT'LL SHOW IF USER PASSWORD IS INCORRECT
    $error = "Incorrect password!";
   }
  }
 } else {

  // SET VARIABLE IF ALL FIELD ARE NOT FILLED UP
 $error = "Please enter a username and password.";
 }
}
*/


?>