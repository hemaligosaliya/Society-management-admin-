<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['smsaid']==0)) {
  header('location:logout.php');
  } else{}
    

?>
<?php
   $con=mysqli_connect("localhost","root","","smsdb");
?>
<html lang="en">

<head>
<title>Society Mentainence System || Event</title>
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">

</head>
<body class="theme-blue">
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../assets/images/thumbnail.png" width="48" height="48" alt="Mplify"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

   <?php include_once('includes/header.php');?>

  <?php include_once('includes/sidebar.php');?>

 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Event</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Event</li>
                        
                        </ul>
                    </div>
                   </hr>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="uploadfile" id="uploadfile">
                    <input type="submit" name="submit" value="Upload">
                </form>


                    </div>  
                    </div>
<?php
    if(isset($_POST['submit']))
    {
        $target_dir = "../../events/";
        $target_file = $target_dir.($_FILES["uploadfile"]["name"]);
        $file=$_FILES["uploadfile"]["name"];
        if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file))
        {
            $sql="INSERT INTO tblevent(name) VALUES ('$file')";
            mysqli_query($con,$sql);
        }
        else
        {
                echo "Sorry, there was an error uploading your file.";
        }
        unset($_POST['submit']);
    }
    $sql="select name from tblevent";
    $res=(mysqli_query($con,$sql));
    while($row=mysqli_fetch_array($res))
    {
?>
<img style="margin:5px;" height="250px" width="300px" src="<?php echo "../../events/".$row['name'];?>">
<?php
    }
?>
                </div>
            </div>
        </div>
</div>
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="../assets/vendor/parsleyjs/js/parsley.min.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/bundles/morrisscripts.bundle.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>
</html>