<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h2 class="mb-2 text-center fw-bold text-success animate__animated animate__fadeInDown">
        <i class="bi bi-spotify me-2"></i> Spotify Gallery
    </h2>
    <hr class="mx-auto mb-4" style="width: 200px; border-top: 3px solid #198754;">

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari judul lagu atau penyanyi...">
        </div>
    </div>

    <div class="d-flex justify-content-center mb-4">
        <div class="btn-group" role="group" aria-label="View Toggle">
            <button class="btn btn-outline-primary active" id="btnLargeView">
                <i class="bi bi-grid-3x3-gap-fill"></i> Large View
            </button>
            <button class="btn btn-outline-primary" id="btnDetailView">
                <i class="bi bi-list-ul"></i> Detail View
            </button>
        </div>
    </div>

    <!-- Grid View -->
    <div class="row g-3" id="gallery-list">
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
                <p class="text-muted">Belum ada lagu yang diunggah.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Detail View -->
    <div class="table-responsive d-none" id="detail-view">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Cover</th>
                    <th>Judul Lagu</th>
                    <th>Penyanyi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($galleries as $item): ?>
                <tr>
                    <td style="width: 100px;">
                        <img src="<?= base_url('uploads/' . $item['image']) ?>" alt="<?= esc($item['title']) ?>" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td><?= esc($item['title']) ?></td>
                    <td><?= esc($item['artist']) ?></td>
                    <td>
                        <a href="<?= base_url('gallery/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                        <a href="<?= base_url('gallery/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm delete-btn" data-id="<?= $item['id'] ?>">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <a id="addButton" href="<?= base_url('gallery/create') ?>" class="btn btn-primary btn-lg transition-up">➕ Tambah Lagu</a>
    </div>
    <div class="text-center mt-4 animate__animated animate__fadeInUp">
        <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-house-door"></i> Beranda
        </a>
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
        height: 370px;
        width: 100%;
    }
</style>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('addButton').classList.add('show');
        }, 100);
    });

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

    const btnLarge = document.getElementById('btnLargeView');
    const btnDetail = document.getElementById('btnDetailView');
    const galleryList = document.getElementById('gallery-list');
    const detailView = document.getElementById('detail-view');

    btnLarge.addEventListener('click', () => {
        btnLarge.classList.add('active');
        btnDetail.classList.remove('active');
        galleryList.classList.remove('d-none');
        detailView.classList.add('d-none');
    });

    btnDetail.addEventListener('click', () => {
        btnDetail.classList.add('active');
        btnLarge.classList.remove('active');
        galleryList.classList.add('d-none');
        detailView.classList.remove('d-none');
    });
    document.getElementById('searchInput').addEventListener('input', function () {
    const keyword = this.value;

    fetch(`<?= base_url('gallery/search?q=') ?>` + encodeURIComponent(keyword))
        .then(response => response.json())
        .then(data => {
            document.getElementById('gallery-list').innerHTML = data.grid;

            const tbody = document.querySelector('#detail-view tbody');
            tbody.innerHTML = data.table;

            // Re-attach delete events
            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('Hapus gambar ini?')) {
                        const id = this.dataset.id;
                        const card = document.getElementById('image-' + id);
                        if (card) card.classList.add('fade-out');
                        setTimeout(() => {
                            window.location.href = this.href;
                        }, 400);
                    }
                });
            });
        });
});
</script>

<?= $this->endSection() ?>
