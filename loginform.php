<?php
  session_start();
  if (isset($_SESSION['unique_id'])) { // if user logged in
   header('location: users.php');
  }
?>
<?php
include_once "header.php";
?>
<body>
   <div class="wrapper">
      <section class="form login">
        <header>Realtime Chat app</header>
        <form action="" autocomplete="off">
        <div class="error-txt"></div>
         <div class="name-details">
            <div class="field input">
               <label>Email address</label>
               <input type="text" name="email" placeholder="Enter your Email ">
            </div>
         </div>
         <div class="name-details">
            <div class="field input">
               <label>Password</label>
               <input type="password" name="password" placeholder="Enter your Password">
               <i class="fas fa-eye"></i>
            </div>
         </div>
         <div class="field button">
            <input type="button" value="Continue to Chat">
         </div>
        </form>
        <div class="link">Not yet signed up?<a href="index.php">signup now</a></div>
      </section>
   </div>

   <script src="javascript/pass-hide-show.js"></script>
   <script src="javascript/login.js"></script>
</body>
</html>

