 <?php
    require_once 'logincheck.php';
?>
 <?php
      $conn = new mysqli("localhost","root","","activity") or die(mysqli_error());
      $query = $conn->query("SELECT * FROM `users` WHERE `user_no` = '$_SESSION[user_no]'") or die(mysqli_error());
      $fetch = $query->fetch_array();
    ?>

 <?php
// mysql connection
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "activity";

$con = mysqli_connect($hostname, $username, $password, $dbname) or die("Error: " . mysqli_error($con));

// fetch records
$result = @mysqli_query($con, "SELECT * FROM home_tasks") or die("Error: " . mysqli_error($con));

// delete records
 if(isset($_POST['chk_id']))
{

    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($con,"DELETE FROM home_tasks WHERE home_id = " . $id);
    }
    
   echo "<script>alert('sucessfully deleted')</script>";
        echo "<script>window.location='manage_house.php';</script>";
}

?> 

 <?php 
date_default_timezone_set('Asia/Manila');

//action.php
if(isset($_POST["action"]))
{
	include('./includes/conn1.php');
	if($_POST["action"]=='fetch')
	{   
		
		$output ='';
		$query = "SELECT * FROM  home_tasks  where `user_no`= '$_SESSION[user_no]'";
        $statement = $connect->prepare($query);
		$statement->execute();	
		$result = $statement->fetchAll(); 
		$output .='
         <form id="formABC" method="post" action="action.php">
         <table class="table table-bordered table-striped">
         <tr>
            <td><center>Check ALL &nbsp; <input id="chk_all" name="chk_all" type="checkbox"/>
          
            </center></td>
            <td class="hidden"></td>
            <td class="hidden"></td>
            <td>Activity Tasks</td>
            <td>Date</td>
            <td>Time</td>
            <td>Status</td>
           <td><center>Action</center></td> 
         </tr>
        
		';

		foreach ($result as $row) 
       
		{
		  $status = '';
		  
		  if($row["status"] == '1')
		  {
             $status = '<span class="label label-success">done</span>';
            
		  }	
           if($row["status"] == '0')
		  {
               $status = '<span class="label label-danger">not yet started</span>';
		  }
		  $dtime = '';
		  if($row['dtime'] ==date('g:i:a'))
		  {
              $dtime =date('g:i:a');
		  }
		  $disabled='';
          if($row['status']==1) {
          	$disabled='disabled="disabled"';
          }
		  $output .='
             <tr>
                <td> <center><input name="chk_id[]" type="checkbox" class="chkbox" value="'.$row['home_id'].'"/></center></td>
                <td class="hidden">'.$fetch["user_no"].'</td> 
                <td class="hidden">'.$fetch["name"].'</td> 
                <td>'.$row['activity'].'</td>
                <td>'.$row["tdate"].'</td>
                <td>'.$row["dtime"].'</td> 
                
                <td>'.$status.'</td>
                <td>
                   <audio id="audioMusic">
                    <source src="./sounds/beep1.mp3" type="audio/mpeg">
                      </audio>
                    <center><button type="button" onclick="ting()" name="action" class="btn btn-info btn-xs action"  data-home_id="'.$row["activity"].'"   data-dtime="'.$dtime.'" data-user_no="'.$row["user_no"].'" data-status="'.$row["status"].'" value="" '.$disabled.' >  <span class="fa fa-check"></span> </button>
                     <br/> <br/> 
                      <button id="submit"   name="submit" type="submit" class="btn btn-xs btn-danger"> <span class="fa fa-trash">  Delete</span></button></center>
                </td>
            </tr>

           
		  ';
		}
		$output .= '</table>
             </form>';
		echo $output;
	}
	
	if ($_POST["action"] == 'change_status') {
		$status = '';
		
		if($_POST['status'] ==1) {
             $status = '0';
		} 
		if($_POST['status'] == 0) {
             $status = '1';
		}
		
		$dtime = '';
		if($_POST['dtime'] ='$dtime') {
             $dtime =date('g:i:a');
		}
		
		
		$query =  'UPDATE home_tasks  SET dtime=:dtime,  status=:status WHERE  activity=:activity';

		$statement = $connect->prepare($query);
		$statement->execute(

			array(
				':dtime'=> $dtime,
				':status'=> $status,
				':activity'=> $_POST['home_id']

			)
		); 
		
	}
}	

?>

<script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete_form').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});

  var audio = document.getElementById("audioMusic");
  function ting(){
    audio.play();
   
  }

</script>

