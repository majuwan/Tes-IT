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
			<h5>INPUT DATA BARANG</h5>
		</div>
		<!-- ----------------------------------------------------------------------------------------------------------------- -->
		<div onclick="hide()" class="alert alert-warning animate__animated animate__bounceInDown" id="error_" role="alert">
			<strong>Tampaknya!</strong> Kamu Belum Mengisi Seluruh Data
		</div>
		<!-- ----------------------------------------------------------------------------------------------------------------- -->

		<?php
		if(isset($_POST['simpan'])){
			$Kode_Barang = $_POST['Kode_Barang'];
			$Nama_Barang = $_POST['Nama_Barang'];
			$a=mysqli_query($conn,"insert into d_barang values('$Kode_Barang','$Nama_Barang')");
			if($a){
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong> Data Telah Tersimpan</strong> selamatkan menjalakan aktifitas.
				</div>';
				echo '<meta http-equiv="refresh" content="3;url=Input_Barang.php">';
			}else{
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong> Data Gagal Disimpan</strong> mungkin menggunakan Kode Barang Yang Baru.
				</div>';
				echo '<meta http-equiv="refresh" content="3;url=Input_Barang.php">';
			}
		}
		?>
		<form action="" method="POST">
			<div class="row POST">
				<div>
					Kode Barang
					<input type="text" class="from-control" name="Kode_Barang" id="Kode_Barang" placeholder="isi kode barang">
				</div>
				<div>
					Nama Barang
					<input type="text" class="from-control" name="Nama_Barang" id="Nama_Barang" placeholder="isi nama barang">
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
		var Kode_Barang = document.getElementById("Kode_Barang").value;
		var Nama_Barang = document.getElementById("Nama_Barang").value;
		if (Kode_Barang != "" && Nama_Barang != "") {
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