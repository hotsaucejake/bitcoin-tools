<?php require_once('includes/config.php');?>
<?php require_once('includes/classes/bitcoin_information.class.php');?>
<?php $information = bitcoin_information::cached_information($cache_time*60);?>
<?php require_once('includes/header.php');?>



<div class="jumbotron btc-jumbotron">
   <div class="overlay">
      <div class="container">

         <div class="col-md-6 content animated bounceIn">
            <a href="<?php echo $website['url'];?>">
               <img src="assets/img/logo.png" class="logo" alt="<?php echo $website['name'];?>" title="<?php echo $website['name'];?>" width="75px" height="75px" />
            </a>
            <h2>Bitcoin is currently worth $<?php echo $information['bitcoin_value'];?></h2>
         </div>

      </div>
   </div>
</div>



<div class="container">


   <h3><span class="orange-text">Bitcoin</span>Tools</h3>
   <hr/>

   <div class="row">

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Valid Address Checker</h4> <p>Check to see if a bitcoin address is valid and real.</p>
            <a href="valid-address" class="btn btn-lg btn-warning btn-block">Check an address</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Balance Checker</h4> <p>Check to see how much bitcoin is in a valid address.</p>
            <a href="address-balance" class="btn btn-lg btn-warning btn-block">Check balance</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Total Received</h4> <p>Check the total amount of bitcoin that an address has received.</p>
            <a href="address-received" class="btn btn-lg btn-warning btn-block">Check received</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Total Sent</h4> <p>Check the total amount of bitcoin that an address has sent.</p>
            <a href="address-sent" class="btn btn-lg btn-warning btn-block">Check sent</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Address to hash</h4> <p>Convert a valid bitcoin address into a hash 160.</p>
            <a href="address-to-hash" class="btn btn-lg btn-warning btn-block">Create hash</a>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-tools-inner">
            <h4>Hash to address</h4> <p>Convert a hash 160 into a valid bitcoin address.</p>
            <a href="hash-to-address" class="btn btn-lg btn-warning btn-block">Convert hash</a>
         </div>
      </div>

   </div>


   <h3><span class="orange-text">Bitcoin</span>Information</h3>
   <hr/>

   <div class="row">

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Bitcoin in circulation</h4>
            <p><?php echo number_format($information['total_bitcoin']);?></p>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Total bitcoin value</h4>
            <p>$<?php echo number_format($information['total_bitcoin_value']);?></p>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Total blocks mined</h4>
            <p><?php echo number_format($information['total_blocks']);?></p>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Reward per block</h4>
            <p><?php echo number_format($information['block_reward'], 1);?></p>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Mining Difficulty</h4>
            <p><?php echo number_format($information['mining_difficulty']);?></p>
         </div>
      </div>

      <div class="col-md-4 btc-box animated bounceIn">
         <div class="btc-box-inner">
            <h4>Hash Rate</h4>
            <p><?php echo number_format($information['hash_rate']);?> GH/s</p>
         </div>
      </div>

      <span class="foot-note">* All bitcoin information is cached for <?php echo $cache_time;?> minutes.</span>

   </div>


</div>



<?php require_once('includes/footer.php');?>
