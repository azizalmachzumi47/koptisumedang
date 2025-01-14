<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?= $kacang->nama_kacang ?></h3>
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $kacang->gambar) ?>" class="product-image"
                        alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img
                            src="<?= base_url('assets/gambar/' . $kacang->gambar) ?>" alt="Product Image">
                    </div>
                    <?php foreach ($gambar as $key => $value) { ?>
                    <div class="product-image-thumb"><img src="<?= base_url('assets/gambarproduk/' . $value->gambar) ?>"
                            alt="Product Image"></div>
                    <?php } ?>


                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?= $kacang->nama_kacang ?></h3>
                <hr>
                <h5><?= $kacang->nama_kategori ?></h5>
                <hr>
                <p><?= $kacang->deskripsi ?></p>

                <hr>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Rp. <?= number_format($kacang->harga, 0) ?>
                    </h2>
                </div>
                <hr>
                <?php
                echo form_open('belanja/add');
                echo form_hidden('id', $kacang->id_kacang);
                echo form_hidden('price', $kacang->harga);
                echo form_hidden('name', $kacang->nama_kacang);
                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                ?>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="number" name="qty" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>

                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript">
$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
            icon: 'success',
            title: 'Produk Kedelai Berhasil Ditambahkan Ke Keranjang !!!'
        })
    });
});
</script>