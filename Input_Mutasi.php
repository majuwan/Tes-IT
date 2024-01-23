<?php 
include 'connection.php'; 
include  'P_TOP.php';
?>

<!--  -->
<div class="content">
	<div class="baground-glass">
		
		<!-- --------------------------------------------------------- -->
		<style type="text/css">
			.POST{
				display: grid;
				width: 100%;
				grid-template-columns: 50% 50%;
				grid-gap: 1%;
				margin-bottom: 20px;
				font-family: monospace;
			}
			.POST_{
				display: grid;
				width: 100%;
				grid-template-columns: 20% 20% 20%;
				grid-gap: 2%;
				margin-bottom: 20px;
			}
			.POST input{
				border-radius: 8px;
				border: 1px solid;
				width: 90%;
				background-color: transparent;
				padding: 5px;
			}
			.POST select{
				border-radius: 8px;
				border: 1px solid;
				width: 90%;
				background-color: transparent;
				padding: 5px;
			}
			.tittle-report{
				position: absolute;
				right: 10%;
				top: 4%;
				text-shadow: 0px 0px 13px #2cb1f3;
			}	
			#error_ {
				display: none;
			}
		</style>

		<div class="tittle-report">
			<h5>INPUT DATA MUTASI</h5>
		</div>
		<!-- ----------------------------------------------------------------------------------------------------------------- -->
		<div onclick="hide()" class="alert alert-warning animate__animated animate__bounceInDown" id="error_" role="alert">
			<strong>Tampaknya!</strong> Kamu Belum Mengisi Seluruh Data
		</div>
		<!-- ----------------------------------------------------------------------------------------------------------------- -->

		<?php
		if(isset($_POST['simpan'])){
			$No_Bukti = $_POST['No_Bukti'];
			$Tanggal = $_POST['Tanggal'];
			$K_Barang = $_POST['K_Barang'];
			$Indikator_K_M = $_POST['Indikator_K_M'];
			$Quantity = $_POST['Quantity'];
			$a=mysqli_query($conn,"insert into d_mutasi values('$No_Bukti','$Tanggal','$K_Barang','$Indikator_K_M','$Quantity')");
			if($a){
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> Data Telah Tersimpan</strong> selamatkan menjalakan aktifitas.
				</div>';
				echo '<meta http-equiv="refresh" content="3;url=Input_Mutasi.php">';
			}
		}
		?>
		<form action="" method="POST">
			<div class="row POST">
				<div>
					No Bukti
					<input type="text" class="from-control" name="No_Bukti" id="No_Bukti" placeholder="isi kode barang">
				</div>
				<div>
					Tanggal
					<input type="date" class="from-control" name="Tanggal" id="Tanggal">
				</div>
				<div>
					Kode Barang
					<select name="K_Barang" id="K_Barang">
						<option selected disabled>Pilih Barang</option>
						<?php  
						$var    =mysqli_query($conn, "SELECT * FROM d_barang
							");
						while($result    =mysqli_fetch_array($var)){
							?>
							<option value="<?= $result['Kode_Barang'];?>">(<?= $result['Kode_Barang'];?>)"<?= $result['Nama_Barang'];?>"</option>
						<?php } ?>
					</select>
				</div>
				<div>
					Indikator Barang
					<select name="Indikator_K_M" id="Indikator_K_M">
						<option selected disabled>Pilih Kategori Indikator</option>
						<option value="Masuk">Barang Masuk</option>
						<option value="Keluar">Barang Keluar</option>
					</select>
				</div>
				<div>
					Quantity
					<input type="number" class="from-control" name="Quantity" id="Quantity" placeholder="isi jumlahnya">
				</div>
			</div>
			<div class="row POST_">
				<input  onClick="validasi()" type="button" value="Simpan" id="upload_" name="simpan" class="btn btn-success text-sm">
				<button class="btn btn-warning" type="reset">Cancel</button>
				<a href="../TES_IT/index.php" class="btn btn-primary">Kembali</a>
			</form>
		</div>

		<!-- --------------------------------------------------------- -->
	</div>
</div>

<script type="text/javascript">
	function validasi() {
		var No_Bukti = document.getElementById("No_Bukti").value;
		var Tanggal = document.getElementById("Tanggal").value;
		var K_Barang = document.getElementById("K_Barang").value;
		var Indikator_K_M = document.getElementById("Indikator_K_M").value;
		var Quantity = document.getElementById("Quantity").value;
		if (No_Bukti != "" && Tanggal != "" && K_Barang != "" && Indikator_K_M != "" && Quantity != "") {
			document.getElementById("upload_").type = "submit";
			return true;
		}else{
			$("#error_").addClass('animate__bounceInDown');
			$("#error_").removeClass('animate__bounceOutUp');
			document.getElementById("error_").style.display = "block";
			$("body").hover(function() {
				location.reload(); 
			});
			return false;
		}
	}
</script>
<script type="text/javascript">
	setTimeout(function () {
		$('#alert').alert('close');
	}, 3000);

	setTimeout(function () {
		document.getElementById("error_").style.display = "none";
		$("#error_").removeClass('animate__bounceInDown');
		$("#error_").addClass('animate__bounceOutUp');
	}, 6000);

	function hide() {
		document.getElementById("error_").style.display = "none";
	}
</script>

<?php include 'P_Bottom.php'; ?>