<h2>Pendaftaran Staff</h2>
<form method="POST" action="">
    <p>Nama : <br /><input type="text" name="nama" /></p>
    <p>NPM : <br /><input type="text" name="npm" /></p>
    <p>Pilihan Staff : <br />
        <select name="loker">
            <option value="">-- Pilih Staff --</option>
            <option value="kasir">kasir</option>
            <option value="merchandiser">merchandiser</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $npm = $_POST['npm'] ?? '';
    $loker = $_POST['loker'] ?? '';
    
    $errors = array();
    $jadwalWawancara = "";

    if (empty($nama) || empty($npm) || empty($loker)) {
        $errors[] = "Harap lengkapi semua data.";
    }

    if (!empty($nama) && !preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $errors[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!empty($npm) && !preg_match("/^*$/", $npm)) {
        $errors[] = "NPM hanya boleh mengandung angka.";
    }

    if ($loker === 'kasir') {
        $jadwalWawancara = "besok pukul 10.00 WIB di market";
    } elseif ($loker === 'merchandiser') {
        $jadwalWawancara = "lusa pukul 12.00 WIB di market";
    }

    if (!empty($errors)) {
        foreach ($errors as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    } else {
        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>";
        echo "<p><strong>NPM:</strong> " . htmlspecialchars($npm) . "</p>";
        echo "<p><strong>Pilihan Staff:</strong> " . htmlspecialchars($loker) . "</p>";
        echo "<p><strong>Jadwal Wawancara:</strong> " . htmlspecialchars($jadwalWawancara) . "</p>";
        echo "<p>Anda mendaftar sebagai " . htmlspecialchars($loker) . ". Selanjutnya, Anda dapat hadir " . htmlspecialchars($jadwalWawancara) . " untuk wawancara.</p>";
    }
} else {
    echo "<p>Silahkan lengkapi formulir di atas.</p>";
}
?>