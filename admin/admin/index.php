<?php
session_start();
include("../../db.php");

include "sidenav.php";
include "topheader.php";
include "activitity.php";

?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="panel-body">
      <a>
        <?php //success message
        if (isset($_POST['success'])) {
          $success = $_POST["success"];
          echo "<div class='col-md-12 col-xs-12' id='product_msg'>
          <div class='alert alert-success'>
            <a href='#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
            <b>Product is Added..!</b>
          </div>
        </div>";
        }
        ?>
      </a>
    </div>
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title"> Users List</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>ID</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "select * from user_info") or die("query 1 incorrect.....");

                while (list($user_id, $first_name, $last_name, $email, $password, $phone, $address1, $address2) = mysqli_fetch_array($result)) {
                  echo "<tr><td>$user_id</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>$password</td><td>$phone</td><td>$address1</td><td>$address2</td>

                        </tr>";
                }
                ?>
              </tbody>
            </table>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title"> Categories List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = mysqli_query($con, "select * from categories") or die("query 1 incorrect.....");
                  $i = 1;
                  while (list($cat_id, $cat_title) = mysqli_fetch_array($result)) {
                    $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($query);
                    $count = $row["count_items"];
                    $i++;
                    echo "<tr><td>$cat_id</td><td>$cat_title</td><td>$count</td>

                        </tr>";
                  }
                  ?>
                </tbody>
              </table>
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
              </div>
              <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Brands List</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive ps">
              <table class="table table-hover tablesorter " id="">
                <thead class=" text-primary">
                  <tr>
                    <th>ID</th>
                    <th>Brands</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = mysqli_query($con, "select * from brands") or die("query 1 incorrect.....");
                  $i = 1;
                  while (list($brand_id, $brand_title) = mysqli_fetch_array($result)) {

                    $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
                    $query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($query);
                    $count = $row["count_items"];
                    $i++;
                    echo "<tr><td>$brand_id</td><td>$brand_title</td><td>$count</td>

                        </tr>";
                  }
                  ?>
                </tbody>
              </table>
              <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
              </div>
              <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Subscribers</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter " id="">
              <thead class=" text-primary">
                <tr>
                  <th>ID</th>
                  <th>email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query($con, "select * from email_info") or die("query 1 incorrect.....");

                while (list($brand_id, $brand_title) = mysqli_fetch_array($result)) {
                  echo "<tr><td>$brand_id</td><td>$brand_title</td>

                        </tr>";
                }
                ?>
              </tbody>
            </table>



            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
              <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
              <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!---chart Categories---->
<!DOCTYPE HTML>
<html>
<head>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>

  <?php
  // Database connection details
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "onlineshop"; // Replace with your database name

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // SQL query to retrieve data from the 'categories' table
  $sql = "SELECT `cat_title` as label, `cat_id` as y FROM `categories`";
  $result = $conn->query($sql);

  $dataPoints = array();

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $dataPoints[] = $row;
      }
  } else {
      echo "0 results";
  }

  $conn->close();
  ?>

  <script>
    window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "dark1",
        title: {
          text: "Categories Chart"
        },
        axisY: {
          title: "Category Count"
        },
        axisX: {
          title: "Category"
        },
        data: [{
          type: "column",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });

      chart.render();
    }
  </script>
</body>
</html>

<?php
include "footer.php";
?>