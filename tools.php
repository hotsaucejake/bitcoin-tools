<?php require_once('includes/config.php');?>
<?php require_once('includes/classes/bitcoin_tools.class.php');?>
<?php if( isset($_REQUEST['tool']) ):?>
<?php require_once('includes/header.php');?>



<div class="jumbotron btc-jumbotron">
   <div class="overlay">
      <div class="container">

         <div class="col-md-7 content animated bounceIn">
            <a href="<?php echo $website['url'];?>">
               <img src="assets/img/logo.png" class="logo" alt="<?php echo $website['name'];?>" title="<?php echo $website['name'];?>" width="75px" height="75px" />
            </a>



            <?php if($_REQUEST['tool'] == 'valid_address'):?>

               <h2>Valid Address Checker</h2>
               <?php if( isset($_REQUEST['address']) ):?>
                  <?php if( empty($_REQUEST['address']) ):?>
                     <div class="error">Please provide a bitcoin address. <a href="valid-address">Try Again?</a></div>
                  <?php else:?>
                     <?php $address = strip_tags($_REQUEST['address']);?>
                     <?php $valid   = bitcoin_tools::valid_address($_REQUEST['address']);?>
                     <?php if($valid == true):?>
                        <div class="success"><?php echo $address;?> is a valid bitcoin address. <br/><a href="valid-address">Check another?</a></div>
                     <?php else:?>
                        <div class="error"><?php echo $address;?> is a invalid bitcoin address. <br/><a href="valid-address">Check another?</a></div>
                     <?php endif;?>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="address" class="form-control input-lg" type="text" placeholder="Bitcoin address">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Check</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php elseif($_REQUEST['tool'] == 'address_balance'):?>

               <h2>Balance Checker</h2>
               <?php if( isset($_REQUEST['address']) ):?>
                  <?php if( empty($_REQUEST['address']) ):?>
                     <div class="error">Please provide a bitcoin address. <a href="address-balance">Try Again?</a></div>
                  <?php else:?>
                     <?php $address = strip_tags($_REQUEST['address']);?>
                     <?php $balance = bitcoin_tools::address_balance($_REQUEST['address']);?>
                     <div class="success">balance for <?php echo $address;?> is <?php echo $balance;?> BTC.<br/><a href="address-balance">Check another?</a></div>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="address" class="form-control input-lg" type="text" placeholder="Bitcoin address">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Check</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php elseif($_REQUEST['tool'] == 'address_received'):?>

               <h2>Total Received</h2>
               <?php if( isset($_REQUEST['address']) ):?>
                  <?php if( empty($_REQUEST['address']) ):?>
                     <div class="error">Please provide a bitcoin address. <a href="address-received">Try Again?</a></div>
                  <?php else:?>
                     <?php $address = strip_tags($_REQUEST['address']);?>
                     <?php $received   = bitcoin_tools::address_received($_REQUEST['address']);?>
                     <div class="success"><?php echo $address;?> has received <?php echo $received;?> .<br/><a href="address-received">Check another?</a></div>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="address" class="form-control input-lg" type="text" placeholder="Bitcoin address">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Check</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php elseif($_REQUEST['tool'] == 'address_sent'):?>

               <h2>Total Sent</h2>
               <?php if( isset($_REQUEST['address']) ):?>
                  <?php if( empty($_REQUEST['address']) ):?>
                     <div class="error">Please provide a bitcoin address. <a href="address-sent">Try Again?</a></div>
                  <?php else:?>
                     <?php $address = strip_tags($_REQUEST['address']);?>
                     <?php $sent   = bitcoin_tools::address_sent($_REQUEST['address']);?>
                     <div class="success"><?php echo $address;?> has sent <?php echo $sent;?> .<br/><a href="address-sent">Check another?</a></div>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="address" class="form-control input-lg" type="text" placeholder="Bitcoin address">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Check</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php elseif($_REQUEST['tool'] == 'address_to_hash'):?>

               <h2>Address to hash</h2>
               <?php if( isset($_REQUEST['address']) ):?>
                  <?php if( empty($_REQUEST['address']) ):?>
                     <div class="error">Please provide a bitcoin address. <a href="address-to-hash">Try Again?</a></div>
                  <?php else:?>
                     <?php $address = strip_tags($_REQUEST['address']);?>
                     <?php $hash160 = bitcoin_tools::address_to_hash($_REQUEST['address']);?>
                     <?php if($hash160 !== false):?>
                        <div class="success">the hash 160 for <?php echo $address;?> is <?php echo $hash160;?><br/><a href="address-to-hash">Generate another?</a></div>
                     <?php else:?>
                        <div class="error"><?php echo $address;?> is a invalid bitcoin address.<br/><a href="address-to-hash">Try Again?</a></div>
                     <?php endif;?>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="address" class="form-control input-lg" type="text" placeholder="Bitcoin address">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Generate</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php elseif($_REQUEST['tool'] == 'hash_to_address'):?>

               <h2>Hash to address</h2>
               <?php if( isset($_REQUEST['hash']) ):?>
                  <?php if( empty($_REQUEST['hash']) ):?>
                     <div class="error">Please provide a hash 160. <a href="hash-to-address">Try Again?</a></div>
                  <?php else:?>
                     <?php $hash    = strip_tags($_REQUEST['hash']);?>
                     <?php $address = bitcoin_tools::hash_to_address($_REQUEST['hash']);?>
                     <?php if($address !== false):?>
                     <div class="success">the address for <?php echo $hash;?> is <?php echo $address;?> <br/><a href="hash-to-address">Check another?</a></div>
                     <?php else:?>
                     <div class="error"><?php echo $hash;?> is a invaild hash 160 <br/><a href="address-to-hash">Try Again?</a></div>
                     <?php endif;?>
                  <?php endif;?>
               <?php else:?>
                  <form method="get">
                     <div class="input-group ">
                        <input name="hash" class="form-control input-lg" type="text" placeholder="Hash 160">
                        <div class="input-group-btn">
                           <button class="btn btn-default btn-lg" type="submit">Check</button>
                        </div>
                     </div>
                  </form>
               <?php endif;?>

            <?php endif;?>



         </div>

      </div>
   </div>
</div>



<div class="container">
   <h3>Try all of our tools</h3>
   <hr/>

   <div class="row">

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Valid Address Checker</h4>
            <p>Check to see if a bitcoin address is valid and real.</p>
            <a href="valid-address" class="btn btn-lg btn-warning btn-block">Check an address</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Balance Checker</h4>
            <p>Check to see how much bitcoin is in a valid address.</p>
            <a href="address-balance" class="btn btn-lg btn-warning btn-block">Check balance</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Total Received</h4>
            <p>Check the total amount of bitcoin that an address has received.</p>
            <a href="address-received" class="btn btn-lg btn-warning btn-block">Check received</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Total Sent</h4>
            <p>Check the total amount of bitcoin that an address has sent.</p>
            <a href="address-sent" class="btn btn-lg btn-warning btn-block">Check sent</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Address to hash</h4>
            <p>Convert a valid bitcoin address into a hash 160.</p>
            <a href="address-to-hash" class="btn btn-lg btn-warning btn-block">Create hash</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Hash to address</h4>
            <p>Convert a hash 160 into a valid bitcoin address.</p>
            <a href="hash-to-address" class="btn btn-lg btn-warning btn-block">Convert hash</a>
         </div>
      </div>

   </div>

</div>



<?php require_once('includes/footer.php');?>
<?php endif;?>