<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
  div{
    font-family: 'Roboto', sans-serif;
  }
</style>


<div style="text-align:center">
  <div style="margin-left: 10%; margin-right: 10%; background-color: #FFEBCD; border-radius:5px; padding-bottom: 10px">
    <img style="width: 250px; margin-top:10px" src="https://s3.amazonaws.com/cs4753-project/logo.png" >

    <div style="margin-top:20px; font-size:36px">
      Welcome to Zephair, <?php echo $first_name; ?>
    </div>

    <div>
      <p style="font-size:20px; margin-bottom:20px;"> Please verify the email associated with your Zephair account: <span style="color:#f05f40; text-decoration:none"><?php echo $email; ?></span> </p>
    </div>

    <div style="margin-top:50px; margin-bottom:50px;">
      <a style="padding: 10px;
          padding-left: 15px;
          padding-right: 15px;
          background-color:#f05f40;
          border: 1px solid lightgrey;
          border-radius: 5px;
          cursor: pointer;
          font-size: 18px;
          color: white;
          text-decoration: none;" href='<?php echo "https://cs4753-project.herokuapp.com/register/verify.php?code=". $rand_num. "&email=". urlencode($email); ?>'>Verify Email</a>
    </div>

    <div style="font-size:12px; color: grey">
      This email was intended for <?php echo $first_name. " ". $last_name. " (". $email. ")"; ?>. If this is not you, please disregard.
    </div>

  </div>
</div>
