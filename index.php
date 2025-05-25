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
            padding: 0;
            margin: 0;
        }

        .navbar {
            background: #4a216f;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            background: #6d34a1;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: #8e4bd1;
        }

        .container {
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a216f;
            margin-bottom: 30px;
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
    </style>
</head>
<body>

    <div class="navbar">
        <div><strong>K-Pop Concerts</strong></div>
        <div>
            <a href="auth/loginForm.php">Login</a> <!-- 🔧 Diperbaiki -->
        </div>
    </div>

    <div class="container">
        <h1>Daftar Konser K-Pop</h1>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Konser</th>
                    <th>Lokasi</th>
                    <th>Tanggal</th>
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
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">Belum ada data konser.</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

</body>
</html>
