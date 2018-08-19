<?php session_start();?>
<?php 
if(isset($_SESSION['username'])){
  $user = $_SESSION['username'];
}
else{
  header("location:admin.php");
  exit();
}

 ?>
<!DOCTYPE html>
<html>
<?php
include 'include/head.php'; 
include 'include/connection.php';
?>
<style type="text/css">
  td{
    min-width: 100px;
    padding-left: 10px;
    height: 35px;
  }


</style>
<body>
	<div class="container-fluid" style="padding-right: 0px; padding-left: 0px;">
		 <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; width: 100%; background: #000 !important; color: #fff; z-index: 1000;">
  <a class="navbar-brand" href="#" style="color: #fff;">The Kantipur</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #fff;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 30px;">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#menu" style="color: #fff;">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#today" style="color: #fff;">Todays Special</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#shop" style="color: #fff;">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#add" style="color: #fff;">Add Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#reservation" style="color: #fff;">Reservation</a>
      </li>
     
      
  
    </ul>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    <a href="Include/logout.php" class="btn btn-lg btn-primary" style="background-color: blue; margin-left: 20px; border:none;">Log Out</a>
  </div>
</nav>
<div id="menu">
  <div style="height: 80px; width: 100%;"></div>
	<center><h3>Menu</h3></center>
    <div class="row" style="width: 85%; margin-left: auto; margin-right: auto;">

    	<?php 
    		$menu = mysqli_query($conn, "SELECT * FROM menu");
    		while($menu_data = mysqli_fetch_array($menu)){
    	 ?>
    	<div class="media menu-item col-md-6 col-lg-6 col-sm-12 col-xs-12">
    			<div style="width: 100%; clear: both;">
                      <img class="mr-3" src="images/<?php echo $menu_data['image']; ?>" class="img-fluid" alt="<?php echo $menu_data['name']; ?>">
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $menu_data['name']; ?></h5>
                        <p><?php echo $menu_data['detail']; ?></p>
                        <h6 class="text-primary menu-price"><?php echo $menu_data['price']; ?></h6>
                      </div>
                      </div>
                      <div style="width: 100%; clear: both;"><a href="Include/make_special.php?id=<?php echo $menu_data['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000; margin-top: 5px; width: 100%;">Make Todays Special</a>
                      	<a href="Include/delete.php?id=<?php echo $menu_data['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000; margin-top: 5px; width: 100%;">Delete</a><br>
                 		<a href="Include/edit.php?id=<?php echo $menu_data['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000; margin-top: 5px; width: 100%;">Edit</a>
                    </div>
                </div>
    	<?php } ?>
    </div>
    </div>

    
        <div id="today">
          <div style="height: 80px; width: 100%;"></div>
        	<center><h3>Todays' Special</h3></center>
          <div class="row" style="width: 85%; margin-right: auto; margin-left: auto;">
          <?php 
          $today = mysqli_query($conn, "SELECT * FROM menu WHERE s_id=1");
            while($todays = mysqli_fetch_array($today)){
           ?>
            <div class="media menu-item col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <div> <img class="mr-3" src="images/<?php echo $todays['image']; ?>" class="img-fluid" alt="<?php echo $todays['name']; ?>">
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $todays['name']; ?></h5>
                        <p><?php echo $todays['detail']; ?></p>
                        <h6 class="text-primary menu-price"><?php echo $todays['price']; ?></h6>
                      </div>
                    </div>
                     <div> <a href="Include/remove_special.php?id=<?php echo $todays['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000;">Remove Todays Special</a></div>
                    </div>
          <?php } ?>
          </div>
        </div>
        <div class="clearfix"></div>

        <div id="shop">
          <div style="height: 80px; width: 100%;"></div>
          <center><h3>Halal Shop</h3></center>
          <div class="row" style="width: 85%; margin-right: auto; margin-left: auto;">
          <?php 
          $halal_shop = mysqli_query($conn, "SELECT * FROM halal_shop");
            while($halal_shop_item = mysqli_fetch_array($halal_shop)){
           ?>
            <div class="media menu-item col-md-6 col-lg-6 col-sm-12 col-xs-12">
                     <div> 
                      <div class="media-body">
                        <h5 class="mt-0"><?php echo $halal_shop_item['food_name']; ?></h5>
                        <p><?php echo $halal_shop_item['food_detail']; ?></p>
                        <h6 class="text-primary menu-price"><?php echo $halal_shop_item['price']; ?></h6>
                      </div>
                    </div>
                     <div> <a href="Include/h_delete.php?id=<?php echo $halal_shop_item['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000; margin-top: 5px; width: 100%;">Delete</a><br>
                    <a href="Include/h_edit.php?id=<?php echo $halal_shop_item['id'] ?>" class="btn btn-lg btn-primary" style="background: none; border: 2px solid black; color: #000; margin-top: 5px; width: 100%;">Edit</a>

                     </div>
                    </div>
          <?php } ?>
          </div>
        </div>
        <div class="clearfix"></div>

         <div id="add">
          <div style="height: 80px; width: 100%;"></div>
        	<center><h3>Add Item</h3></center>
          <div class="row" style="width: 50%; margin-right: auto; margin-left: auto;">
          <center>
          	<form action="Include/insert.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
    	 <select class="form-control" id="exampleFormControlSelect1" name="type">
      	<option value="1">Nepali Cusine </option>
      	<option value="2">Indian Cusine </option>
      	<option value="3">Halal Food</option>
      	<option value="4">Beverage</option>
        <option value="5">Halal Shop</option>
      	
      </select>
	   </div>

  		<div class="form-group">
    	<input type="text" class="form-control" id=""  placeholder="Enter Food Name" name="name">
  		</div>
  		<div class="form-group">
    	<input type="text" class="form-control" id="" placeholder="Ente Price" name="price">
  		</div>

  		<div class="form-group">
    	<textarea name="detail" placeholder="Enter Food Detail" style="width: 300px; height: 120px;"></textarea>
  		</div>
  		<div class="form-group">
    	<input type="file" name="pic">
  		</div>
		
		<input type="submit" name="" value="Add" class="btn btn-lg btn-primary">
			</form>
          </center>
            
          </div>
        </div>
        <div style="width: 100%; height: 20px;"></div>

        <div id="reservation">
          <div style="height: 80px; width: 100%;"></div>
          <center><h3>Todays' Reservation</h3></center>
          <div class="row" style="width: 85%; margin-right: auto; margin-left: auto;">
            <table>
              <tr><td>S. No</td><td>Customers' Name</td><td>Table No.: </td><td>No. of Person</td><td>Arrival Time</td><td>Departure Time</td></tr>
          <?php 
          $date = date("Y-m-d");
          $i=1;
          $reservation = mysqli_query($conn, "SELECT * FROM reservation WHERE a_date='$date'");
            while($todays_rev = mysqli_fetch_array($reservation)){
           ?>
            <tr><td><?php echo $i; ?></td><td><?php echo $todays_rev['customer_name']; ?></td><td><?php echo $todays_rev['table_no']; ?></td><td><?php echo $todays_rev['no_of_customer']; ?></td><td><?php echo $todays_rev['a_time']; ?></td><td><?php echo $todays_rev['d_time']; ?></td></tr>
          <?php 
          $i++;
        } ?>
        </table>
          </div>
          
        </div>
      <div style="height: 30px; width: 100%;"></div>
	 
	</div>
	<?php include 'Include/footer.php'; 
			include 'Include/script.php';
	?>
</body>
</html>
