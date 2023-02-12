<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor Management System</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

<?php include('includes/header.php');?>
    <div class="container">

        <h1 class="my-4" align="center">Welcome to BloodBank & Donor Management System</h1>
        <div class="row mb-4">
            <div class="col-md-12">
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">Become a Donar</a>
            </div>
        </div>

		<center><h2>-----Donor List-----</h2></center>
		<div class="row">
                   <?php 
					$status=1;
					$sql = "SELECT * from tblblooddonars where status=:status order by rand() limit 6";
					$query = $dbh -> prepare($sql);
					$query->bindParam(':status',$status,PDO::PARAM_STR);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
						foreach($results as $result)
						{ ?>
							<div class="col-lg-3 col-sm-6 portfolio-item">
								<div class="card h-100">
									<div class="card-block">
										<center>
										<p class="card-text"><b>Donor Name : </b><?php echo htmlentities($result->FullName);?></a></p>
										<p class="card-text"><b>Gender :</b> <?php echo htmlentities($result->Gender);?></p>
										<p class="card-text"><b>Blood Group :</b> <?php echo htmlentities($result->BloodGroup);?></p>
										</center>
									</div>
								</div>
							</div>
						<?php 
						}
					}
					?>
		</div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
