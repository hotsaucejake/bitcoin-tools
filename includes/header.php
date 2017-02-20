<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="description" content="<?php echo htmlentities($website['description']);?>" />

      <?php if( isset($_REQUEST['tool']) ):?>
         <?php if($_REQUEST['tool'] == 'valid_address'):?>
            <title><?php echo $website['name'];?> - Valid Address Checker</title>
         <?php elseif($_REQUEST['tool'] == 'address_balance'):?>
            <title><?php echo $website['name'];?> - Balance Checker</title>
         <?php elseif($_REQUEST['tool'] == 'address_received'):?>
            <title><?php echo $website['name'];?> - Total Received</title>
         <?php elseif($_REQUEST['tool'] == 'address_sent'):?>
            <title><?php echo $website['name'];?> - Total Sent</title>
         <?php elseif($_REQUEST['tool'] == 'address_to_hash'):?>
            <title><?php echo $website['name'];?> - Address to hash</title>
         <?php elseif($_REQUEST['tool'] == 'hash_to_address'):?>
            <title><?php echo $website['name'];?> - Hash to address</title>
         <?php endif;?>
      <?php else:?>
         <title><?php echo $website['name'];?></title>
      <?php endif;?>

      <!-- website favicons -->
      <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

      <!-- website stylesheets -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

      <!-- website javascript -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" type="text/javascript"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="text/javascript"></script>
      <![endif]-->

   </head>
   <body>
