<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($newses as $news) : ?>
        <tr>
            <td><?= $news['id'] ?></td>
            <td>
                <strong><?= $news['title'] ?></strong><br>
                <small class="text-muted"><?= $news['created_at'] ?></small>
            </td>
            <td>
                <?php if ($news['status'] === 'published') : ?>
                <small class="text-success"><?= $news['status'] ?></small>
                <?php else : ?>
                <small class="text-muted"><?= $news['status'] ?></small>
                <?php endif ?>
            </td>
            <td>
                <a href="<?= base_url('admin/news/' . $news['id'] . '/preview') ?>"
                    class="btn btn-sm btn-outline-secondary" target="_blank">Preview</a>
                <a href="<?= base_url('admin/news/' . $news['id'] . '/edit') ?>"
                    class="btn btn-sm btn-outline-secondary">Edit</a>
                <a onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


<script>
function confirmToDelete(el) {
    var confirmation = confirm("Apakah Anda yakin ingin menghapus elemen ini?");
    if (confirmation) {
        // Lakukan tindakan penghapusan di sini
        console.log("Elemen dihapus!");
        window.location = "<?= base_url('admin/news/' . $news['id'] . '/delete') ?>"
    } else {
        // Pembatalan penghapusan
        console.log("Penghapusan dibatalkan.");
        window.location = "<?= base_url('admin/news/') ?>"
    }
}
</script>


<?= $this->endSection() ?>