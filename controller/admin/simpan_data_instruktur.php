<?php
//Include file koneksi ke database
include "../../config/koneksi.php";
include "../../config/config.php";

$folderUpload = "../../assets/img/upload";

# simpan masing-masing file ke dalam array 
# dan casting menjadi objek
$fileFoto = (object) @$_FILES['foto'];
$fileKtp = (object) @$_FILES['ktp'];
$fileNpwp = (object)  @$_FILES['npwp'];

if($fileFoto->name==''){
	$fileFoto->name = 'foto.jpg';
}
if($fileKtp->name==''){
	$fileKtp->name = 'ktp.jpg';
}
if($fileNpwp->name==''){
	$fileNpwp->name = 'npwp.jpg';
}

//menerima nilai dari kiriman form input-barang 
$nama=$_POST['nama'];
$email=$_POST['email'];
$telepon=$_POST['telepon'];
$jabatan=$_POST['jabatan'];
$diklat=$_POST['diklat'];
$alamat=$_POST['alamat'];
$no_ktp=$_POST['no_ktp'];
$no_npwp=$_POST['no_npwp'];
$cv=$_POST['cv'];

//Apakah wajib dikonversi menjadi objek? Tidak. Tidak wajib. Kita tetap bisa menggunakan tipe data aslinya yaitu array. Saya mengkonversinya ke dalam objek hanya karena saya lebih suka menggunakan tanda panah -> dari pada tanda kurung siku [] untuk mengakses data

// echo $nama;
// echo $email;
// echo $telepon;
// echo $jabatan;
// echo $diklat;
// echo $alamat;
// echo $no_ktp;
// echo $no_npwp;
// echo $cv;
 
//Query input menginput data kedalam tabel barang
  $query="INSERT INTO tb_instruktur(nama,email,telepon,jabatan,id_diklat,no_ktp,no_npwp,alamat,cv,foto,file_ktp,file_npwp) 
  		  VALUES('$nama','$email','$telepon','$jabatan','$diklat','$no_ktp','$no_npwp','$alamat','$cv','$fileFoto->name','$fileKtp->name','$fileNpwp->name')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$query);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
  	// echo "berhasil";

  	# mulai upload file
	$uploadFotoSukses = move_uploaded_file(
		$fileFoto->tmp_name, "{$folderUpload}/{$fileFoto->name}"
	);

	$uploadKtpSukses = move_uploaded_file(
		$fileKtp->tmp_name, "{$folderUpload}/{$fileKtp->name}"	
	);

	$uploadNpwpSukses = move_uploaded_file(
		$fileNpwp->tmp_name, "{$folderUpload}/{$fileNpwp->name}"
	);

	// if ($uploadFotoSukses) {
	// 	$link = "{$folderUpload}/{$fileFoto->name}";
	// 	echo "Sukses Upload Foto: <a href='{$link}'>{$fileFoto->name}</a>";
	// 	echo "<br>";
	// }

	// if ($uploadKtpSukses) {
	// 	$link = "{$folderUpload}/{$fileKtp->name}";
	// 	echo "Sukses Upload KTP: <a href='{$link}'>{$fileKtp->name}</a>";
	// 	echo "<br>";
	// }

	// if ($uploadNpwpSukses) {
	// 	$link = "{$folderUpload}/{$fileNpwp->name}";
	// 	echo "Sukses Upload NPWP: <a href='{$link}'>{$fileNpwp->name}</a>";
	// 	echo "<br>";
	// }

	header('location: '.SERVER.'admin/instruktur/tambah?feedback=1');
	exit;
  }
else {
	// echo "gagal";
	header('location: '.SERVER.'admin/instruktur/tambah?feedback=2');	
	exit;
}  

?>