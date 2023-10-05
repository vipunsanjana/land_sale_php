


<?php
      //connecting to the DB
      require 'php/includes/dbcon.php';
      include_once('php/includes/complaintFunctions.php'); 

      //checking for data availability
      if(isset($_GET['id']))
      {
        {
          $cID = $_GET["id"];
          $type = $_GET["type"];

          //making sql query based on type
          if($type="sale")
          {
            $sql = "SELECT * FROM sale_complaints WHERE complaint_id=$cID";

          }
          elseif($type="request")
          {
            $sql = "SELECT * FROM request_complaints WHERE complaint_id=$cID";
          }
          else
        {
          echo "Error!!!!";
        }

          

          //getting sql results
          $result = $con->query($sql);

          //results in array
          $row= $result->fetch_assoc();
          


        }
      }//keeping session
      elseif(isset($_POST["action"]))
      {
          echo $_POST["action"];
          echo $_POST["user_id"];

          modAction($_POST['action'], $_POST['user_id']);
          reviewed($_POST['type']);
          die();
      }
      else{
        echo "Error loading Complaint!";
      }
?>

<!DOCTYPE html>
<html>

    <head>
        <?php 

          include_once('php/includes/common-css-js.php'); 
         ?>
        <script src="js/complaintFunctions.js"></script>
        <link rel="stylesheet" href="styles/complaint-review.css">

        
    </head>
  
<body>

<style>

  table
  { 
    border-style: groove;
    border: 5px solid black;
  }

  tr{
  border: 5px solid black;
  border-right: 5px solid black;
}
.reviewContainer{
  padding: 100px;
}

</style>
  <?php

  //linking header
    include("php/templates/header.php");

  ?>

    <!-- printing details-->
  <center>
      <div class="reviewContainer ">

        <div class="cInfo"> Complaint ID: <?php echo $row["complaint_id"]?></div>
        <div class="cInfo"> Reported By: <?php echo $row["user_id"]?></div>
        <div class="cInfo"> Date of Complaint: <?php echo $row["create_date"]?></div>
        <hr>

        <?php if($type="sale") 
        {
          echo "<div class=\"complaint\"> Post ID:" .$row['sale_id'] . "</div>";
        }
        else
        {
          echo "<div class=\"complaint\"> Post ID:". $row["request_id"] ."</div>";
        }
        ?>


        <div class="complaint2"> Complaint Type: <?php echo $row["complaint_type"]?></div>
        <div class="desc"> Description: <?php echo $row["description"]?></div>
        <hr>

      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="action" id=saction">SELECT AN ACTION</label>
          <select name="action" id="mAction" class="maction" title="Please Select an Action" required >
              <option value="warn" id="warn">Warn User</option>
              <option value="suspend" id="suspend">Suspend User</option>
              <option value="ban" id="ban">Ban User</option>
              <option value="noAction" id="none">Ignore</option>
          </select>


              <!-- review button-->
          <input type="hidden" name="user_id" value=<?php echo $row["user_id"]; ?>>
          <input type="submit" name="submit" id="reviewed" class="sbbtn" value="Mark as Reviewed" onclick="takeAction()">


          

      </form>
      </div>

      
  </center> 
  <?php
        include("php/templates/footer.php"); //linking footer
      ?>
</body>

</html>
