<!DOCTYPE html>
<html lang="en">

<head>
	<?php 
	$this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transaksi') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No Transaksi</th>
										<th>Tanggal</th>
                                        <th>Divisi</th>
										<th>Total Buah</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($transaksi as $transaksi): ?>
									<tr>
										<td width="150">
											<?php echo $transaksi->notrans ?>
										</td>
                                        <td width="150">
											<?php echo $transaksi->tanggal ?>
										</td>
                                        <td width="150">
											<?php echo $transaksi->divisi ?>
										</td>
                                        <td width="150">
											<?php echo $transaksi->totalbuah ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/transaksi/edit/'.$transaksi->notrans) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/transaksi/delete/'.$transaksi->notrans) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>

</body>

</html>