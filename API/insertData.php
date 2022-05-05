<?php

require_once './dbconfig.php';

    if(isset($_POST['addUser']))
    {
        $uID = trim($_POST['uid']);
        $fName = trim($_POST['fname']);
        $lName = trim($_POST['lname']);

        $sqluc = "SELECT id FROM users WHERE uid = $uID";
        $result = $con->query($sqluc);

        if ($result->num_rows > 0) {
            echo "userErr";
        }
        else{
            $sql = "INSERT INTO users (id, uid, firstname, lastname) VALUES ('0', $uID, '$fName', '$lName')";
            if ($con->query($sql) === TRUE) {
                echo "done";
            } 
            else{
                echo "err";
            }
        }
    };




    if(isset($_POST['addImages']))
    {
        $userID = $_POST['userID'];
        $imgdata = $_POST['imageData'];
        $imgdata = str_replace(' ','+',$imgdata);

        $sqluc = "SELECT id FROM users WHERE uid = $userID";
        $result = $con->query($sqluc);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row["id"];
            $sql = "INSERT INTO face_data (id, u_id, image_data) VALUES ('0', $id, '$imgdata')";
            if ($con->query($sql) === TRUE) {
                echo "done";
            } 
            else{
            echo "err";
            }
        }
        else{
            echo "userErr";
        }
    };

    $con -> close()

?>