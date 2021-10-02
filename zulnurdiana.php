<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Penjualan Buku</h2>
    <hr>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table border="0">
        <tr>
            <td>Pilih Buku</td>
        </tr>
        <tr>
            <td>
                <select name="namaBK">
                    <option value="algoritma">Algoritma & Pemrograman</option>
                    <option value="php">Pemrograman PHP</option>
                    <option value="java">Pemrograman Java</option>
                    <option value="si">Sistem Informasi</option>
                    <option value="mtk">Aljabar Linear</option>
                </select>
            </td>
        </tr>
        <br>
        <tr>
            <td>Jumlah</td>
        </tr>
        <tr>
            <td><input type="text" name="jumlah" size="20"></td>
        </tr>
        <tr>
            <td> <input type="submit" value="HITUNG" name="submit"> <input type="reset" value="RESET"></td>
        </tr>
        </table>
    </form>

    <br><br><br>

     <?php
    
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['submit'])){
                $hari = $_POST['jumlah'];
                $codeBK = $_POST['namaBK'];

                if($codeBK == "algoritma"){
                    $nama = "Algoritma & Pemrograman";
                    $harga = 150000;
                }else if($codeBK == "php"){
                    $nama = "Pemrograman PHP";
                    $harga = 90000;
                }else if($codeBK == "java"){
                    $nama = "Pemrograman Java";
                    $harga = 175000;
                }
                else if($codeBK == "si"){
                    $nama = "Sistem Informasi";
                    $harga = 80000;
                } else {
                    $nama = "Aljabar Linear";
                    $harga = 50000;
                }

                function total($a,$b){
                    $hasil = floatval($a) * floatval($b);
                    return $hasil;
                }
            }
        }
    
    ?>
    <h2>Tampil Detail Pembayaran</h2>
    <hr>

    <form>
        <table border="1px" cellpadding="1px" cellspacing="0">
            <tr>
                <th colspan="2">Nota Penjualan</th>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td width="64%"><input type="text" name="hasil" value="<?php if(isset($nama)) echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td width="64%"><input type="text" name="hasil" value="<?php if(isset($harga)) echo 'Rp.'.$harga; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td width="64%"><input type="text" name="hasil" value="<?php if(isset($hari)) echo $hari; ?>"></td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td width="64%"><input type="text" name="hasil" value="<?php if(isset($hari,$harga)) echo 'Rp.'.total($hari,$harga); ?>"></td>
            </tr>
        </table>
    </form>

    
</body>
</html>
