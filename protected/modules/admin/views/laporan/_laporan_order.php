<html>
<body>
<h2 style="text-align:center;"><strong>Laporan Data Order Barang <br> Tahun <?= date('Y') ?></strong></h2>
<hr>
<table class="table table-bordered" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Barang</th>
			<th>Supplier</th>
			<th>Jumlah</th>
			<th>Tanggal Order</th>
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
					<td><?= $dt->barang->nama ?></td>
					<td><?= $dt->supplier->nama ?></td>
					<td><?= $dt->jumlah ?></td>
					<td><?= $dt->tgl_order ?></td>
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