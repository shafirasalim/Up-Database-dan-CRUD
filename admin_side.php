<?php
session_start();

// Proses logout jika tombol logout ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

// Cek session dan pastikan user adalah admin (level = 0)
if (!isset($_SESSION['username']) || $_SESSION['level'] != 0) {
    header('Location: index.php');
    exit();
}

require_once 'concert.php';
$concert = new Concert();
$data = $concert->getAllConcerts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Side - Daftar Konser K-Pop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f6f6;
            padding: 20px;
        }
        .navbar {
            background-color: #4a216f;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout-button {
            padding: 8px 16px;
            background-color: crimson;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: darkred;
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
            font-weight: bold;
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
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div>
            Halo, <?= htmlspecialchars($_SESSION['username']) ?>
            (<?= $_SESSION['level'] === 0 ? 'Admin' : 'User' ?>)
        </div>
        <form action="index.php" method="post" style="margin: 0;">
            <button type="submit" name="logout" class="logout-button">Logout</button>
        </form>
    </div>

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
                        <td><?= htmlspecialchars($item['nama']) ?></td>
                        <td><?= htmlspecialchars($item['lokasi']) ?></td>
                        <td><?= htmlspecialchars($item['tanggal']) ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= htmlspecialchars($item['id']) ?>">Edit</a>
                            <a href="delete.php?id=<?= htmlspecialchars($item['id']) ?>" class="delete" onclick="return confirm('Yakin ingin menghapus konser ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada data konser.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
