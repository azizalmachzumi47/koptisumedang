<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Kacang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            echo validation_errors(' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>', '</h5> </div>');

            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
            }
            echo form_open_multipart('kacang/edit/' . $kacang->id_kacang) ?>
            <div class="form-group">
                <label>Nama Kacang</label>
                <input name="nama_kacang" type="text" class="form-control" placeholder="Nama Kacang"
                    value="<?= $kacang->nama_kacang ?>">
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="<?= $kacang->id_kategori ?>"><?= $kacang->nama_kategori ?></option>
                            <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $kacang->nama_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" type="text" class="form-control" placeholder="Harga Kacang"
                            value="<?= $kacang->harga ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="number" name="berat" min="0" class="form-control"
                            placeholder="Berat Dalam Satuan Gram" value="<?= $kacang->berat ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Berat Satuan</label>
                        <select name="berat_satuan" class="form-control">
                            <option value=""><?= $kacang->berat_satuan ?></option>
                            <option value="Kw">Kw</option>
                            <option value="Kg">Kg</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Deskripsi Kacang</label>
                <textarea name="deskripsi" class="form-control" rows="5"
                    placeholder="Deskripsi Kacang"><?= $kacang->deskripsi ?></textarea>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ganti Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="preview_gambar">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/' . $kacang->gambar) ?>" id="gambar_load" width="300px">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('kacang') ?>" class="btn btn-success btn-sm">Kembali</a>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
function bacaGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#gambar_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#preview_gambar").change(function() {
    bacaGambar(this);
});
</script>