<html>
<body>
<h2 style="text-align:center;"><strong>Laporan Data Transaksi Service <br> Tahun <?= date('Y') ?></strong></h2>
<hr>
<table class="table table-bordered" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Mekanik</th>
			<th>Pelanggan</th>
			<th>Barang</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(count($data)>0)
		{
			$no=1;
			foreach($data as $dt)
			{
				?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $dt->mekanik->nama ?></td>
					<td><?= $dt->pelanggan->nama ?></td>
					<td><?= $dt->barang->nama ?></td>
					<td><?= $dt->tanggal ?></td>
					<td><?= $dt->jumlah ?></td>
					<td><?= number_format($dt->harga,0,',','.') ?></td>
					<td><?= $dt->total ?></td>
				</tr>
				<?php
				$no++;
			}
		}
		else
		{
			?>
			<tr>
				<td colspan="8" style="text-align:center;"><h4>Data Tidak Tersedia</h4></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
</body>