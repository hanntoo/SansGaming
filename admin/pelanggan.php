<h2>Data Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Alamat</th>
			<th>Role</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $conn->query("SELECT * FROM user"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) {  ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_user']; ?></td>
				<td><?php echo $pecah['email_user']; ?></td>
				<td><?php echo $pecah['telepon_user']; ?></td>
				<td><?php echo $pecah['alamat_user']; ?></td>
				<td><?php echo $pecah['role']; ?></td>
				<td>
					<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_user']; ?>" class="btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>