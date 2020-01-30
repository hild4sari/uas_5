<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Kondisi</h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<a href="<?= site_url('kondisi/tambah') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="table-responsive">
						<table id="example1" class="table table-sm table-bordered table-striped" style="width: 100%">
							<thead>
								<tr>
									<th>No</th>
									<th>kondisi</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php $i = 1;
								foreach ($kondisi as $row) { ?>
									<tr>
										<td><?= $i++ ?></td>
										<td><?= $row->kondisi ?></td>
										<td><?= $row->ket_kondisi ?></td>
										<td>
											<a href="<?= site_url('kondisi/edit/') . $row->id_kondisi ?>" class="btn btn-sm btn-warning m-1"><i class="fas fa-pen"></i></a>
											<button type="button" data-toggle="modal" data-target="#hapus<?= $row->id_kondisi ?>" class="btn btn-sm btn-danger m-1"><i class="fas fa-trash"></i></button>
										</td>
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="hapus<?= $row->id_kondisi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="<?= site_url('kondisi/hapus') ?>" method="post">
													<div class="modal-body">
														<h3>Apakah anda yakin ?</h3>
														<input type="hidden" name="id" value="<?= $row->id_kondisi ?>">
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Hapus</button>
													</div>
											</div>
											</form>
										</div>
									</div>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>