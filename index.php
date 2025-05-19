<?php
require_once 'concert.php';
$concert = new Concert();
$data = $concert->getAllConcerts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Konser K-Pop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4a216f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background: #ddd;
        }
        .actions a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            background: #4a216f;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .actions a.delete {
            background: crimson;
        }
        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            padding: 10px 15px;
            background: #4a216f;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h1>Daftar Konser K-Pop</h1>

    <a href="create.php" class="add-btn">+ Tambah Konser</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Konser</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data): ?>
                <?php $no = 1; foreach ($data as $item): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['lokasi'] ?></td>
                        <td><?= $item['tanggal'] ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $item['id'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $item['id'] ?>" class="delete" onclick="return confirm('Yakin ingin menghapus konser ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada data konser.</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>

</body>
</html>
