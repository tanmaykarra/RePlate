
<?php
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
include "../connection.php";
include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    
<?php
 $connection=mysqli_connect("localhost:3306","root","");
 $db=mysqli_select_db($connection,'demo');
 


?>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="history.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">History</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <div class="logo">
        <img src="..\img\replate_logo.png" alt="RePlate Logo" style="height: 40px; vertical-align: middle; margin-right: 8px;">
        <b style="color: #06C167;">RePlate</b>
    </div>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <br>
        <br>
        <br>
    
  

            <div class="activity">
               
            <div class="location">
                <!-- <p class="logo">Filter by Location</p> -->
          <form method="post">
             <label for="location" class="logo">Select Location:</label>
             <!-- <br> -->
            <select id="location" name="location">
            <option value="agra">Agra</option>
<option value="ahmedabad">Ahmedabad</option>
<option value="allahabad">Allahabad</option>
<option value="amritsar">Amritsar</option>
<option value="aurangabad">Aurangabad</option>
<option value="bengaluru">Bengaluru</option>
<option value="bhopal">Bhopal</option>
<option value="bhubaneswar">Bhubaneswar</option>
<option value="chandigarh">Chandigarh</option>
<option value="chennai">Chennai</option>
<option value="coimbatore">Coimbatore</option>
<option value="cuttack">Cuttack</option>
<option value="dehradun">Dehradun</option>
<option value="delhi">Delhi</option>
<option value="dhanbad">Dhanbad</option>
<option value="durgapur">Durgapur</option>
<option value="faridabad">Faridabad</option>
<option value="ghaziabad">Ghaziabad</option>
<option value="goa">Goa</option>
<option value="gurgaon">Gurgaon</option>
<option value="guwahati">Guwahati</option>
<option value="gwalior">Gwalior</option>
<option value="hyderabad">Hyderabad</option>
<option value="indore">Indore</option>
<option value="jaipur">Jaipur</option>
<option value="jalandhar">Jalandhar</option>
<option value="jammu">Jammu</option>
<option value="jamshedpur">Jamshedpur</option>
<option value="jhansi">Jhansi</option>
<option value="jodhpur">Jodhpur</option>
<option value="kanpur">Kanpur</option>
<option value="kanniyakumari">Kanniyakumari</option>
<option value="kochi">Kochi</option>
<option value="kolhapur">Kolhapur</option>
<option value="kolkata">Kolkata</option>
<option value="kota">Kota</option>
<option value="lucknow">Lucknow</option>
<option value="ludhiana">Ludhiana</option>
<option value="madurai">Madurai</option>
<option value="mangalore">Mangalore</option>
<option value="meerut">Meerut</option>
<option value="mumbai">Mumbai</option>
<option value="mysore">Mysore</option>
<option value="nagpur">Nagpur</option>
<option value="nashik">Nashik</option>
<option value="patna">Patna</option>
<option value="pondicherry">Pondicherry</option>
<option value="pune">Pune</option>
<option value="raipur">Raipur</option>
<option value="rajkot">Rajkot</option>
<option value="ranchi">Ranchi</option>
<option value="salem">Salem</option>
<option value="shimla">Shimla</option>
<option value="srinagar">Srinagar</option>
<option value="surat">Surat</option>
<option value="thane">Thane</option>
<option value="thanjavur">Thanjavur</option>
<option value="tiruchirappalli">Tiruchirappalli</option>
<option value="tirunelveli">Tirunelveli</option>
<option value="tiruppur">Tiruppur</option>
<option value="udaipur">Udaipur</option>
<option value="varanasi">Varanasi</option>
<option value="vellore">Vellore</option>
<option value="vijayawada">Vijayawada</option>
<option value="visakhapatnam">Visakhapatnam</option>
<option value="warangal">Warangal</option>
        
            </select>
                <input type="submit" value="Get Details">
         </form>
         <br>

         <?php
    // Get the selected location from the form
    if(isset($_POST['location'])) {
      $location = $_POST['location'];
      
      // Query the database for people in the selected location
      $sql = "SELECT * FROM food_donations WHERE location='$location'";
      $result=mysqli_query($connection, $sql);
    //   $result = $conn->query($sql);
      
      // If there are results, display them in a table
      if ($result->num_rows > 0) {
        // echo "<h2>Food Donate in $location:</h2>";
        
        echo" <div class=\"table-container\">";
        echo "    <div class=\"table-wrapper\">";
        echo "  <table class=\"table\">";
        echo "<table><thead>";
        echo" <tr>
        <th >Name</th>
        <th>food</th>
        <th>Category</th>
        <th>phoneno</th>
        <th>date/time</th>
        <th>address</th>
        <th>Quantity</th>
        <th>State</th>
        
    </tr>
    </thead><tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"food\">".$row['food']."</td><td data-label=\"category\">".$row['category']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Address\">".$row['address']."</td><td data-label=\"quantity\">".$row['quantity']."</td><td data-label=\"State\">".$row['location']."</td></tr>";

        //   echo "<tr><td>" . $row["name"] . "</td><td>" . $row["phoneno"] . "</td><td>" . $row["location"] . "</td></tr>";
        }
        echo "</tbody></table></div>";
      } else {
        echo "<p>No results found.</p>";
      }
      
   
    }
  ?>
 </div>

 

            
            </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
