<?= $this->extend('user/layout/templateProfil'); ?>
<?= $this->section('content'); ?>

<style>
.container h2 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input,
textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}


button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
</style>
<?php $session = session() ?>
<div class="container">
    <h2>Edit Profil</h2>
    <form action="<?= base_url('/user/UpdateProfile') ?>" method="post">
        <div class="form-group">
            <label for="nama">Username:</label>
            <label for="username" name="username"><?= $user['username'] ?></label>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" value="<?= $user['nomor'] ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea id="address" name="address" required><?= $user['alamat'] ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Ubah</button>
        </div>
    </form>

    <?= $this->endSection(); ?>