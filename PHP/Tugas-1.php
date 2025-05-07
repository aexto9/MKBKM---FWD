<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Ujian</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .output {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3fe;
            border-left: 6px solid #2196F3;
            border-radius: 4px;
        }
        .output h3 {
            margin-top: 0;
            color: #2196F3;
        }
        .lulus {
            color: green;
            font-weight: bold;
        }
        .remedial {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Input Nilai Ujian</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="nilai">Nilai Ujian:</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Proses Nilai">
        </div>
    </form>

    <?php
    // Blok PHP untuk memproses data form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Mengambil data dari form dan membersihkannya
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $nilai_ujian = filter_input(INPUT_POST, 'nilai', FILTER_VALIDATE_INT); // Validasi sebagai integer

        $status_kelulusan = "";

        // Struktur kendali untuk menentukan status kelulusan
        if ($nilai_ujian === false || $nilai_ujian < 0 || $nilai_ujian > 100) {
            $status_kelulusan = "<span style='color:orange; font-weight:bold;'>Nilai tidak valid (harus antara 0-100).</span>";
        } elseif ($nilai_ujian >= 70) {
            $status_kelulusan = "<span class='lulus'>Lulus</span>";
        } else { // Jika nilai ujian < 70
            $status_kelulusan = "<span class='remedial'>Remedial</span>";
        }

        // Menampilkan output
        echo "<div class='output'>";
        echo "<h3>Hasil Proses:</h3>";
        echo "<p><strong>Nama:</strong> " . $nama . "</p>";
        echo "<p><strong>Email:</strong> " . $email . "</p>";
        if ($nilai_ujian !== false && $nilai_ujian >= 0 && $nilai_ujian <= 100) {
            echo "<p><strong>Nilai Ujian:</strong> " . $nilai_ujian . "</p>";
        }
        echo "<p><strong>Status:</strong> " . $status_kelulusan . "</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>