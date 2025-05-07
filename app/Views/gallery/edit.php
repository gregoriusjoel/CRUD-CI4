<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Edit Galeri</h2>
<form action="/gallery/update/<?= $gallery['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" name="title" value="<?= $gallery['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="artist" class="form-label">Penyanyi</label>
        <input type="text" class="form-control" name="artist" id="artist" value="<?= esc($gallery['artist']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Gambar Saat Ini:</label><br>
        <img src="/uploads/<?= $gallery['image'] ?>" width="150">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Ganti Gambar (opsional)</label>
        <input type="file" class="form-control" name="image" accept="image/*">
    </div>
    <button class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>
