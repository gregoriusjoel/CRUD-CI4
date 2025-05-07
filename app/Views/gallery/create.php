<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container py-4">
    <h2 class="mb-4">Tambah Gambar ke Spotify Gallery</h2>

    <form action="<?= base_url('gallery/store') ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="title" class="form-label">Judul Lagu</label>
            <input type="text" class="form-control" name="title" id="title" required>
            <div class="invalid-feedback">Judul wajib diisi.</div>
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Penyanyi</label>
            <input type="text" class="form-control" name="artist" id="artist" required>
            <div class="invalid-feedback">Penyanyi wajib diisi.</div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Album</label>
            <input type="file" class="form-control" name="image" id="image" accept="image/*" required>
            <div class="invalid-feedback">Gambar wajib diunggah.</div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('gallery') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- Bootstrap form validation -->
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<?= $this->endSection() ?>
