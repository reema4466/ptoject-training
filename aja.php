



<html>
<head>

<style>
    body{
    
        /*background-color:grey;*/
        background-image: url("robo.png" ) ;
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    
    </style>




</head>

<body>


<?php
$servername = "localhost";
$username = "panel";
$password = "12345";
$dbname = "ControlPanel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

/*sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";*/

if(array_key_exists('r',$_POST)){
    echo " R ";
    $sql="
INSERT INTO `arrws`(`FORWARD`, `BACKWARD`, `STO`, `LEF`, `RIGH`) VALUES ('','','','','R')";
} else if(array_key_exists('l',$_POST)){
    echo " L ";
    $sql="
INSERT INTO `arrws`(`FORWARD`, `BACKWARD`, `STO`, `LEF`, `RIGH`) VALUES ('','','','L','')";
}else if(array_key_exists('s',$_POST)){
    echo " S ";
    $sql="
INSERT INTO `arrws`(`FORWARD`, `BACKWARD`, `STO`, `LEF`, `RIGH`) VALUES ('','','S','','')";
} else if(array_key_exists('f',$_POST)){
    echo " F ";
    $sql="
INSERT INTO `arrws`(`FORWARD`, `BACKWARD`, `STO`, `LEF`, `RIGH`) VALUES ('F','','','','')";
}
else if(array_key_exists('b',$_POST)){
    echo " B ";
    $sql="
INSERT INTO `arrws`(`FORWARD`, `BACKWARD`, `STO`, `LEF`, `RIGH`) VALUES ('','B','','','')";
}


if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


</body>





</html>
