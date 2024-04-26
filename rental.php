<!DOCTYPE html>
<html>
<head>
    <title>Rental Motor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>
    <div class="container mt-5" style='text-align:center; align-item:center;'>
        <!-- <center> -->
        <h2 class="text-center mb-4">Rental Motor</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama Pelanggan:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="lama_rental">Lama Rental (per hari):</label>
                <input type="number" class="form-control" id="lama_rental" name="lama_rental" min="1" required>
            </div>
            <div class="form-group">
                <label for="jenis_motor">Jenis Motor:</label>
                <select class="form-control" id="jenis_motor" name="jenis_motor" required>
                    <option value="Honda">Honda</option>
                    <option value="Yamaha">Yamaha</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Kawasaki">Kawasaki</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- </center> -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require_once 'RentalMotor.php';

            $nama = $_POST['nama'];
            $lama_rental = $_POST['lama_rental'];
            $jenis_motor = $_POST['jenis_motor'];

            $rental_motor = new RentalMotor($nama, $lama_rental, $jenis_motor);

            echo "<div class='mt-5' style='margin-top: 20px; border: 1px solid black; padding: 10px; width: auto ; line-height: 5px; background-color:#D3D3D3;'>";
            echo "<center><h2 class='text-center mb-4'>Struk Pembelian</h2></center>";
            echo "<center><p>{$rental_motor->getNama()} ";
            if ($rental_motor->isMember()) {
                echo "berstatus sebagai Member mendapatkan diskon 5%.";
            }
            echo "</p>";
            echo "<p>Jenis motor yang dirental adalah {$rental_motor->getJenisMotor()} selama {$rental_motor->getLamaRental()} hari.</p>";
            echo "<p>Harga rental per hari: " . number_format($rental_motor->hargaPerHari()) . "</p>";
            echo "<br>";
            echo "<p>Besar yang harus dibayarkan adalah Rp. " . number_format($rental_motor->totalPembayaran()) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
