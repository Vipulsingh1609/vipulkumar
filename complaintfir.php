<?php include('includes/database.php');?>
<?php
$query = "SELECT 
			fir.fnumber,
			complaint.c_date,
			fir.station,
			fir.description,
			fir.offence_nature,
			complaint.complainer,
			complaint.status
			FROM fir,complaint
			WHERE fir.complaint=complaint.id";
//get results
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Crime Records Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-top.css" rel="stylesheet">
	<link href="css/forms.css" rel="stylesheet">
    <link href="css/tables.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">

  </head>

  <body>
 <p align="right"> <img src="images/horn.gif" width="5%"><img src="images/index.jpg" width="30%"></p>

 <nav class="navbar navbar-dark bg-primary">
  
  <div class="collapse navbar-collapse" id="navbarNav">
     <center>  <ul class="navbar-nav">
        <a class="nav-link" href="gateway.php" style="color:white;font-size:medium;">Home <span class="sr-only">(current)</span></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
    
        <a class="nav-link" href="station.php" style="color:white;font-size:medium;">Station</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
      
        <a class="nav-link" href="police.php" style="color:white;font-size:medium;">Police</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
    
        <a class="nav-link disabled" href="criminal.php" style="color:white;font-size:medium;">Criminal</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="nav-link disabled" href="complaint.php" style="color:white;font-size:medium;">Complaint</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="nav-link disabled" href="fir.php" style="color:white;font-size:medium;">FIR</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
       <a class="nav-link disabled" href="copstation.php" style="color:white;font-size:medium;">Search</a>

     </ul></center>
  </div>
</nav>
<img src="images/logo.jpg" width="20%" align="left">
<?php if(isset($_GET['msg']))
	  {
		  echo '<div class="msg">'.$_GET['msg'].'</div>';
	  }
	  ?>
	 <center> <form action="complaintfir-db.php" method="post" class="example">

				<input type="text" name="valueToSearch" id="name" placeholder="Search Record..">
				<button type="submit"><i class="fa fa-search"></i>Search</button>
			</form>
	  <h2>Search FIR Complaint Information</h2>
		<table id="customers">
			<tr>
				<th>FIR Number</th>
				<th>Complaint Date</th>
				<th>Station</th>
				<th>Description</th>
				<th>Offence Nature</th>
				<th>Complainer</th>
				<th>Status</th>
				
			</tr>
			
			<?php if($result->num_rows>0)
			{
				//loop through the results
				while($row=$result->fetch_assoc())
				{
					//display customers info
					$output ='<tr>';
					$output.='<td>'.$row['fnumber'].'</td>';
					$output.='<td>'.$row['c_date'].'</td>';
					$output.='<td>'.$row['station'].'</td>';
					$output.='<td>'.$row['description'].'</td>';
					$output.='<td>'.$row['offence_nature'].'</td>';
					$output.='<td>'.$row['complainer'].'</td>';
					$output.='<td>'.$row['status'].'</td>';
					$output.='</tr>'; //Echo Output
				
					echo $output;
				}
			}
				else
				{
					echo "Sorry, No FIR Complaint info were found";
				}
				?>
			
			
		</table>
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
