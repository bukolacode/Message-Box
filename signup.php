<?php
  session_start();
  if (isset($_SESSION['unique_id'])) { // if user logged in
   header('location: users.php');
  }
?>
<?php include_once "header.php";?>
<body>
   <div class="wrapper">
      <section class="form signup">
        <header>Realtime Chat app</header>
        <form action="" enctype="multipart/form-data" autocomplete="off">
         <div class="error-txt"></div>
         <div class="name-details">
            <div class="field input">
               <label>First Name</label>
               <input type="text" name="fname" placeholder="First Name" required>
            </div>
         </div>
         <div class="name-details">
            <div class="field input">
            <div class="name-details">
            <div class="field input">
               <label>Last Name</label>
               <input type="text" name="lname" placeholder="last Name" require!>
            </div>
         </div>
         <div class="name-details">
            <div class="field input">
               <label>Email address</label>
               <input type="text" name="email" placeholder="Enter your Email" required!>
            </div>
         </div>
         <div class="name-details">
            <div class="field input">
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter New Password" required!>
               <i class="fas fa-eye"></i>
            </div>
         </div>
         <div class="name-details">
            <div class="field image">
               <label>Select image</label>
               <input type="file" name="image" require!>
            </div>
         </div>
         <div class="field button">
            <input type="button" value="Continue to Chat">
         </div>
        </form>
        <div class="link">Already signedup?<a href="loginform.php">Login now</a></div>
      </section>
   </div>

   <script src="javascript/pass-hide-show.js"></script>
   <script src="javascript/signup.js"></script>

</body>
</html>
