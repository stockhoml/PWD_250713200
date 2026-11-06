<h2>Belanja</h2>
<h3>Daftar Kategori:</h3>
<form method="POST" action="">
    <p>Makanan dan Minuman : <br />
        <select name="makanan_minuman">
            <option value="">-- Pilih Makanan dan Minuman --</option>
            <option value="pop mie">pop mie</option>
            <option value="air mineral">air mineral</option>
        </select>
    </p>
    <p>Alat Tulis : <br />
        <select name="alat_tulis">
            <option value="">-- Pilih Alat Tulis --</option>
            <option value="pulpen">pulpen</option>
            <option value="tipe-x">tipe-x</option>
        </select>
    </p>
    <button type="submit">Kirim</button>
</form>

<?php
function dapatDiskon($totalBayar) {
    if ($totalBayar >= 10000) {
        return 0.05;
    }
    return 0;
}

function totalHarga($diskon, $totalBayar) {
    return $totalBayar - ($totalBayar * $diskon);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makanan_minuman = $_POST['makanan_minuman'] ?? '';
    $alat_tulis = $_POST['alat_tulis'] ?? '';

    $errors = array();

    if (empty($makanan_minuman) || empty($alat_tulis)) {
        $errors[] = "Harap pilih makanan dan minuman serta alat tulis.";
    }

    if (!empty($errors)) {
        foreach ($errors as $msg) {
            echo "<p style='color:red;'>!! " . htmlspecialchars($msg) . " !!</p>";
        }
    } else {
        $harga_makanan_minuman = 0;
        if ($makanan_minuman === 'pop mie') {
            $harga_makanan_minuman = 5000;
        } elseif ($makanan_minuman === 'air mineral') {
            $harga_makanan_minuman = 4000;
        }

        $harga_alat_tulis = 0;
        if ($alat_tulis === 'pulpen') {
            $harga_alat_tulis = 2000;
        } elseif ($alat_tulis === 'tipe-x') {
            $harga_alat_tulis = 8000;
        }

        $totalBayar = $harga_makanan_minuman + $harga_alat_tulis;
        $diskon = dapatDiskon($totalBayar);
        $hasilTotalHarga = totalHarga($diskon, $totalBayar);

        echo "<h2>Informasi Belanja</h2>";
        echo "<p><strong>Makanan dan Minuman:</strong> " . htmlspecialchars($makanan_minuman) . "</p>";
        echo "<p><strong>Alat Tulis:</strong> " . htmlspecialchars($alat_tulis) . "</p>";
        echo "<p><strong>Total Harga:</strong> " . htmlspecialchars($hasilTotalHarga) . "</p>";
        echo "<p><strong>Diskon:</strong> " . htmlspecialchars($diskon) . "</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " . htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
} else {
    echo "<p>Silahkan pilih produk yang ingin dibeli.</p>";
}
?>