<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    //  check user email is valid or not
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {  //IF EMAIL IS VALID
        // check email already valid or not
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) { //if email already exist 
            echo "$email . already exist!";
        }else {
            //check user upload file or not
            if (isset($_FILES['image'])) { //if file is uploaded
                $img_name = $_FILES['image']['name'];  // getting user uploaded img name
                $img_type = $_FILES['image']['type'];  // getting user upload img type
                $tmp_name = $_FILES['image']['tmp_name']; // this temporary name save/move file in our folder

                // explode image and get the last extension like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // get the extension of an user uploaded img file

                $extensions = ['png', 'jpeg', 'jpg']; //these are some valid img ext and store them in array
                if (in_array($img_ext, $extensions) === true) { //if user uploaded ing ext is matched with any array extensions
                    $time = time(); // this will return us current time...
                                    //we need this time because when uploading user img into folder we rename userfile with current time
                                    // so all the img file will have unique name
                    //lemove user uploaded img to particular folder
                    $new_img_name = $time.$img_name;
                   if ( move_uploaded_file($tmp_name, "uploads/".$new_img_name)) {  // user upload img move to folder successfully
                         $status = "Active now"; // once user signed up his status will be active now
                         $random_id = rand(time(), 10000000); //creating random id for user

                         //insert all user data inside tables
                         $password = password_hash($password, PASSWORD_DEFAULT);
                         $sql2 =mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                             VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                         if ($sql2) { // if these data inserted
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; // using thie session unique id in other php file
                                echo "success";
                            }
                         }else {
                            echo "Something went wrong!";
                         }
                   }
                }else {
                    echo "Please select an image file - jpeg, png, jpg!";
                }
            }else {
                echo "Please select an image file!";
            }
        }
    }else {
        echo "$email . This is not a valid email";
    }
}else{
    echo "All input field are required!";
}
?>
