<?php
session_start();

include('includes/dbconnection.php');
if (strlen($_SESSION['smsaid']==0)) {
  header('location:logout.php');
  } else{}
?>
<?php
   $con=mysqli_connect("localhost","root","","smsdb");
?>

<style type="text/css">
 .gallery
 {
    margin: 5px;
    float: left;
    width: 390px;
    border: 3px solid #ccc;
 }   
 .gallery img{
    width: 100%;
    height: 200px;
    border-radius: 10px;
 }
 .desc{
    padding: 15px;
    text-align: center;
 }
</style>
<html lang="en">

<head>
<title>Society Mentainence System || show amenities</title>
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
                        <h2>Booked</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item">Booked</li>
                        
                        </ul>
                    </div>
                   <hr><br>
            </div>  
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Manage Booking Detail</h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>

                                        <tr>
                                            <th>S.No</th>
                                            <th>Functinality</th>
                                            <th>contact</th>
                                             <th>Email</th>
                                            <th>Flat no.</th>
                                            <th>Block</th>
                                            <th>Date</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="select * from showamenities as a,tblamenities as b where a.said=b.said ORDER BY date ASC";
                                    $res=(mysqli_query($con,$sql));
                                    while($row=mysqli_fetch_array($res))
                                     {
                                    ?>
                                    <tr>
                                         <td><?php echo $cnt;?></td>
                                         <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['contact'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['flatno'];?></td>
                                        <td><?php echo $row['block'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        </tr>
                                        <?php $cnt=$cnt+1;} ?>         
                                    </tbody>
        
       
    
    
     

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
