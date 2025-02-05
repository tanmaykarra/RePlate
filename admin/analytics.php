
<?php
ob_start(); 
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


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
                <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
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

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">Analytics</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <span class="text">Total users</span>
                        <?php
                           $query="SELECT count(*) as count FROM  login";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">50,120</span> -->
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Feedbacks</span>
                        <?php
                           $query="SELECT count(*) as count FROM  user_feedback";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">20,120</span> -->
                    </div>
                    <div class="box box3">
                        <i class="uil uil-heart"></i>
                        <span class="text">Total doantes</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">10,120</span> -->
                    </div>
                </div>
                <br>
                <br>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<br>
<canvas id="donateChart" style="width:100%;max-width:600px"></canvas>

<script>
      <?php
            $query="SELECT count(*) as count FROM  login where gender=\"male\"";
            $q2="SELECT count(*) as count FROM  login where gender=\"female\"";
            $result=mysqli_query($connection, $query);
            $res2=mysqli_query($connection, $q2);
            $row=mysqli_fetch_assoc($result);
            $ro2=mysqli_fetch_assoc($res2);
            $female=$ro2['count'];
            $male=$row['count'];
            
$q1="SELECT count(*) as count FROM food_donations where location=\"agra\"";
$res1=mysqli_query($connection, $q1);
$ro1=mysqli_fetch_assoc($res1);
$agra=$ro1['count'];

$q2="SELECT count(*) as count FROM food_donations where location=\"ahmedabad\"";
$res2=mysqli_query($connection, $q2);
$ro2=mysqli_fetch_assoc($res2);
$ahmedabad=$ro2['count'];

$q3="SELECT count(*) as count FROM food_donations where location=\"allahabad\"";
$res3=mysqli_query($connection, $q3);
$ro3=mysqli_fetch_assoc($res3);
$allahabad=$ro3['count'];

$q4="SELECT count(*) as count FROM food_donations where location=\"amritsar\"";
$res4=mysqli_query($connection, $q4);
$ro4=mysqli_fetch_assoc($res4);
$amritsar=$ro4['count'];

$q5="SELECT count(*) as count FROM food_donations where location=\"aurangabad\"";
$res5=mysqli_query($connection, $q5);
$ro5=mysqli_fetch_assoc($res5);
$aurangabad=$ro5['count'];

$q6="SELECT count(*) as count FROM food_donations where location=\"bengaluru\"";
$res6=mysqli_query($connection, $q6);
$ro6=mysqli_fetch_assoc($res6);
$bengaluru=$ro6['count'];

$q7="SELECT count(*) as count FROM food_donations where location=\"bhopal\"";
$res7=mysqli_query($connection, $q7);
$ro7=mysqli_fetch_assoc($res7);
$bhopal=$ro7['count'];

$q8="SELECT count(*) as count FROM food_donations where location=\"bhubaneswar\"";
$res8=mysqli_query($connection, $q8);
$ro8=mysqli_fetch_assoc($res8);
$bhubaneswar=$ro8['count'];

$q9="SELECT count(*) as count FROM food_donations where location=\"chandigarh\"";
$res9=mysqli_query($connection, $q9);
$ro9=mysqli_fetch_assoc($res9);
$chandigarh=$ro9['count'];

$q10="SELECT count(*) as count FROM food_donations where location=\"chennai\"";
$res10=mysqli_query($connection, $q10);
$ro10=mysqli_fetch_assoc($res10);
$chennai=$ro10['count'];

$q11="SELECT count(*) as count FROM food_donations where location=\"coimbatore\"";
$res11=mysqli_query($connection, $q11);
$ro11=mysqli_fetch_assoc($res11);
$coimbatore=$ro11['count'];

$q12="SELECT count(*) as count FROM food_donations where location=\"delhi\"";
$res12=mysqli_query($connection, $q12);
$ro12=mysqli_fetch_assoc($res12);
$delhi=$ro12['count'];

$q13="SELECT count(*) as count FROM food_donations where location=\"hyderabad\"";
$res13=mysqli_query($connection, $q13);
$ro13=mysqli_fetch_assoc($res13);
$hyderabad=$ro13['count'];

$q14="SELECT count(*) as count FROM food_donations where location=\"jaipur\"";
$res14=mysqli_query($connection, $q14);
$ro14=mysqli_fetch_assoc($res14);
$jaipur=$ro14['count'];

