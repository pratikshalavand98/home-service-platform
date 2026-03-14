
<div class="brand clearfix">
 <div class = "navbar navbar-default navbar-fixed-top" style="background-color:#0082e6;">	
<label class = "navbar-brand"  style="font-size: 26px;">  <font color="white"> Home Clean |</font> <font color="#ffce14">  Services</font>
    </label> 
    </label>
    <center>
 		
    <label class = "navbar-brand" style="font-size: 15px;">
    	<?php
	   $conn = new mysqli("localhost","root","","activity") or die(mysqli_error());
	   $fq = $conn->query("SELECT COUNT(*) as total FROM `home_tasks` WHERE `user_no` = '$_SESSION[user_no]'") or die(mysqli_error());
	   $ff = $fq->fetch_array();
       ?>
		
    <a href = "manage_house.php"><font color="white">Total: Home Work load</font> &nbsp; <span class = "badge"><?php echo $ff['total']?>
    </span></a>
    </label> 
    
</center>

		<span class="menu-btn"><i class="fa fa-bars"></i></span>
<ul class="ts-profile-nav">
		<li class="ts-account">
           <a href="#">
           	<center><span class = "glyphicon glyphicon-cog"></span></center>
           	<i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href = "setting.php">Change Password</a></li>
					<li><a href="#"><span></span></a></li>
				</ul>
				</a>
			</li>
		</ul>

		
	
	</div>
	</div>
