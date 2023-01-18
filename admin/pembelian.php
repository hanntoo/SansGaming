<h2>Data Pembelian</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>

		<?php $no = 1; ?>
		<!-- menggabungkan (join) tabel user dengan tabel user -->
		<?php $ambil = $conn->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user = user.id_user"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) : ?>
			<tr>
				<td><?= $no; ?></td>
				<td><?= $pecah["nama_user"]; ?></td>
				<td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
				<td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
				<td>
					<a href="index.php?halaman=detail&id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-primary btn-xs">detail</a>
				</td>
			</tr>
			<?php $no++; ?>
		<?php endwhile; ?>

	</tbody>
</table>