$q15="SELECT count(*) as count FROM food_donations where location=\"kolkata\"";
$res15=mysqli_query($connection, $q15);
$ro15=mysqli_fetch_assoc($res15);
$kolkata=$ro15['count'];

$q16="SELECT count(*) as count FROM food_donations where location=\"lucknow\"";
$res16=mysqli_query($connection, $q16);
$ro16=mysqli_fetch_assoc($res16);
$lucknow=$ro16['count'];

$q17="SELECT count(*) as count FROM food_donations where location=\"madurai\"";
$res17=mysqli_query($connection, $q17);
$ro17=mysqli_fetch_assoc($res17);
$madurai=$ro17['count'];

$q18="SELECT count(*) as count FROM food_donations where location=\"mumbai\"";
$res18=mysqli_query($connection, $q18);
$ro18=mysqli_fetch_assoc($res18);
$mumbai=$ro18['count'];

$q19="SELECT count(*) as count FROM food_donations where location=\"nagpur\"";
$res19=mysqli_query($connection, $q19);
$ro19=mysqli_fetch_assoc($res19);
$nagpur=$ro19['count'];

$q20="SELECT count(*) as count FROM food_donations where location=\"patna\"";
$res20=mysqli_query($connection, $q20);
$ro20=mysqli_fetch_assoc($res20);
$patna=$ro20['count'];

$q21="SELECT count(*) as count FROM food_donations where location=\"pune\"";
$res21=mysqli_query($connection, $q21);
$ro21=mysqli_fetch_assoc($res21);
$pune=$ro21['count'];

$q22="SELECT count(*) as count FROM food_donations where location=\"raipur\"";
$res22=mysqli_query($connection, $q22);
$ro22=mysqli_fetch_assoc($res22);
$raipur=$ro22['count'];

$q23="SELECT count(*) as count FROM food_donations where location=\"ranchi\"";
$res23=mysqli_query($connection, $q23);
$ro23=mysqli_fetch_assoc($res23);
$ranchi=$ro23['count'];

$q24="SELECT count(*) as count FROM food_donations where location=\"salem\"";
$res24=mysqli_query($connection, $q24);
$ro24=mysqli_fetch_assoc($res24);
$salem=$ro24['count'];

$q25="SELECT count(*) as count FROM food_donations where location=\"shimla\"";
$res25=mysqli_query($connection, $q25);
$ro25=mysqli_fetch_assoc($res25);
$shimla=$ro25['count'];

$q26="SELECT count(*) as count FROM food_donations where location=\"surat\"";
$res26=mysqli_query($connection, $q26);
$ro26=mysqli_fetch_assoc($res26);
$surat=$ro26['count'];

$q27="SELECT count(*) as count FROM food_donations where location=\"thane\"";
$res27=mysqli_query($connection, $q27);
$ro27=mysqli_fetch_assoc($res27);
$thane=$ro27['count'];

$q28="SELECT count(*) as count FROM food_donations where location=\"thanjavur\"";
$res28=mysqli_query($connection, $q28);
$ro28=mysqli_fetch_assoc($res28);
$thanjavur=$ro28['count'];

$q29="SELECT count(*) as count FROM food_donations where location=\"tiruchirappalli\"";
$res29=mysqli_query($connection, $q29);
$ro29=mysqli_fetch_assoc($res29);
$tiruchirappalli=$ro29['count'];

$q30="SELECT count(*) as count FROM food_donations where location=\"tirunelveli\"";
$res30=mysqli_query($connection, $q30);
$ro30=mysqli_fetch_assoc($res30);
$tirunelveli=$ro30['count'];

$q31="SELECT count(*) as count FROM food_donations where location=\"varanasi\"";
$res31=mysqli_query($connection, $q31);
$ro31=mysqli_fetch_assoc($res31);
$varanasi=$ro31['count'];

$q32="SELECT count(*) as count FROM food_donations where location=\"vijayawada\"";
$res32=mysqli_query($connection, $q32);
$ro32=mysqli_fetch_assoc($res32);
$vijayawada=$ro32['count'];

    ?>
