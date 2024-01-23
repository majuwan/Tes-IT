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
				top: 4%;
				text-shadow: 0px 0px 13px #2cb1f3;
			}	
		</style>

		<div class="tittle-report">
			<h5>DATA INPUTAN MUTASI & BARANG</h5>
		</div>
		<div class="row mr-2 ml-2">
			<div class="col-6">
				<div class="tableFixHead">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$no=1;
							$barang    =mysqli_query($conn, "SELECT * FROM d_barang
								");
							while($result    =mysqli_fetch_array($barang)){
								?>
								<tr>
									<td><b><?= $no++?></b></td>
									<td><?= $result['Kode_Barang'];?></td>
									<td><?= $result['Nama_Barang'];?></td>
									<td class="text-center">
										<a href="View_Barang.php?Kode_Barang=<?=$result['Kode_Barang'];?>" class="btn btn-primary btn-sm mb-2">Views</a>
										<form action="" method="POST">
											<input type="text" value="<?=$result['Kode_Barang'];?>" name="hapus_kode" hidden>
											<button class="btn btn-danger btn-sm" name="delete">Delete</button>
										</form>
										<?php 
										if(isset($_POST['delete'])){
											$hapus_kode = $_POST['hapus_kode'];
											$del = mysqli_query($conn, "DELETE FROM d_barang WHERE Kode_Barang='$hapus_kode'");
											if($del){
												echo "<script>alert('Data anda telah berhasil dihapus, Klik Ok untuk melanjutkan session');window.location='index.php'</script>";
											}else{
												$Kode_Barang=$result['Kode_Barang'];
												echo "<script>alert('Maaf data dengan kode ( $Kode_Barang ) ini tidak dapat dihapus, Pastikan data mutasi yang terhubung dengan data barang sudah dihapus terlebih dahulu, jika sudah mengerti Klik Ok untuk melanjutkan session');window.location='index.php'</script>";
											}
										}?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div style="background-color: #eeeeee;border-radius: 16px;padding: 5px 5px 5px 5px;margin-top: 10px;">
					<p style="text-align: left;font-weight: 700;">Keterangan Barang</p>
					<div class="row" style="text-align: left;">
						<div class="col-6">Total Records barang</div>
						<div class="col">: 
							<b>
								<?php 
								$query_    =mysqli_query($conn, "SELECT COUNT(Kode_Barang) FROM d_barang");
								$result_    =mysqli_fetch_array($query_);
								if(empty($result_['COUNT(Kode_Barang)'])){
									echo "0";
								}else{
									echo $result_['COUNT(Kode_Barang)'];
								} 
								?>
							</b>
						Records Barang</div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="tableFixHead">
					<table>
						<thead>
							<tr>
								<th>No</th>
								<th>No Bukti</th>
								<th>Tanggal</th>
								<th>Kode Barang</th>
								<th>Indikator</th>
								<th>Quantity</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no=1; 
							$mutasi    =mysqli_query($conn, "SELECT * FROM d_mutasi
								");
							while($row    =mysqli_fetch_array($mutasi)){
								?>
								<tr>
									<td><b><?=$no++?></b></td>
									<td><?=$row['No_Bukti']?></td>
									<td><?=$row['Tanggal']?></td>
									<td><?=$row['K_Barang']?></td>
									<td><?=$row['Indikator_K_M']?></td>
									<td><?=$row['Quantity']?> Barang</td>
									<td class="text-center">
										<a href="View_Mutasi.php?No_Bukti=<?=$row['No_Bukti']?>" class="btn btn-primary btn-sm mb-2">Lihat</a>
										<form action="" method="POST">
											<input type="text" value="<?=$row['No_Bukti']?>" name="hapus_kode" hidden>
											<button class="btn btn-danger btn-sm" name="delete">Delete</button>
										</form>
										<?php 
										if(isset($_POST['delete'])){
											$hapus_kode = $_POST['hapus_kode'];
											$del = mysqli_query($conn, "DELETE FROM d_mutasi WHERE No_Bukti='$hapus_kode'");
											if($del){
												echo "<script>alert('Data anda telah berhasil dihapus, Klik Ok untuk melanjutkan session');window.location='index.php'</script>";
											}else{
												$No_Bukti=$result['No_Bukti'];
												echo "<script>alert('Maaf data dengan kode ( $No_Bukti ) ini tidak dapat dihapus, Pastikan data mutasi yang terhubung dengan data barang sudah dihapus terlebih dahulu, jika sudah mengerti Klik Ok untuk melanjutkan session');window.location='index.php'</script>";
											}
										}?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div style="background-color: #eeeeee;border-radius: 16px;padding: 5px 5px 5px 5px;margin-top: 10px;">
					<p style="text-align: left;font-weight: 700;">Keterangan Mutasi</p>
					<div class="row" style="text-align: left;">
						<div class="col-6">Total keseluruhan Quantity mutasi</div>
						<div class="col">:
							<b>
								<?php 
								$query_    =mysqli_query($conn, "SELECT Quantity,SUM(Quantity) FROM d_mutasi");
								$result_    =mysqli_fetch_array($query_);
								if(empty($result_['SUM(Quantity)'])){
									echo "0";
								}else{
									echo $result_['SUM(Quantity)'];
								} 
								?>
							</b> 
							Barang
						</div>
					</div>
					<div class="row" style="text-align: left;">
						<div class="col-6">Total keseluruhan Records mutasi</div>
						<div class="col">:
							<b>
								<?php 
								$query_    =mysqli_query($conn, "SELECT COUNT(No_Bukti) FROM d_mutasi");
								$result_    =mysqli_fetch_array($query_);
								if(empty($result_['COUNT(No_Bukti)'])){
									echo "0";
								}else{
									echo $result_['COUNT(No_Bukti)'];
								} 
								?>
							</b> 
							Records
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- --------------------------------------------------------- -->


	</div>
</div>
<!--  -->


<?php include 'P_Bottom.php'; ?>