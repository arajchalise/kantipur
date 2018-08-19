<!DOCTYPE html>
<?php include 'Include/connection.php'; ?>
<html>
<?php include 'Include/head.php'; ?>
<body data-spy="scroll" data-target="#site-navbar" data-offset="200">
	 <nav class="navbar navbar-expand-lg navbar-dark site_navbar bg-dark site-navbar-light" id="site-navbar" style="background: #000;">
      <div class="container">
        <a class="navbar-brand" href="index.php">The Kantipur-Halal Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="site-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#section-shop" class="nav-link">Shop Now</a></li>
            <li class="nav-item"><a href="index.php#section-contact" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->


	 <section class="site-cover" style="background-image: url(Images/bg_3.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center site-vh-100">
          <div class="col-md-12">
            <h1 class="site-heading">The Kantipur</h1>
            <h3 style="color: #fff;">Shop Halal Food Now</h3>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="section-shop">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
            <h2 class="display-4"> Halal Food</h2><br>
            <?php 
          $shop = mysqli_query($conn, "SELECT * FROM halal_shop");
  
            ?>
            <div class="row justify-content-center">
            </div>
          </div>
          <div class="clearfix"></div>
            <?php
            while($shops = mysqli_fetch_array($shop)){
           ?>
            <div class="media menu-item col-md-4 col-lg-4 col-sm-12 col-xs-12">
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $shops['food_name']; ?></h5>
                        <p><?php echo $shops['food_detail']; ?></p>
                        <h6 class="text-primary menu-price"><i class="fa fa-jpy"></i> <?php echo $shops['price']; ?></h6>
                      </div>
                    </div>
          <?php }
           ?>
          </div>
        </div>
    </section>


    <?php 
include 'Include/footer.php';
include 'Include/script.php'; ?>

</body>
</html>