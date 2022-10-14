<SCRIPT language=Javascript>
//Membuat validasi hanya untuk input angka menggunakan kode javascript
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}
</SCRIPT>

<?php
$sql = "select * from tblbarang where id ='$_GET[id]'";
$proses = mysql_query($sql);
$record = mysql_fetch_array($proses);
?>
<form id="form1" name="form1" method="post" action="home.php?go=Barang_Ubah">
  <table width="400" border="0" align="center">
    <tr>
      <td width="30%" align="left" valign="middle">Kode Barang</td>
      <td width="2%" align="left" valign="middle">:</td>
      <td width="68%" align="left" valign="top"><input name="kdbarangtxt" type="text" id="kdbarangtxt" value="<?php echo $record['kode_barang'] ?>" size="5" maxlength="50" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Nama Barang</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="nmbarangtxt" type="text" id="nmbarangtxt" size="35" maxlength="50" value="<?php echo $record['nama_barang'] ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Kelompok</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><label for="kelompoklst"></label>
        <select name="kelompoklst" id="kelompoklst">
        <option value="" selected="selected"><?php echo $record['kode_kelompok'] ?></option>        
       <?php
  		$sql2="select * from tblkelompok order by id asc";
  		$proses2=mysql_query($sql2);
  		while ($record2 = mysql_fetch_array($proses2))
 		{
  		?>
        <option value="<?php echo $record2['kode_kelompok'] ?>"><?php echo "$record2[kode_kelompok], $record2[nama_kelompok]"; }?></option>        
      </select></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Harga Beli</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="hrgbelitxt" type="text" id="hrgbelitxt" size="5" maxlength="15"  onkeypress="return isNumberKey(event)" value="<?php echo $record['harga_beli'] ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Harga Jual</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="hrgjualtxt" type="text" id="hrgjualtxt" size="5" maxlength="15"  onkeypress="return isNumberKey(event)" value="<?php echo $record['harga_jual'] ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Stock</td>
      <td align="left" valign="middle">:</td>
      <td align="left" valign="top"><input name="stocktxt" type="text" id="stocktxt" size="5" maxlength="5"  onkeypress="return isNumberKey(event)" value="<?php echo $record['stock'] ?>" /></td>
    </tr>
    <tr>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top"><label>
        <input type="submit" name="Submit" value="  Ubah  " />
        </label>
        </span></td>
    </tr>
  </table>
</form>
