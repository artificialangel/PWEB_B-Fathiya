<html>
<head>
    <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <a href="Form_Simpan.php">Tambah Data</a><br><br>
    <table border="1" width="100%">
    <tr>
        <th>Foto</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
    include "Koneksi.php";
    $sql = $pdo->prepare("SELECT * FROM siswa");
    $sql->execute(); 

    while($data = $sql->fetch()){ 
        echo "<tr>";
        echo "<td><img src='PHOTOS/".$data['foto']."' width='100' height='100'></td>";
        echo "<td>".$data['nis']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['telp']."</td>";
        echo "<td>".$data['alamat']."</td>";
        echo "<td><a href='Form_Ubah.php?id=".$data['id']."'>Ubah</a></td>";
        echo "<td><a href='Proses_Hapus.php?id=".$data['id']."'>Hapus</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>