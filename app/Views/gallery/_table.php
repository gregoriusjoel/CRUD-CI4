<tbody>
<?php if (!empty($galleries)) : ?>
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
<?php else: ?>
    <tr>
        <td colspan="4" class="text-center text-muted">Hasil tidak ditemukan.</td>
    </tr>
<?php endif; ?>
</tbody>
