<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
  div{
    font-family: 'Roboto', sans-serif;
  }
  a{
    padding: 10px !important;
    padding-left: 15px !important;
    padding-right: 15px !important;
    background-color:#f05f40 !important;
    border: 1px solid lightgrey !important;
    border-radius: 5px !important;
    cursor: pointer !important;
    font-size: 18px !important;
    color: white !important;
    text-decoration: none !important;
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
      <a href='<?php echo "https://cs4753-project.herokuapp.com/register/verify.php?code=". $rand_num. "&email=". urlencode($email); ?>'>Verify Email</a>
    </div>

    <div style="font-size:12px; color: grey">
      This email was intended for <?php echo $first_name. " ". $last_name. " (". $email. ")"; ?>. If this is not you, please disregard.
    </div>

  </div>
</div>
