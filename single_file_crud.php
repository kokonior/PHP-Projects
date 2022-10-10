<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Printer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">PRINTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?fungsi=create">Tambah Data</a>
                </li>
            </div>
        </div>
    </nav>

    <?php 

        $server = "localhost";
        $user = "root"; // Database username
        $password = ""; // Database password
        $database = ""; // Database name

        $db = mysqli_connect($server, $user, $password, $database);
        if(!$db ){
            die("Gagal terhubung dengan database: " . mysqli_connect_error());
        }

        function create($db) {

            if(isset($_POST['button-simpan'])) {
                $id = $_POST['id'];
                $merk = $_POST['merk'];
                $warna = $_POST['warna'];
                $jumlah = $_POST['jumlah'];

                if(!empty($id) && !empty($merk) && !empty($warna) && !empty($jumlah)) {
                    $sql = "INSERT INTO printer (id, merk, warna, jumlah) VALUES ('$id', '$merk', '$warna', '$jumlah')";
                    $result = mysqli_query($db, $sql);
                    if($result && isset($_GET['fungsi'])) {
                        if($_GET['fungsi'] == 'create') {
                            header('Location: index.php');
                        }
                    }
                } else {
                    $message = 'Tidak dapat menyimpan data, data tidak lengkap';
                }
            }
            ?>
                <div class="container">
                    <h2>Tambah Data Printer</h2>
                    <form action="index.php?fungsi=create" method="POST">
                        <div class="form-group">
                            <label for="id">Id Printer</label>
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <label for="merk">Merk Printer</label>
                            <input type="text" class="form-control" id="merk" name="merk">
                        </div>
                        <div class="form-group">
                            <label for="warna">Warna Printer</label>
                            <input type="text" class="form-control" id="warna" name="warna">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <input type="submit" class="btn btn-primary" name="button-simpan" value="Sumbit">
                    </form>
                </div>

            <?php 
        }

        function read($db) {
            ?>
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Merk Printer</th>
                            <th scope="col">Warna Printer</th>
                            <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM printer";
                                $result = mysqli_query($db, $sql);
                                if(mysqli_num_rows($result) != 0) {
                                    while($data = mysqli_fetch_assoc($result)) :
                                        ?>
                                        <tr>
                                            <th><?php echo $data['id']; ?></th>
                                            <td><?php echo $data['merk']; ?></td>
                                            <td><?php echo $data['warna']; ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                        </tr>
                                        <?php 
                                    endwhile;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            <?php 
        }

    ?>


    <?php 
        if(isset($_GET['fungsi'])) {
            switch ($_GET['fungsi']) {
                case 'create':
                    create($db);
                    break;
                default:
                    read($db);
                    break;
            }
        } else {
            read($db);
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>