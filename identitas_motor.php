<?php
// menampilkan DB Identitas Motor
$ambilIdentitasMotor = $conn->query("SELECT * FROM identitas_motor ORDER BY ID DESC") or die(mysqli_error($conn));

?>


<h1 class="mt-4">Data Identitas Motor</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data identitas motor</li>
</ol>
<div id='addMenu' class="col-md-6">
    <a href="?p=identitas_motor&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data Identitas Motor</a>
</div>
<div id='tableMenu' class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Identitas Motor
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Registrasi</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th>No Rangka</th>
                        <th>No Mesin</th>
                        <th>Plat NO</th>
                        <th>Merk</th>
                        <th>Tipe</th>
                        <th>Model</th>
                        <th>Tahun Pembuatan</th>
                        <th>Isi Silinder</th>
                        <th>Bahan Bakar</th>
                        <th>Warna TNKB</th>
                        <th>Tahun Registrasi</th>
                        <th>No BPKB</th>
                        <th>Kode Lokasi</th>
                        <th>Masa Berlaku STNK</th>
                        <th <?php if ($_SESSION["ses_level"] == 'Teller') {
                                echo 'style="display:none;"';
                            } ?> >Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($pecahData = $ambilIdentitasMotor->fetch_assoc()) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pecahData['NoRegistrasi']; ?></td>
                            <td><?= $pecahData['NamaPemilik']; ?></td>
                            <td><?= $pecahData['Alamat']; ?></td>
                            <td><?= $pecahData['NoRangka']; ?></td>
                            <td><?= $pecahData['NoMesin']; ?></td>
                            <td><?= $pecahData['PlatNO']; ?></td>
                            <td><?= $pecahData['Merk']; ?></td>
                            <td><?= $pecahData['Tipe']; ?></td>
                            <td><?= $pecahData['Model']; ?></td>
                            <td><?= $pecahData['TahunPembuatan']; ?></td>
                            <td><?= $pecahData['IsiSilinder']; ?></td>
                            <td><?= $pecahData['BahanBakar']; ?></td>
                            <td><?= $pecahData['WarnaTNKB']; ?></td>
                            <td><?= $pecahData['TahunRegistrasi']; ?></td>
                            <td><?= $pecahData['NoBPKB']; ?></td>
                            <td><?= $pecahData['KodeLokasi']; ?></td>
                            <td><?= $pecahData['MasaBerlakuSTNK']; ?></td>
                            <td <?php if ($_SESSION["ses_level"] == 'Teller') {
                                    echo 'style="display:none;"';
                                } ?> >
                                <a href="?p=identitas_motor&aksi=ubah&id=<?= $pecahData['ID']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="?p=identitas_motor&aksi=hapus&id=<?= $pecahData['ID']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
var logged_in_account_type = "<?php echo $_SESSION['ses_level']; ?>";
    if(logged_in_account_type === "Customer" || "Teknisi") {             
         document.getElementById('tableMenu').style.display = 'none';
    } if(logged_in_account_type === "Teller") {
        document.getElementById('tableMenu').style.display = 'block';                          
    } if(logged_in_account_type === "Pemilik") {
        document.getElementById('tableMenu').style.display = 'block';                          
    }

    if(logged_in_account_type === "Customer" || "Teknisi" || "Teller") {             
         document.getElementById('addMenu').style.display = 'none';
    } if(logged_in_account_type === "Pemilik") {
        document.getElementById('addMenu').style.display = 'block';                          
    }

</script>