var xValues = ["Male", "Female"];
var xplace = [
  "Agra", "Ahmedabad", "Allahabad", "Amritsar", "Aurangabad", "Bengaluru", "Bhopal",
  "Bhubaneswar", "Chandigarh", "Chennai", "Coimbatore", "Delhi", "Hyderabad", "Jaipur",
  "Kolkata", "Lucknow", "Madurai", "Mumbai", "Nagpur", "Patna", "Pune", "Raipur",
  "Ranchi", "Salem", "Shimla", "Surat", "Thane", "Thanjavur", "Tiruchirappalli",
  "Tirunelveli", "Varanasi", "Vijayawada"
];

// Fetch donation counts for all cities dynamically from PHP
var yplace = [
  <?php 
    echo json_encode($agra, JSON_HEX_TAG) . ",";
    echo json_encode($ahmedabad, JSON_HEX_TAG) . ",";
    echo json_encode($allahabad, JSON_HEX_TAG) . ",";
    echo json_encode($amritsar, JSON_HEX_TAG) . ",";
    echo json_encode($aurangabad, JSON_HEX_TAG) . ",";
    echo json_encode($bengaluru, JSON_HEX_TAG) . ",";
    echo json_encode($bhopal, JSON_HEX_TAG) . ",";
    echo json_encode($bhubaneswar, JSON_HEX_TAG) . ",";
    echo json_encode($chandigarh, JSON_HEX_TAG) . ",";
    echo json_encode($chennai, JSON_HEX_TAG) . ",";
    echo json_encode($coimbatore, JSON_HEX_TAG) . ",";
    echo json_encode($delhi, JSON_HEX_TAG) . ",";
    echo json_encode($hyderabad, JSON_HEX_TAG) . ",";
    echo json_encode($jaipur, JSON_HEX_TAG) . ",";
    echo json_encode($kolkata, JSON_HEX_TAG) . ",";
    echo json_encode($lucknow, JSON_HEX_TAG) . ",";
    echo json_encode($madurai, JSON_HEX_TAG) . ",";
    echo json_encode($mumbai, JSON_HEX_TAG) . ",";
    echo json_encode($nagpur, JSON_HEX_TAG) . ",";
    echo json_encode($patna, JSON_HEX_TAG) . ",";
    echo json_encode($pune, JSON_HEX_TAG) . ",";
    echo json_encode($raipur, JSON_HEX_TAG) . ",";
    echo json_encode($ranchi, JSON_HEX_TAG) . ",";
    echo json_encode($salem, JSON_HEX_TAG) . ",";
    echo json_encode($shimla, JSON_HEX_TAG) . ",";
    echo json_encode($surat, JSON_HEX_TAG) . ",";
    echo json_encode($thane, JSON_HEX_TAG) . ",";
    echo json_encode($thanjavur, JSON_HEX_TAG) . ",";
    echo json_encode($tiruchirappalli, JSON_HEX_TAG) . ",";
    echo json_encode($tirunelveli, JSON_HEX_TAG) . ",";
    echo json_encode($varanasi, JSON_HEX_TAG) . ",";
    echo json_encode($vijayawada, JSON_HEX_TAG);
  ?>
];

var yValues = [
  <?php echo json_encode($male, JSON_HEX_TAG); ?>,
  <?php echo json_encode($female, JSON_HEX_TAG); ?>
];

var barColors = ["#06C167", "blue"];
var barColorsCities = [
  "#06C167", "blue", "red", "orange", "purple", "yellow", "green", "pink", 
  "cyan", "brown", "magenta", "violet", "teal", "lime", "gray", "gold",
  "#FF5733", "#C70039", "#900C3F", "#581845", "#1ABC9C", "#3498DB", "#9B59B6",
  "#E74C3C", "#2ECC71", "#F1C40F", "#E67E22", "#34495E", "#27AE60", "#D35400"
];

// First chart - Gender Distribution
new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "User Details"
    }
  }
});

// Second chart - Donations by City
new Chart("donateChart", {
  type: "bar",
  data: {
    labels: xplace,
    datasets: [{
      backgroundColor: barColorsCities,
      data: yplace
    }]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "Food Donations by City"
    },
    scales: {
      xAxes: [{
        ticks: {
          autoSkip: false,
          maxRotation: 90,
          minRotation: 45
        }
      }]
    }
  }
});

</script>

            </div>
        </div>
    </section>
    <script src="admin.js"></script>
</body>
</html>