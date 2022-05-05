<?php

require_once './dbconfig.php';

    if(isset($_GET['getData']))
    {
        $userID = $_GET['userID'];

        $sqlID = "SELECT id FROM users WHERE uid = $userID";
        $result = $con->query($sqlID);


        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $id = $row["id"];
          echo "ID : " .$id. "<br>";

          $sqlImg = "SELECT image_data FROM face_data WHERE u_id = $id";
          $result = mysqli_query($con, $sqlImg);
          echo "Number of records : " .mysqli_num_rows($result)."<br><br>";
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo '<textarea rows="20" cols="180">' .  $row["image_data"] . '</textarea><br><br>';
            }
          } else {
            echo "0 results";
          }


          }
          else{
            echo "0 results";
          }
    };
  $con -> close()
?>