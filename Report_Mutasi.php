<?php 
include 'connection.php'; 
include  'P_TOP.php';
?>


<!--  -->
<div class="content">
	<div class="baground-glass">
		
		<!-- --------------------------------------------------------- -->
		<style type="text/css">
			.tittle-report{
				position: absolute;
				right: 10%;
				top: 1%;
				text-shadow: 0px 0px 13px #2cb1f3;
			}	
		</style>

		<div class="tittle-report">
			<h5>REPORT DATA</h5>
		</div>
		<div class="col-12">
			<div class="row">
				<div class="col-6">
					<div class="row">
						<div class="col-6">
							<div style="background-color: #eeeeee;border-radius: 16px;padding: 5px 5px 5px 5px;margin-top: 10px;">
								<p style="text-align: left;font-weight: 700;">Cari berdasarkan tanggal</p>
								<form method="GET">
									<div class="row">
										<div class="col-6" style="padding-right: 0;">
											<input type="date" class="form-control" name="dari" required>
										</div>
										<div class="col" style="padding: 0;width: 0; font-size: 10px;align-self: center;">
											<center><strong>s/d</strong></center>
										</div>
										<div class="col-6">
											<input type="date" class="form-control" name="sampai" required>
										</div>
									</div>
									<center><input class="btn btn-info mt-2" type="submit" value="cari"></center>
								</form>
							</div>
						</div>
						<div class="col-6">
							<div style="background-color: #eeeeee;border-radius: 16px;padding: 5px 5px 5px 5px;margin-top: 10px;">
								<p style="text-align: left;font-weight: 700;">Cari berdasarkan nama barang</p>
								<form method="GET">
									<input type="text" class="form-control" name="barang" placeholder="Masukan Nama Barang" required>
									<center><input class="btn btn-info mt-2" type="submit" value="Cari"></center>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div style="background-color: #eeeeee;border-radius: 16px;padding: 5px 5px 5px 5px;margin-top: 10px;">
						<p style="text-align: left;font-weight: 700;">Cari berdasarkan priode dan nama barang</p>
						<form method="GET">
							<div class="row">
								<div class="col-5"><input type="text" class="form-control" name="barang_" placeholder="Masukan Nama Barang" required></div>
								<div class="col-3"><input type="date" class="form-control" name="dari_" required></div>
								<div class="col-1">s/d</div>
								<div class="col-3"><input type="date" class="form-control" name="sampai_" required></div>
							</div>
							<center><input class="btn btn-info mt-2" type="submit" value="Cari"></center>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="tableFixHead">
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>No Bukti</th>
						<th>Barang</th>
						<th>IN</th>
						<th>OUT</th>
						<th>Saldo</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(isset($_GET['dari'])){
						$_T=$_GET['dari'];
						$_S=$_GET['sampai'];
						$mutasi    =mysqli_query($conn, "SELECT Tanggal,No_Bukti,Nama_Barang,Indikator_K_M,SUM(Quantity) FROM d_mutasi INNER JOIN d_barang ON d_mutasi.K_Barang=d_barang.Kode_Barang WHERE Tanggal between '$_T' and '$_S' GROUP BY No_Bukti,Tanggal,No_Bukti,K_Barang;
							");
					}elseif(isset($_GET['barang'])){
						$_B=$_GET['barang'];
						$mutasi    =mysqli_query($conn, "SELECT Tanggal,No_Bukti,Nama_Barang,Indikator_K_M,SUM(Quantity) FROM d_mutasi INNER JOIN d_barang ON d_mutasi.K_Barang=d_barang.Kode_Barang WHERE Nama_Barang='$_B' GROUP BY No_Bukti,Tanggal,No_Bukti,K_Barang;
							");
					}elseif(isset($_GET['barang_'])){
						$_T_=$_GET['dari_'];
						$_S_=$_GET['sampai_'];
						$_B_=$_GET['barang_'];
						$mutasi    =mysqli_query($conn, "SELECT Tanggal,No_Bukti,Nama_Barang,Indikator_K_M,SUM(Quantity) FROM d_mutasi INNER JOIN d_barang ON d_mutasi.K_Barang=d_barang.Kode_Barang WHERE Nama_Barang='$_B_' AND Tanggal between '$_T_' and '$_S_' GROUP BY No_Bukti,Tanggal,No_Bukti,K_Barang;
							");
					}else{
						$mutasi    =mysqli_query($conn, "SELECT Tanggal,No_Bukti,Nama_Barang,Indikator_K_M,SUM(Quantity) FROM d_mutasi INNER JOIN d_barang ON d_mutasi.K_Barang=d_barang.Kode_Barang GROUP BY No_Bukti,Tanggal,No_Bukti,K_Barang;");
					}

					$D_kosong=mysqli_num_rows($mutasi);

					if($D_kosong=='0'){
						?>
						<tr>
							<td>DATA TIDAK ADA</td>
						</tr>
						<?php 
					}else{
						$no=1;
						while($row    =mysqli_fetch_array($mutasi)){
							?>
							<tr>
								<td><b><?=$no++?></b></td>
								<td><?=$row['Tanggal']?></td>
								<td><?=$row['No_Bukti']?></td>
								<td><?=$row['Nama_Barang']?></td>
								<td>
									<?php if ($row['Indikator_K_M']==="Masuk"){echo $row['Indikator_K_M'];}else{ echo "-";}?>
								</td>
								<td>
									<?php if ($row['Indikator_K_M']==="Keluar"){echo $row['Indikator_K_M'];}else{ echo "-";}?>
								</td>
								<td><?=$row['SUM(Quantity)']?></td>
							</tr>
						<?php }
					} ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- --------------------------------------------------------- -->


</div>
</div>
<!--  -->


<?php include 'P_Bottom.php'; ?>