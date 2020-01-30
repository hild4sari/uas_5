<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="<?= site_url('inventaris/edit') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inv">Nama Barang</label>
                                <input type="text" class="form-control" name="inv" id="inv" value="<?= $inv->nama_barang ?>" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Inventaris</label>
                                <input type="text" class="form-control" name="kode" id="kode" value="<?= $inv->kode_inv ?>" placeholder="Kode Inventaris">
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek</label>
                                <input class="form-control" type="text" name="merek" id="merek" placeholder="Merek" value="<?= $inv->merek ?>">
                            </div>
                            <div class="form-group">
                                <label for="seri">Seri</label>
                                <input class="form-control" type="text" name="seri" id="seri" placeholder="No Seri" value="<?= $inv->seri ?>">
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai Wajar</label>
                                <input class="form-control" type="text" name="nilai" id="nilai" placeholder="Nilai Wajar" value="<?= $inv->nilai_wajar ?>">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="kondisi" id="kondisi">
                                    <option value="<?= $inv->id_kondisi ?>">Pilih Kondisi</option>
                                    <?php foreach ($kondisi as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_kondisi ?>"><?= $ruangs->kondisi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="tahun" id="tahun">
                                    <option value="<?= $inv->id_tahun ?>">Pilih Tahun</option>
                                    <?php foreach ($tahun as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_tahun ?>"><?= $ruangs->tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ruang">Ruangan</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="ruang" id="ruang">
                                    <option value="<?= $inv->id_ruangan ?>">Pilih Ruangan</option>
                                    <?php foreach ($ruang as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_ruangan ?>"><?= $ruangs->nama_ruangan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sumber">Sumber</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="sumber" id="sumber">
                                    <option value="<?= $inv->id_sumber ?>">Pilih Sumber</option>
                                    <?php foreach ($sumber as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_sumber ?>"><?= $ruangs->sumber ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select class="form-control form-control-sm select2" style="width: 100%;" name="jenis" id="jenis">
                                    <option value="<?= $inv->id_jenis ?>">Pilih Jenis</option>
                                    <?php foreach ($jenis as $ruangs) : ?>
                                        <option value="<?= $ruangs->id_jenis ?>"><?= $ruangs->jenis ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gambar"><img class="img-fluid" src="<?= base_url('assets/img/inventaris/') . $inv->gambar ?>" id="output"></label>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="hidden" name="id" value="<?= $inv->id_inv ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $inv->gambar ?>">
                                    <input type="file" class="custom-file-input" accept="image/*" onchange="loadFile(event)" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <a href="<?= site_url('inventaris') ?>" class="btn btn-info float-left">Kembali</a>
                                <button class="btn btn-success float-right" type="submit">Simpan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>