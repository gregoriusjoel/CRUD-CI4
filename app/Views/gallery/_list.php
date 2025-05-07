<?php if (!empty($galleries)) : ?>
    <?php foreach ($galleries as $item): ?>
        <div class="col-md-3 mb-4 image-card" id="image-<?= $item['id'] ?>">
            <div class="card shadow-sm h-100 animate__animated animate__fadeIn">
                <img src="<?= base_url('uploads/' . $item['image']) ?>" class="card-img-top gallery-img" alt="<?= esc($item['title']) ?>">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= esc($item['title']) ?></h5>
                    <p class="text-muted mb-1"><?= esc($item['artist']) ?></p>
                    <a href="<?= base_url('gallery/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                    <a href="<?= base_url('gallery/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm delete-btn" data-id="<?= $item['id'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="col-12 text-center my-5">
        <p class="text-muted">Hasil tidak ditemukan.</p>
    </div>
<?php endif; ?>
