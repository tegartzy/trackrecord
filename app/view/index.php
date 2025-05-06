<?php
include_once 'layouts/header.php';
?>

<style>
    .card-wrapper {
        width: 800px;
        /* Lebar diperbesar */
        height: 250px;
        /* Tinggi juga ditambah */
        background-color: #f1f1f1;
        padding: 15px;
        border-radius: 12px;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        margin: 20px auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        position: relative;
        scroll-behavior: smooth;
        scrollbar-width: none;
        user-select: none;
    }

    .card-wrapper::-webkit-scrollbar {
        display: none;
    }

    .card-wrapper.active {
        cursor: grabbing;
        cursor: -webkit-grabbing;
    }

    .card-wrapper {
        cursor: grab;
    }


    .inner-card {
        display: inline-block;
        width: 140px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-right: 12px;
        text-align: center;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        vertical-align: top;
    }

    .inner-card img {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 6px;
    }

    .inner-card strong {
        font-size: 13px;
        display: block;
        margin-bottom: 4px;
    }

    .inner-card p {
        font-size: 12px;
        color: #444;
        margin: 0;
    }
    a{
        text-decoration: none;
        color: black;
    }

    /* Tombol tambah */
    .btn-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 14px 18px;
        border-radius: 50%;
        font-size: 24px;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.2s;
    }

    .btn-float:hover {
        background-color: #0056b3;
    }
</style>

<!-- Card besar -->
<div class="card-wrapper">
    <?php foreach ($data as $note): ?>
        <div class="inner-card">
            <a href="keterangan"><img src="/uploads/<?= htmlspecialchars($note['gambar']) ?>" alt="Gambar Note">
            <strong><?= htmlspecialchars($note['judul']) ?></strong>
            <p><?= htmlspecialchars($note['isi']) ?></p></a>
        </div>
    <?php endforeach; ?>
</div>

<!-- Tombol tambah mengambang -->
<a href="/tambahNote" class="btn-float">+</a>




<script>
    const slider = document.querySelector('.card-wrapper');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.5; // scroll speed
        slider.scrollLeft = scrollLeft - walk;
    });
</script>





<?php
include_once 'layouts/footer.php';
?>