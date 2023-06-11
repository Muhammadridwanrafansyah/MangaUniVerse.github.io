<?php
//import koneksi ke database
include 'config.php';
?>
<html>
<head>
  <title>Stock Barang</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
    <h2>Stock Bahan</h2>
    <h4>(Inventory)</h4>
    <div class="data-tables datatable-dark">

        <?php
        // Koneksi ke database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "shop_db";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Mengambil data dari tabel "products"
        $sql = "SELECT id, name, price, image FROM products";
        $result = mysqli_query($conn, $sql);

        // Membuat tabel HTML
        echo '<table id="mauexport" class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Price</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Menampilkan data ke dalam baris tabel
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<th scope="row">' . $row["id"] . '</th>';
                echo '<td>' . $row["name"] . '</td>';
                echo '<td>' . $row["price"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">Tidak ada data yang ditemukan</td></tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Menutup koneksi ke database
        mysqli_close($conn);
        ?>

    </div>
</div>

<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                customize: function(doc) {
                    doc.content[1].table.body.forEach(function(row) {
                        row.forEach(function(cell) {
                            if (typeof cell !== 'undefined' && cell.text && cell.text.indexOf('View Details') !== -1) {
                                cell.text = {
                                    text: cell.text,
                                    link: cell.text,
                                    decoration: 'underline',
                                    color: 'blue'
                                };
                            }
                        });
                    });
                }
            },
            'copy','csv','excel','print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>
</html>
