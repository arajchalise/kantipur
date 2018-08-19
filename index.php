<?php
session_start();

if(!isset($_SESSION['msg'])){
  $msg = "";
  $a_date = "Arrival Date";
  $a_time = "Arrival Time";
  $d_time = "Departure Time";
}
else{
  $msg = $_SESSION['msg'];

  if($msg=="No Table available"){
  $a_date = "Arrival Date";
  $a_time = "Arrival Time";
  $d_time = "Departure Time";
  }
  else{
  $a_date = $_SESSION['a_date'];
  $a_time = $_SESSION['a_time'];
  $d_time = $_SESSION['d_time'];
}
}

if(isset($_SESSION['reserv'])){
  ?>
<script type="text/javascript">
  
  alert("Reservation Complete");
</script>
  <?php 
  unset($_SESSION['reserv']);
}




if(isset($_SESSION['email'])){
  ?>
  <script type="text/javascript">
    alert(<?php echo $_SESSION['email'];
     ?>)
  </script>
  <?php 
  unset($_SESSION['email']);
}


 ?>
<!DOCTYPE html>
<html lang="en">
  <?php 
  include 'Include/connection.php';
  include 'Include/head.php'; 
  ?>
  <body data-spy="scroll" data-target="#site-navbar" data-offset="200">
    
   <?php include 'Include/header.php'; ?>
   <!-- Welcome page, Home page starts here -->
    <section class="site-cover" style="background-image: url(Images/bg_3.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center site-vh-100">
          <div class="col-md-12">
            <h1 class="site-heading">The Kantipur</h1>
            <p>
            <a href="#" class="btn btn-outline-white btn-lg"     >Nepali Cusine</a>
            <a href="#" class="btn btn-outline-white btn-lg"     >Indian Cusine</a>
            <a href="#" class="btn btn-outline-white btn-lg"     >Halal Food</a></p>
          </div>
        </div>
      </div>
    </section>
    <!-- End of Home section-->
    
    <!-- About Section Starts here -->
    <section class="site-section" id="section-about">
      <?php include 'Include/about.php'; ?>
    </section>
    <!-- END of About Section section -->
    

    <!-- Menu Section Starts Here -->
    <section class="site-section" id="section-menu">
     <?php include 'Include/menu.php'; ?>
    </section>
    <!-- END Menu section -->

    <!-- Menu Section Starts Here -->
    <section class="site-section" id="section-today">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
            <h2 class="display-4"> Todays' Special</h2>
            <?php 
          $today = mysqli_query($conn, "SELECT * FROM menu WHERE s_id=1");
          $tod = mysqli_query($conn, "SELECT * FROM menu WHERE s_id=1");
          if(mysqli_num_rows($tod)==0){
            ?>
            <p class="lead">No Special menu today.</p>
            <?php

          }
          else{
            ?>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">We have presented you our todays' special menu.</p>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
            <?php
            while($todays = mysqli_fetch_array($today)){
           ?>
            <div class="media menu-item col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <img class="mr-3" src="images/<?php echo $todays['image']; ?>" class="img-fluid" alt="<?php echo $todays['name']; ?>">
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $todays['name']; ?></h5>
                        <p><?php echo $todays['detail']; ?></p>
                        <h6><i class="fa fa-jpy"></i> <?php echo $todays['price']; ?></h6>
                      </div>
                    </div>
          <?php }
          } ?>
          </div>
        </div>
    </section>
    <!-- END Menu section -->


    <!-- Reservation section starts here  -->
    <section class="site-section" id="section-reservation">
      <div class="container">
        <div class="row site-custom-gutters">
          <div class="col-md-12 text-center mb-5 ">
            <h2 class="display-4">Make Reservation</h2>
          </div>
          </div>
            <div class="row">
              <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
               <center><h4>Check Availability</h4></center> 
                <form method="post" action="Include/reserve.php">
                  <input type="text" id="datepicker" name="a_date" placeholder="<?php echo $a_date; ?>" style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;" required/>
                  <br>
                  <input type="text" id="timepicker1" name="a_time" placeholder="<?php echo $a_time; ?>" style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"  required/> 
                  
                  <input type="text"  name="d_time" placeholder="<?php echo $d_time; ?>" style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;" readonly> 
                  <br>
                  <input type="submit" name="" value="Check" class="btn btn-primary btn-lg">
                </form>
              </div> 
          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <?php 
            if($msg == ""){
              ?>
              <p>Please provide date and time for cheking procedure of Availability of Table</p>
              <?php 
            }
            else if($msg == "No Table available"){?>
            <p>Sorry, No table available for particular time. Please check for another time </p>
          <?php  
          } 
          else{?>
          <h4>
            Reservation
          </h4>
          <form action="Include/reservation.php" method="post">
            <input type="text" name="name" placeholder="Enter your name" required style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"><br>
            <input type="text" name="address" placeholder="Enter your Address" required style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"><br>
            <input type="email" name="email" placeholder="Enter your email" required style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"><br>
            <input type="text" name="phone" placeholder="Enter your phone number" required style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"><br>
            <select name="table" style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;">
              <option value="0" selected>Choose Table</option>
              <?php
                foreach ($_SESSION['available'] as $key => $value) {
                  ?>
                  <option value="<?php echo $value; ?>">Table No. <?php echo $value; ?></option>
                  <?php
                }

               ?>
            </select><br>
            <input type="text" name="nopos" placeholder="Enter Total number of Person" required style="width: 80%; height: 35px; border: none; border-bottom: 2px solid black; margin-bottom: 10px;"><br>
            <input type="date" name="a_date" value="<?php echo $_SESSION['a_date']; ?>" hidden>
            <input type="time" name="a_time" value="<?php echo $_SESSION['a_time']; ?>" hidden>
            <input type="time" name="d_time" value="<?php echo $_SESSION['d_time']; ?>" hidden>
            <input type="submit" name="" value="Reserve" class="btn btn-primary btn-lg">
          </form>



          <?php } ?>
          </div>
          

        </div>
      </div>
    </section>
    <!-- END Reservation section -->

    <!-- Contact Section Starts Here -->
    <section class="site-section bg-light" id="section-contact">
      <div class="container">
        <div class="row">

          <div class="col-md-12 text-center mb-5 ">
            <h2 class="display-4">Get In Touch</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Customers are god for us and your suggestion and message means a lot to us. Feel free to contact us and let us know what you think of us.</p>
              </div>
            </div>
          </div>

          <div class="col-md-12 mb-5 ">
            <form action="Include/mail.php" method="post">
              <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="phone" class="sr-only">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number" required>
              </div>
              <div class="form-group">
                <label for="message" class="sr-only">Message</label>
                <textarea  name="msg" id="message" cols="30" rows="10" class="form-control" placeholder="Write your message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn  btn-lg" value="Send Message" style="background-color: #000; color: #fff;">
              </div>
            </form>
          </div>
         
         
          
        </div>
      </div>
    </section>

    <!-- End of Contact Section -->
    
<?php 
include 'Include/footer.php';
include 'Include/script.php'; ?>
        
  </body>
</html>
<?php session_destroy(); ?>