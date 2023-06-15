<?= $this->extend('admin/Layout/template'); ?>

<?= $this->section('content') ?>

<form action="" method="post" id="text-editor" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $produk['id'] ?>" />
    <div class="form-group">
        <label for="nama">nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Baru" value="<?= $produk['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi" value="<?= $produk['deskripsi'] ?>"><?= $produk['deskripsi'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="ukuran">ukuran</label>
        <select class="form-control form-select form-select-sm" name="ukuran" placeholder="Ukuran Produk" required>
            <option selected value="<?= $produk['ukuran'] ?>"><?= $produk['ukuran'] ?></option>
            <?php foreach ($ukuran as $u) : ?>
                <option value="<?= $u->name ?>"><?= $u->name  ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="berat">berat</label>
        <input type="number" name="berat" class="form-control" placeholder="berat dalam gram" value="<?= $produk['berat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="stok">stok</label>
        <input type="number" name="stok" class="form-control" placeholder="stok barang" value="<?= $produk['stok'] ?>" required>
    </div>
    <div class="form-group">
        <label for="harga">harga</label>
        <input type="number" name="harga" class="form-control" placeholder="harga dalam rupiah" value="<?= $produk['harga'] ?>" required>
    </div>
    <div class="form-group">
        <label for="promo">promo</label>
        <input type="number" name="promo" class="form-control" placeholder="Promo yang diberikan" value="<?= $produk['promo'] ?>" required>
    </div>
    <!-- Upload -->
    <div class="form-group">
        <label for="gambar">gambar</label>
        <input type="file" name="gambar" class="form-control" accept="image/png, image/jpeg, image/jpg, image/gif" value="<?= $produk['gambar'] ?>" required>
    </div>
    <?php if (isset($error)) : ?>
        <div class="invalid-feedback"><?= $error ?></div>
    <?php endif; ?>
    <!-- Upload -->
    <div class="form-group">
        <button type="submit" name="status" value="jual" class="btn btn-primary">Jual</button>
        <button type="submit" name="status" value="simpan" class="btn btn-secondary">Simpan</button>
    </div>
</form>


<?= $this->endSection() ?>