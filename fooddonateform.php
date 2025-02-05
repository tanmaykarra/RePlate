<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  

 



    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body style="    background-color: #06C167;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo"><b style="color: #06C167; ">RePlate</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity: (kg)</label>
        <input type="text" id="quantity" name="quantity" required/>
        </div>
       <b><p style="text-align: center;">Contact Details</p></b>
        <div class="input">
          <!-- <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
          </div> -->
      <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name"value="<?php echo"". $_SESSION['name'] ;?>" required/>
      </div>
      <div>
        <label for="phoneno" >PhoneNo:</label>
      <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}" required />
        
      </div>
      </div>
        <div class="input">
        <label for="location"></label>
        <label for="district">City:</label>
<select id="district" name="district" style="padding:10px;">
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
<br>

<label for="address" style="padding-left: 10px;">Address:</label>
        <input type="text" id="address" name="address" required/><br>
        
      
       
       
        </div>
        <div class="btn">
            <button type="submit" name="submit"> submit</button>
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>