<?php
@include 'connection.php';

session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);

   $select = "SELECT * FROM login_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);

      if($row['password'] == $password){
         // Password is correct
         if($row['user_type'] == 'admin'){
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');
         }elseif($row['user_type'] == 'user'){
            $_SESSION['user_name'] = $row['name'];
            header('location:index.php');
         }
      }else{
         $error[] = 'Incorrect password!';
      }
   }else{
      $error[] = 'Email not found in our records!';
   }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find My Dorm</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/Dorm_Dash-removebg-preview.png" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>


<body>
<!-- start of hero -->
  <div class="hero">
    <navbar>
      <img src="" class="logo" width="1000">
   <div data-bs-toggle="modal" data-bs-target="#modal5">
    <?php
    if (isset($_SESSION['user_name']) || isset($_SESSION['admin_name'])) {
        echo '<form action="logout.php" method="post">
                  <button class="custom-btn btn__effects" type="submit" name="logout"><span>Log Out</span></button>
              </form>';
    } else {
        echo '<button class="custom-btn btn__effects"><span>Log In</span></button>';
    }
    ?>
</div>

    </navbar>
    <div class="content">
      <h1 class="hero__text">Navigating Dorm Life <br>Made Easy</h1>
      <a href="dormnearme.php"> <button class="custom-btn btn__effects"><span>Find Dorm</span></button></a>
    </div>
    <div class="side-bar">
      <img src="" class="menu">
      <div class="social-links">
        <img src="https://i.ibb.co/9NKTKHF/fb.png" alt="">
        <img src="https://i.ibb.co/422KsjC/ig.png" alt="">
        <img src="https://i.ibb.co/9ZqmptB/tw.png" alt="">      
      </div>
      
      <div class="profile-link">
    <?php
    if (isset($_SESSION['user_name'])) {
        echo '<a href=""><img src="img/profile1.jpg" alt="" style="border-radius: 50%;">
        </a>';
    } else {
        echo '<i class="fa-solid fa-user"></i>  ';
    }

    ?>
</div>
    </div>
  </div>
<!-- end of hero -->
        <section>
            <div class="container py-5 my-5">
              <div class="row">
                <div class="col-md-6">
                    <div class="vertical px-5">
                        <h1 class="primary__text">01 Dorm Dash</h1>
                        <h5 class="subtitle text-secondary secondary__text">Find Dorm Near You</h5>
                        <div class="subtitle"></div>
                        <p class="secondary__text">
                          Are you a student preparing for your next academic adventure? Look no further – Dorm Dash is your ultimate companion in the quest for the perfect dormitory. <br>
                        </p>
                        <button class="custom-btn btn__effects"><span>Read More</span></button>
                    </div>
                </div>
                <div class="col-md-6 px-5">
                    <img src="img/h5.avif" class="w-100 img-fluid">
                </div>
              </div>
            </div>
          </section>

          <section class="counting">
            <div class="container px-5">
              <div class="row gx-5">
                <div class="col-md-3 col-sm-6 my-3">
                  <div class=" text-center py-4 pb-3">
                    <h3 data-target="10" class="count">0</h3>
                    <h1 class="primary__text">Dormitories Found</h1>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                  <div class=" text-center py-4 pb-3">
                    <h3 data-target="35" class="count">0</h3>
                    <h1 class="primary__text">Available Rooms</h1>
                  </div>
                </div>
                <div class="col-md-3  col-sm-6 my-3">
                  <div class="text-center py-4 pb-3">
                    <h3 data-target="1502" class="count">0</h3>
                    <h1 class="primary__text">Happy Residents</h1>
                  </div>
                </div>
                <div class="col-md-3  col-sm-6 my-3">
                  <div class="  text-center py-4 pb-3">
                    <h3 data-target="40" class="count">0</h3>
                    <h1 class="primary__text">Locations Scanned</h1>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section> 
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="container-general">
                    <div class="gallery-wrap wrap-effect-1">
                      <div class="item"></div>
                      <div class="item"></div>
                      <div class="item"></div>
                      <div class="item"></div>
                      <div class="item"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

            <!-- Modal for Login -->
        <div class="modal fade" id="modal5">
          <div class="modal-dialog modal-lg">
            <div class="modal-content mcd">
              <div class="modal-body">
                <div class="form-container">
                  <form action="" method="post">
                    <h3>Login Now</h3>
                    <?php
                    if(isset($error)){
                      foreach($error as $error){
                          echo '<span class="error-msg">'.$error.'</span>';
                      };
                    };
                    ?>
                    <div type="button" data-bs-dismiss="modal">
                      <span aria-hidden="true" class="close_btn">&times;</span>
                      </div>
                    <input type="email" name="email" required placeholder="Enter your email">
                    <input type="password" name="password" required placeholder="Enter your password">
                    <input type="submit" name="submit" value="LOGIN NOW" class="form-btn">
                    <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

          <!-- Footer -->
          <footer class="bg-footer">
            <div class="container-fluid">
            <div class="text-center footer__text">
                <p>Discover and reserve your ideal dormitory with Dorm Finder today. Your home away from home is just a click away.</p>
            </div>
            <div class="text-center my-3 footer__text">
              <p>2023 © Dorm Dash, All Rights Reserved</p>
          </div>
        </div>
        </footer>
  
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="index.js"></script>