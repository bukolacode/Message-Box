<?php
// session_start();
// include_once "config.php";
// $email = mysqli_real_escape_string($conn, $_POST['email']);
// $dtPword = mysqli_real_escape_string($conn, $_POST['password']);

// if (!empty($email) && !empty($dtPword)) {

//     $fetch = mysqli_query($conn, "SELECT password FROM users WHERE email = '{$email}'");
//     $row = mysqli_fetch_assoc($fetch);
//     // echo $row['password'];
//     $dbPword = $row['password'];
//     // exit;
//     $password = password_verify($dtPword, $dbPword);
//     // check users entered email & password matched to database anay table row email & password
//     // $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password }'");

//     if (mysqli_fetch_assoc($fetch) < 1) { // if users credentials matched
//         $status = "Active now";
//         // updating user status to active now if user login successfully
//         $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
//         if ($sql2) {
//             $_SESSION['unique_id'] = $row['unique_id']; // using thie session unique id in other php file
//             echo "success";
//         }

//     }else {
//         echo "Email or Password is incorrect!";
//     }
// }else {
//     echo " All input field are required!";
// }



///verifying and logina
session_start();
include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$dtPword = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($dtPword))
{
    $fetch = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($fetch) < 1)
    {
        echo "Account does not exist";
    }
    else{
        $row = mysqli_fetch_assoc($fetch);
        $dbPword = $row['password'];
        //verify password
        $password = password_verify($dtPword, $dbPword);
        if($password)
        {
            $status = 'Active Now';
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $row['unique_id']; // using thie session unique id in other php file
                    echo "success";
                }
        }
        else
        {
            echo "Incorrect Credentials";
        }
    }

}else{
    echo "All Inputs are Required";
}
?>
