<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Konser</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f6f6f6;
      color: #4a216f;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .back-btn {
      display: inline-block;
      margin-bottom: 20px;
      color: #4a216f;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
    }
    .back-btn:hover {
      text-decoration: underline;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      font-size: 28px;
    }
    form {
      max-width: 500px;
      margin: 0 auto;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
    }
    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 20px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
      color: #333;
    }
    input[type="text"]:focus,
    input[type="date"]:focus {
      border-color: #4a216f;
      outline: none;
      box-shadow: 0 0 5px rgba(74, 33, 111, 0.5);
    }
    .submit-btn {
      width: 100%;
      background-color: #4a216f;
      color: white;
      border: none;
      padding: 12px 0;
      font-size: 16px;
      font-weight: 700;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .submit-btn:hover {
      background-color: #3b1a5a;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="index.php" class="back-btn">← Kembali ke Daftar</a>
    <h1>Tambah Konser K-Pop</h1>

    <form method="post">
      <label for="nama">Nama Konser</label>
      <input type="text" id="nama" name="nama" required />

      <label for="lokasi">Lokasi</label>
      <input type="text" id="lokasi" name="lokasi" required />

      <label for="tanggal">Tanggal</label>
      <input type="date" id="tanggal" name="tanggal" required />

      <button type="submit" name="submit" class="submit-btn">Tambah Konser</button>
    </form>

    <?php
    require_once 'concert.php';
    $concert = new Concert();

    if (isset($_POST['submit'])) {
        $data = [
            'nama' => $_POST['nama'],
            'lokasi' => $_POST['lokasi'],
            'tanggal' => $_POST['tanggal']
        ];

        $concert->addConcert($data);
        echo "<script>alert('Konser berhasil ditambahkan!'); window.location.href='admin_side.php';</script>";
    }
    ?>
  </div>
</body>
</html>
