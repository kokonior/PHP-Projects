<?php
class CRUD
{
    protected $dbhost = 'localhost'; // database host
    protected $dbuser = 'root'; // database username
    protected $dbpass = ''; // database password
    protected $dbname = 'crud_irul'; // database name
    protected $mysqli;
    public $message;

    public function __construct() // koneksi ke database
    {
        $mysqli = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if ($mysqli->connect_errno) die("Failed to connect DB: " . $mysqli->connect_error);
        $this->mysqli = $mysqli;
    }
    public function create_data($nim, $nama, $alamat, $jurusan) // untuk menambah data
    {
        $add = $this->mysqli->prepare("INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `alamat`, `jurusan`) VALUES (?, ?, ?, ?)");
        $add->bind_param("isss", $nim, $nama, $alamat, $jurusan);
        $this->message = $add->execute();
        $add->close();
        return $this->message;
    }
    public function read_data($nim = '') // untuk meload data yang berada di database
    {
        if (!empty($nim)) {
            $read = $this->mysqli->prepare("SELECT * FROM `mahasiswa` WHERE `nim` = ?");
            $read->bind_param("i", $nim);
            $this->message = $read->execute();
            $result = $read->get_result();
            return $result->fetch_assoc();
        } else {
            return $this->mysqli->query("SELECT * FROM `mahasiswa`")->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function update_data($nim, $nama, $alamat, $jurusan) // untuk mengupdate data yang ada
    {
        $add = $this->mysqli->prepare("UPDATE `mahasiswa` SET `nama_lengkap` = ?, `alamat` = ?, `jurusan` = ? WHERE `mahasiswa`.`nim` = ?");
        $add->bind_param("sssi", $nama, $alamat, $jurusan, $nim);
        $this->message = $add->execute();
        $add->close();
        return $this->message;
    }
    public function delete_data($nim) // untuk menghapus data yang ada
    {
        $del = $this->mysqli->prepare("DELETE FROM `mahasiswa` WHERE `mahasiswa`.`nim` = ?");
        $del->bind_param("i", $nim);
        $this->message = $del->execute();
        $del->close();
        return $this->message;
    }
}
$crud = new CRUD; // inisialisasi kelas CRUD
$i = 1;
?> <html>

<head>
    <title>Simple CRUD</title>
    <style>
    th {
        width: 200px;
        text-align: left;
    }

    </style>
</head>

<body> <?php
    if (isset($_GET['mode']) && !empty($_GET['mode'])) {
        if ($_GET['mode'] == 'tambah') {
            if (isset($_POST['submit'])) {
                $crud->create_data(trim($_POST['nim']), trim($_POST['nama']), trim($_POST['alamat']), trim($_POST['jurusan']));
                echo $crud->message == 1 ? "<script>alert('sukses tambah data')</script>" : "<script>alert('gagal tambah data')</script>";
            }
    ?> <h3>Tambah Data | <a href="./">Home</a></h3>
    <form method="POST" action="./?mode=tambah">
        <table>
            <tr>
                <th>NIM</th>
                <td>: <input type="number" name="nim" placeholder="nim.." required></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>: <input type="text" name="nama" placeholder="Nama Lengkap.." required></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: <input type="text" name="alamat" placeholder="Alamat.." required></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>: <input type="text" name="jurusan" placeholder="Jurusan.." required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Simpan</button></td>
            </tr>
        </table>
    </form> <?php
        } else if ($_GET['mode'] == 'edit') {
            if (isset($_GET['nim'])) {
                if ($data = $crud->read_data(trim($_GET['nim']))) {
                    if (isset($_POST['submit'])) {
                        $crud->update_data(trim($_POST['nim']), trim($_POST['nama']), trim($_POST['alamat']), trim($_POST['jurusan']));
                        echo $crud->message == 1 ? "<script>alert('sukses update data')</script>" : "<script>alert('gagal update data')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=./?mode=edit&nim=" . $_POST['nim'] . "'>";
                    }
            ?> <h3>Edit Data | <a href="./">Home</a></h3>
    <form method="POST" action="./?mode=edit&nim=<?= $data['nim']; ?>">
        <table>
            <tr>
                <th>NIM</th>
                <td>: <input type="number" name="nim" placeholder="nim.." value="<?= $data['nim']; ?>" readonly></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>: <input type="text" name="nama" placeholder="Nama Lengkap.." value="<?= $data['nama_lengkap']; ?>"
                        required></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>: <input type="text" name="alamat" placeholder="Alamat.." value="<?= $data['alamat']; ?>" required>
                </td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td>: <input type="text" name="jurusan" placeholder="Jurusan.." value="<?= $data['jurusan']; ?>"
                        required></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Update data</button></td>
            </tr>
        </table>
    </form> <?php
                } else {
                    echo "data not found <a href='./'>back to home</a>";
                }
            }
        } else if ($_GET['mode'] == 'hapus') {
            if (isset($_GET['nim'])) {
                if ($crud->read_data(trim($_GET['nim']))) {
                    $crud->delete_data(trim($_GET['nim']));
                    echo $crud->message == 1 ? "<script>alert('sukses hapus data')</script>" : "<script>alert('gagal hapus data')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=./'>";
                } else {
                    echo "data not found <a href='./'>back to home</a>";
                }
            }
        }
    } else {
        ?> <h3>Home | <a href="./?mode=tambah">Tambah Data</a></h3>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody> <?php foreach ($crud->read_data() as $data) { ?> <tr>
                <td><?= $i++; ?></td>
                <td><?= $data['nim']; ?></td>
                <td><?= $data['nama_lengkap']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td><?= $data['jurusan']; ?></td>
                <td><a href="./?mode=edit&nim=<?= $data['nim']; ?>">EDIT</a> | <a
                        href="./?mode=hapus&nim=<?= $data['nim']; ?>"
                        onclick="return confirm('Yakin mau hapus data ini?');">HAPUS</a></td>
            </tr> <?php } ?> </tbody>
    </table> <?php
    }
    ?>
</body>

</html>
