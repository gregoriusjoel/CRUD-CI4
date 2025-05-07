<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container text-center py-5">
    <h1 class="mb-4 text-success fw-bold"><i class="bi bi-music-note-beamed"></i> Selamat Datang di Spotify Gallery</h1>
    <p class="lead text-muted mb-5">Sebuah aplikasi CRUD galeri album musik dengan CodeIgniter 4 dan Bootstrap 5.</p>
    
    <a href="<?= base_url('gallery') ?>" class="btn btn-success btn-lg">
        <i class="bi bi-images me-1"></i> Masuk ke Galeri
    </a>
</div>

<?= $this->endSection() ?>
