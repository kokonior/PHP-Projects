?php
 
// koneksi ke database gammu
mysql_connect("dbhost", "dbuser", "dbpass");
mysql_select_db("dbname");
 
// mencari sms yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
  // baca ID dari SMS
  $id = $data['ID'];
  // membaca isi SMS dan mengubah menjadi huruf kapital
  $sms = strtoupper($data['TextDecoded']);
   
  // jika isi SMS adalah 'SHUTDOWN'
  if ($sms == "SHUTDOWN")
  {
     // jalankan perintah shutdown
     exec("shutdown -s -f");
  }
   
  // memberi tanda SMS bahwa sudah diproses
  $query2 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
  mysql_query($query2);  
}
 
?>
