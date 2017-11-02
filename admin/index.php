<?php
	session_start();

	require_once("../config/config.php");

  if(!isset($_SESSION['email']) || $_SESSION['email'] != "zephair.merchant@gmail.com" ){
    header("Location: /login");
    die();
  }

	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('SELECT user_id, first_name, last_name, email, status from users');
		$stmt->execute();

	}
	catch(PDOException $e){
		echo "Database error";
	}

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zephair - Admin</title>


	  <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon"/>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


	<!--Creative css -->
	<link href="../css/creative.min.css" rel="stylesheet">
  </head>

  <body>
	<?php
		include('../components/nav.php');
	?>
	<style>
		<?php
			include('../components/nav-dark.css');
		?>
    th{
      padding-right: 10px;
      padding-left: 10px;
      text-align:center;
    }
    td{
      padding: 5px;
    }
    tr:nth-child(odd){
      background-color: #eee;
    }
	</style>

	<!-- Custom styles for this template -->
  <div style="padding-top: 100px; padding-left: 10px;">
    <table>
      <tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Verified</th><th>Action</th></tr>
    <?php
      foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $user){
    ?>
        <tr>
          <td><?php echo $user['user_id']; ?></td>
          <td><?php echo $user['first_name']; ?></td>
          <td><?php echo $user['last_name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td style="text-align:center"><input class="verify" type="checkbox" <?php if($user['status'] == 1){ echo "checked"; } ?> <?php echo "data-verify='". $user['user_id']. "'" ?> /></td>
          <td><?php if($user['email'] != 'zephair.merchant@gmail.com'){ echo "<button class='delete' data-delete='". $user['user_id']. "'>Delete</button>"; } ?></td>
        </tr>
    <?php
      }
    ?>
    </table>
  </div>

    <!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/3.3.6/scrollreveal.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

	 <!-- Custom scripts for this template -->
  <script src="../js/creative.min.js"></script>

  <script>
    $(document).on('click', '.delete', function(){
      window.location.href = "/admin/deleteuser.php?uid=" + $(this).attr('data-delete');
    });
    $(document).on('change', '.verify', function(){
      window.location.href = "/admin/editverify.php?uid=" + $(this).attr('data-verify') + "&verify=" + $(this).is(":checked");
    });
  </script>

  </body>
</html>
