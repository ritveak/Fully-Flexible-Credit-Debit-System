<html>
<head><title>Add New Student</title>
    <style>
        form{
            
            
            text-align: center;
            margin-top: 11%;
        }
        h2
        {
            padding : 15px;
        }
    
        p
        {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            
        }
        button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;
}
        
    
    </style>
    <p><font size="6">Add new student</font></p>
</head>
<body>
    
    <form action="" method= "POST">
    <h2 style="border: 12px solid #4CAF50; border-style:groove;border-radius: 0px 20px 0px 20px; padding:60px;margin:auto;width:40%;">Username : &nbsp;
        <input type= "text" placeholder="Username" id="username" name ="username">
        <br>
      Password &nbsp;:  &nbsp;
        <input type="text" placeholder="Password" id="password" name= "password">
        <br>
        Balance  &nbsp;&nbsp;&nbsp;:  &nbsp;
        <input type="number" name="bal" placeholder="balance">
        <br>
        <br>
           <input type="submit">
       
    </h2>
    </form>
    
</body>
    
    
    <?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="nis";
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 
// Create database
//$sql = "select * from details";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["username"]. " - Name: " . $row["password"]. " " . $row["balance"]. "<br>";
//    }
//} else {
//    echo "Error creating database: " . $conn->error;
//}
    
    define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'nis');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);  
      $mypassword = password_hash($mypassword, PASSWORD_DEFAULT);
      $bal = mysqli_real_escape_string($db,$_POST['bal']);

      
      $sql = "INSERT INTO `details`(`username`, `password`, `balance`) VALUES ('$myusername','$mypassword','$bal')";

       $result = mysqli_query($db,$sql);
//      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//      //$active = $row['active'];
//      
//      $count = mysqli_num_rows($result);
//      
//      // If result matched $myusername and $mypassword, table row must be 1 row
//		
//      if($count == 1) {
//         //session_register("myusername");
//         $_SESSION['login_user'] = $myusername;
//         
//         //header("location: loggedin.php");
//      }else {
//         $error = "Your Login Name or Password is invalid";
//      }
  header("location: loggedin.php");
   }

?>
</html>