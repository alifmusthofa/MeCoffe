<?= $this->extend('user/layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <h2>Featured Products</h2>
    <div class="container">
        <div class="row">
            <?php foreach ($produk as $p) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card">
                    <img src="<?= base_url('assets/images/produk/' . $p['id'] . '/' . $p['gambar']); ?>"
                        class="card-img-top" alt="<?= $p['nama'] ?>" width="50">
                    <div class="card-body">
                        <h4 class="card-title"><?= $p['nama'] ?></h4>
                        <?php if (($p['promo']) == 0) : ?>
                        <h5 class="card-text" style="font-weight: bolder;">Rp. <?= $p['harga'] ?></h5>
                        <?php else : ?>
                        <h5 class="card-text" style="font-weight: bolder;">Rp.
                            <?= $p['harga'] - ($p['harga'] * ($p['promo'] / 100)) ?></h5>

                        <div class="row">
                            <div class="col-3">
                                <p class="btn btn-sm btn-outline-danger"><?= $p['promo'] ?>%</p>
                            </div>
                            <div class="col-9">
                                <small class="card-text" style="text-decoration: line-through">Rp.
                                    <?= $p['harga'] ?></small>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="position-absolute bottom-0" style="padding-bottom: 10px;">
                            <a href="/user/dashboard/<?= $p['slug'] ?> " class="btn btn-primary">Lihat</a>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>



    </div>


    <?= $this->endSection(); ?>