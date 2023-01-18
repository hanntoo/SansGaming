<h2>Detail Pembelian</h2>

<?php
$ambil = $conn->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user = user.id_user WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

?>

<div class="row" style="margin-bottom:10px;">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		tanggal : <?= $detail["tanggal_pembelian"]; ?><br>
		total : Rp.<?= number_format($detail["total_pembelian"]); ?>,- <br>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?= $detail["nama_user"]; ?></strong><br>
		<?= $detail["telepon_user"]; ?><br>
		<?= $detail["email_user"]; ?>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		Alamat: <?= $detail['alamat_pengiriman']; ?>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>

		<?php $no = 1; ?>
		<!-- menggabungkan (join) tabel produk dengan tabel pembelian_produk -->
		<?php $ambil = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) : ?>
			<tr>
				<td><?= $no; ?>.</td>
				<td><?= $pecah["nama_produk"]; ?></td>
				<td>Rp. <?= number_format($pecah["harga_produk"]); ?>,-</td>
				<td><?= $pecah["jumlah"]; ?></td>
				<td>Rp. <?= number_format($pecah["jumlah"] * $pecah["harga_produk"]); ?>,-</td>
			</tr>
			<?php $no++; ?>
		<?php endwhile; ?>

	</tbody>
</table>