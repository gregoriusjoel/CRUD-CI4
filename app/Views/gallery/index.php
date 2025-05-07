<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="mb-2 text-center fw-bold text-success animate__animated animate__fadeInDown">
        <i class="bi bi-spotify me-2"></i> Spotify Gallery
    </h2>
    <hr class="mx-auto mb-4" style="width: 200px; border-top: 3px solid #198754;">

    <div class="row" id="gallery-list">
        <?php if (!empty($galleries)) : ?>
            <?php foreach ($galleries as $item): ?>
                <div class="col-md-3 mb-4 image-card" id="image-<?= $item['id'] ?>">
                    <div class="card shadow-sm h-100 animate__animated animate__fadeIn">
                        <img src="<?= base_url('uploads/' . $item['image']) ?>" class="card-img-top gallery-img" alt="<?= esc($item['title']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= esc($item['title']) ?></h5>
                            <a href="<?= base_url('gallery/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                            <a href="<?= base_url('gallery/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm delete-btn" data-id="<?= $item['id'] ?>">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center my-5">
                <p class="text-muted">Belum ada lagu yang diunggah.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a id="addButton" href="<?= base_url('gallery/create') ?>" class="btn btn-primary btn-lg transition-up">➕ Tambah Lagu</a>
    </div>
</div>

<!-- Animate.css CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>
    .fade-out {
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.4s ease-in-out;
    }

    .transition-up {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.7s ease;
    }

    .transition-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    .gallery-img {
        object-fit: cover;
        height: 350px;
        width: 100%;
    }
</style>

<script>
    // Tambahkan animasi ke tombol saat halaman dimuat
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('addButton').classList.add('show');
        }, 100); // delay kecil untuk efek smooth
    });

    // Animasi hapus gambar
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Hapus gambar ini?')) {
                const id = this.dataset.id;
                const card = document.getElementById('image-' + id);
                card.classList.add('fade-out');
                setTimeout(() => {
                    window.location.href = this.href;
                }, 400);
            }
        });
    });
</script>

<?= $this->endSection() ?>
