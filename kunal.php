<?php
$todo = $_POST["todo"];
$del = $_GET["del"];
$edit = $_POST["edit"];
$data = $_POST["data"];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "data";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$time = date("Y-m-d",time());
// Check connection
if(isset($todo)){
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO tododata1 (todo) VALUES('{$todo}')";
if ($conn->query($sql) === TRUE) {

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
}
else if(isset($del)){
$sql = "delete from tododata1 where id=".$del;
if ($conn->query($sql) === TRUE) {

} 

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
header("Refresh:0; url=index.php");	
}
else if(isset($edit) || isset($data)){
$test = "";
foreach($edit as $x => $x_value) {
  $test = $x;
}
$sql = "update tododata1 set todo = '{$data}' where id='{$test}'";
if ($conn->query($sql) === TRUE) {

} 

else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();



}
?>
<html>
<head>
<title>To DO</title>
<script src="script.js"></script>
<style>
.container {
    position: fixed;
    left: 350px;
    padding: 0;
    margin: 0;
}

.left-element {
    display: inline-block;
    float: left;
}
.same{
  display:inline-block;
}

.right-element {
  width: 290px;
  height: 250px;
  border: 3px solid black;
  padding: 50px;
  margin: 20px;
  display: inline-block;
  float: left;
}
.kunal input {
  font    : .9em/1.5em "handwriting", sans-serif;
  border  : none;
  padding : 0 10px;
  margin  : 0;
  width   : 240px;
  background: none;
}
.hide {
  display: none;
}

.show {
  display: block;
}

</style>
</head>
<body>
<div class="container">
<div class="left-element">
<form action="/index.php" method="POST">
<p id="todo">Todo:-</p>
<input type="text" id="todo" name="todo" placeholder="Enter todo">
<input type="Submit" name="Submit" value="Submit">
</form>
</div>
<div class="right-element">
<div class="kunal">
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "data";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, todo FROM tododata1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo htmlspecialchars($out); secured
    //unsecured
    echo "<form action='/index.php' method='POST' id='my_form'><input class='same' name='data' value='{$row["todo"]}' oninput='this.size = this.value.length'><a class='same' href='/index.php?del={$row["id"]}'>❌</a><input type='hidden' class='same' name='edit[{$row["id"]}]'></form>";
    //echo $out;
    
  }
} else {
}
$conn->close();
?>
</div>
</div>
</div>
</body>

</html>


