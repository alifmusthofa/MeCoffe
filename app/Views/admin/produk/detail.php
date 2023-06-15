<?= $this->extend('admin/Layout/template'); ?>

<?= $this->section('content') ?>



<!-- DataTales Example -->
<h1 class="my-3">Detail</h1>
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="responsive">

            <div class="content">
                <img src="<?= base_url('assets/images/produk/' . $produk['id'] . '/' . $produk['gambar']); ?>" width="500">
                <h3 class="h2"><?= $produk['nama'] ?></h3>
                <div class="mb-5">
                    <span><?= $produk['harga'] ?></span>
                </div>
                <div><?= $produk['deskripsi'] ?></div>
            </div>


        </div>
    </div>


    <?= $this->endSection() ?>