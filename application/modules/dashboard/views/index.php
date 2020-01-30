    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Nama Barang</th>
                      <th rowspan="2">Jumlah Barang</th>
                      <th colspan="<?= count($kondisi) ?>" style="text-align:center">Keadaan</th>
                      <th rowspan="2">Tempat</th>
                      <th rowspan="2">Sumber</th>
                      <th rowspan="2">Total</th>
                      <th rowspan="2">Nilai Wajar</th>
                      <th rowspan="2">% Kondisi</th>
                    </tr>
                    <tr>
                      <?php foreach ($kondisi as $rows) { ?>
                        <th><?= $rows->kondisi ?></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($data as $row) {
                    ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama_barang ?></td>
                        <td><?= count($this->db->get_where("inventaris", ['nama_barang' => $row->nama_barang, 'id_ruangan' => $row->id_ruangan])->result()) ?></td>
                        <?php foreach ($kondisi as $rows) { ?>
                          <td>
                            <?= count($this->db->get_where('inventaris', ['id_kondisi' => $rows->id_kondisi, 'nama_barang' => $row->nama_barang, 'id_ruangan' => $row->id_ruangan])->result_array()) ?>
                          </td>
                        <?php } ?>
                        <td><?= $row->nama_ruangan ?></td>
                        <td><?= $row->sumber ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>