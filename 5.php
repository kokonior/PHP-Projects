<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <title>CRUD Petani Kode</title>
    <link rel="icon" href="http://www.petanikode.com/favicon.ico" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <style>
    body {
        color: black;
        font-family: cursive;
        font-size: 20px;
        background-image: url('bg/bg.jpg');
        background-size: cover;
        text-align: center;


    }

    fieldset legend h2 {
        font-size: 40px;

    }


    label input {
        border-radius: 25px;
    }

    </style> <?php

	// --- koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "potomupotoku") or die(mysqli_error());

	// --- Fngsi tambah data (Create)
	function tambah($koneksi)
	{

		if (isset($_POST['btn_simpan'])) {
			$id = time();
			$judul = $_POST['judul_foto'];
			$caption = $_POST['caption'];
			$foto = $_POST['foto'];

			if (!empty($judul) && !empty($caption) && !empty($foto)) {
				$sql = "INSERT INTO poto (id,judul_foto,caption,foto) VALUES(" . $id . ",'" . $judul . "','" . $caption . "','" . $foto . "')";
				$simpan = mysqli_query($koneksi, $sql);
				if ($simpan && isset($_GET['aksi'])) {
					if ($_GET['aksi'] == 'create') {
						header('location: index.php');
					}
				}
			} else {
				$pesan = "Tidak dapat menyimpan, data belum lengkap!";
			}
		}

	?> <form action="" method="POST">
        <fieldset>
            <legend>
                <h2><br>POSTING FOTO</h2>
            </legend> <label>Judul Foto <input type="text" name="judul_foto" /></label> <br> <label>Caption <input
                    type="text" name="caption" /></label> <br> <label>Foto <input type="file" name="foto" /></label>
            <br> <br> <label> <input type="submit" name="btn_simpan" value="Upload" /> <input type="reset"
                    href="dashboard.html" value="Besihkan" /> </label>
            <li class="nav-item active"> <a class="btn" href="dashboard.html"> <span>Kembali</span></a> </li> <br>
            <p><?php echo isset($pesan) ? $pesan : "" ?></p>
        </fieldset>
    </form> <?php

	}
	// --- Tutup Fngsi tambah data


	// --- Fungsi Baca Data (Read)
	function tampil_data($koneksi)
	{
		$sql = "SELECT * FROM poto";
		$query = mysqli_query($koneksi, $sql);

		echo "<fieldset>";
		echo "<legend><h2>POTO</h2></legend>";

		echo "<table border='5' cellpadding='10' table align:center >";
		echo "<tr>
			<th>ID</th>
			<th>Judul foto</th>
			<th>caption/th>
			<th>foto</th>
			
		  </tr>";

		while ($data = mysqli_fetch_array($query)) {
		?> <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['judul_foto']; ?></td>
        <td><?php echo $data['caption']; ?> Kg</td>
        <td><?php echo $data['foto']; ?> bulan</td>
        <td> <a
                href="index.php?aksi=update&id=<?php echo $data['id']; ?>&judul=<?php echo $data['nama_tanaman']; ?>&hasil=<?php echo $data['hasil_panen']; ?>&lama=<?php echo $data['lama_tanam']; ?>&tanggal=<?php echo $data['tanggal_panen']; ?>">Ubah</a>
            | <a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a> </td>
    </tr> <?php
		}
		echo "</table>";
		echo "</fieldset>";
	}
	// --- Tutup Fungsi Baca Data (Read)


	// --- Fungsi Ubah Data (Update)
	function ubah($koneksi)
	{

		// ubah data
		if (isset($_POST['btn_ubah'])) {
			$id = $_POST['id'];
			$nm_tanaman = $_POST['nm_tanaman'];
			$hasil = $_POST['hasil'];
			$lama = $_POST['lama'];
			$tgl_panen = $_POST['tgl_panen'];

			if (!empty($nm_tanaman) && !empty($hasil) && !empty($lama) && !empty($tgl_panen)) {
				$perubahan = "nama_tanaman='" . $nm_tanaman . "',hasil_panen=" . $hasil . ",lama_tanam=" . $lama . ",tanggal_panen='" . $tgl_panen . "'";
				$sql_update = "UPDATE tabel_panen SET " . $perubahan . " WHERE id=$id";
				$update = mysqli_query($koneksi, $sql_update);
				if ($update && isset($_GET['aksi'])) {
					if ($_GET['aksi'] == 'update') {
						header('location: index.php');
					}
				}
			} else {
				$pesan = "Data tidak lengkap!";
			}
		}

		// tampilkan form ubah
		if (isset($_GET['id'])) {
		?> <a href="index.php"> &laquo; Home</a> | <a href="index.php?aksi=create"> (+) Tambah Data</a>
    <hr>
    <form action="" method="POST">
        <fieldset>
            <legend>
                <h2>Ubah data</h2>
            </legend> <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" /> <label>Nama tanaman <input
                    type="text" name="nm_tanaman" value="<?php echo $_GET['nama'] ?>" /></label> <br> <label>Hasil panen
                <input type="number" name="hasil" value="<?php echo $_GET['hasil'] ?>" /> kg</label><br> <label>Lama
                tanam <input type="number" name="lama" value="<?php echo $_GET['lama'] ?>" /> bulan</label> <br>
            <label>Tanggal panen <input type="date" name="tgl_panen" value="<?php echo $_GET['tanggal'] ?>" /></label>
            <br> <br> <label> <input type="submit" name="btn_ubah" value="Simpan Perubahan" /> atau <a
                    href="index.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>! </label> <br>
            <p><?php echo isset($pesan) ? $pesan : "" ?></p>
        </fieldset>
    </form> <?php
		}
	}
	// --- Tutup Fungsi Update


	// --- Fungsi Delete
	function hapus($koneksi)
	{

		if (isset($_GET['id']) && isset($_GET['aksi'])) {
			$id = $_GET['id'];
			$sql_hapus = "DELETE FROM tabel_panen WHERE id=" . $id;
			$hapus = mysqli_query($koneksi, $sql_hapus);

			if ($hapus) {
				if ($_GET['aksi'] == 'delete') {
					header('location: index.php');
				}
			}
		}
	}
	// --- Tutup Fungsi Hapus


	// ===================================================================

	// --- Program Utama
	if (isset($_GET['aksi'])) {
		switch ($_GET['aksi']) {
			case "create":
				echo '<a href="index.php"> &laquo; Home</a>';
				tambah($koneksi);
				break;
			case "read":
				tampil_data($koneksi);
				break;
			case "update":
				ubah($koneksi);
				tampil_data($koneksi);
				break;
			case "delete":
				hapus($koneksi);
				break;
			default:
				echo "<h3>Aksi <i>" . $_GET['aksi'] . "</i> tidaka ada!</h3>";
				tambah($koneksi);
				tampil_data($koneksi);
		}
	} else {
		tambah($koneksi);
		tampil_data($koneksi);
	}

	?>
</body>

</html>
