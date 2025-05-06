<?php
include 'layouts/header.php';
?>

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 10%;
    }


    .card {
        width: 600px;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .judul,
    .isi {
        width: 100%;
    }

    body {
        padding: 0;
        margin: 0;
        height: 100%;

    }
</style>

<!-- <div class="card-container">
    <div class="card">
        <h2>Ada catatan apa hari ini?</h2>
        <input type="text" class="judul mt-4" placeholder="judul" name="judul" id="judul" required>
        <textarea class="isi mt-4" name="isi" id="isi" cols="20" rows="4" placeholder="isi"></textarea>
        <input type="file" class="bukti mt-4">
        <button type="submit" class="btn btn-primary mt-4">kirim</button>
    </div>
</div> -->


<h1>Tambah Note</h1>
<form action="/tambahNote" method="POST" enctype="multipart/form-data">
  <input type="text" name="judul" placeholder="Judul"><br>
  <textarea name="keterangan" placeholder="Keterangan"></textarea><br>
  <input type="file" name="gambar"><br>
  <button type="submit">Kirim</button>
</form>


<?php
include 'layouts/footer.php';
?>