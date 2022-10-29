$host = 'localhost';
$username = 'root';
$password = 'password';
 
//Attempt to connect to database
$con = mysqli_connect($host , $username, $password);
         
//Check connection validity
if (!$con) 
{
    die ("Could not connect to the database host: ". mysqli_connect_error());
}
         
//Set the character set of the connection
if(!mysqli_set_charset ( $con , 'UTF8' ))
{
    die('mysqli_set_charset() failed');
}