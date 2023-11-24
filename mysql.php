<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "latihan";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM jumlahpenduduk";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        /* Adjust as needed */
        .table-container {
            margin: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mr-auto" href="#">Data Jumlah Penduduk</a>
    <a class="navbar-brand ml-auto" href="p/carousel/index.html">Kembali</a>
</nav>


<div class="container table-container">
   
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kecamatan</th>
                <th>Jumlah Penduduk Laki-Laki</th>
                <th>Jumlah Penduduk Perempuan</th>
                <th>Jumlah Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Kecamatan"] . "</td>
                            <td>" . $row["Jumlah Laki Laki"] . "</td>
                            <td>" . $row["Jumlah Perempuan"] . "</td>
                            <td>" . $row["Jumlah Total"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>