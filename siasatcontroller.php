<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siasatcontroller extends Controller
{
    //
	public function home()
	{
		session_start();
		if(isset($_SESSION['username'])){
			return view('home');
		}elseif(!isset($_SESSION['username'])){
			return view('login');
		}

	}
	public function login()
	{
		session_start();
		return view('login');
	}
//Login
	public function ceklogin(Request $req){
		if (isset($req->username) && isset($req->password)) {
			session_start();
			$a = $req->username;
			$b = $req->password;
			$login = DB::select("select*from login where username='$a'");
			$login1 = DB::select("select*from login where password='$b'");
			['login'=>$login];
			['login1'=>$login1];
			if ($login==true && $login1==true ) {
				foreach ($login as $user){
					csrf_field();
					if(isset($user->password) && isset($user->username)){
						if(isset($_SESSION['gagal'])){
							session_destroy();
						}
						$_SESSION['username']=$user->username;
						$_SESSION['sks']=$user->sks;
						$_SESSION['nama']=$user->nama;
						$_SESSION['fakultas']=$user->fakultas;
						$_SESSION['Semester']=$user->Semester;
						$_SESSION['Tahun']=$user->Tahun;
						return redirect('siasat/home');
					}else{
						$gagal = 'Anda gagal masuk !';
						$_SESSION['gagal'] = $gagal;
						return redirect('siasat/login');
					}
				}
			}else{
				$gagal = 'Anda gagal masuk !';
				$_SESSION['gagal'] = $gagal;
				return redirect('siasat/login');
			}
		}else{
			$gagal = 'Anda gagal masuk !';
			$_SESSION['gagal'] = $gagal;
			return redirect('siasat/login');
		}
	}
  //logout 
	public function hapussession(){
		session_start();
		session_destroy();
		return redirect('siasat/login');
	}
	public function regristrasi(){
		session_start();
		$kelompok = DB::select("select matkul,kodematkul,sks,prodi from matakuliah group by matkul,kodematkul,sks,prodi");
		return view('regristrasi',['kelompok'=>$kelompok]);
	}
	public function lengkap($kodematkul){
		session_start();
		$jenis = DB::select("select*from matakuliah where kodematkul='$kodematkul'");
		return view('matakuliah',['jenis'=>$jenis]);
	}
	public function cekout($kode){ 
		session_start();
		$nama = $_SESSION['nama'];
		$jenis1 = DB::select("select*from matakuliah where kode='$kode'");
		$jenis6 = DB::select("select SUM(sks) AS jumlah from matakuliah where kode='$kode'");
		$jenis2 = DB::select("select*from matkul_maha where nama_mahasiswa='$nama'");
		$jenis3 = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
		$jenis4 = DB::select("select count(banyak_kelas) AS total from matakuliah where kode='$kode'");
		$jenis5 = DB::select("select count(banyak_kelas) AS total from matkul_maha where kode='$kode'AND nama_mahasiswa='$nama' ");
		
		$sks=$_SESSION['sks'];
		foreach ($jenis3 as $key3) {
			$hasil = $key3->jumlah;
		}
		foreach ($jenis4 as $key4) {
			$hasil1 = $key4->total;
		}
		foreach ($jenis5 as $key5) {
			$hasil2 = $key5->total;
		}
		foreach ($jenis6 as $key6) {
			$hasil3 = $key6->jumlah;
		}
		$n = (int)$hasil1;
		$m = (int)$hasil2;
		$i = (int)$hasil3;
		$r = $i+$n;
		$num0 = (int)$hasil;
		$num = (int)$sks;
		foreach ($jenis1 as $key) {
			if ($num0==0) {
				DB::table('matkul_maha')->insert(
					[
						'Nama_dosen'=>$key->Dosen,
						'Matkul'=>$key->matkul,
						'kelas'=>$key->kelas,
						'hari'=>$key->hari,
						'waktu1'=>$key->waktu1,
						'waktu2'=>$key->waktu2,
						'nilai'=>0,
						'sks'=>$key->sks,
						'nama_mahasiswa'=>$_SESSION['nama'],
						'semester'=> $key->semester,
						'kode'=> $key->kode,
						'Tahun' => $key->Tahun,
						'share'=> $key->share,
						'Tahun' => $key->Tahun,
						'prodi'=> $key->prodi,
						'fakultas' => $key->fakultas,
						'banyak_Kelas' => $key->banyak_kelas
					]
				);
			}
		}
		if ($n==1 && $m < $n) {
			foreach ($jenis1 as $key1) {
				foreach ($jenis2 as $key2) {
					if ($num0 < $num) {
						$hari1=$key1->hari;
						$hari2=$key2->hari;
						$waktu1=$key1->waktu1;
						$waktu2=$key2->waktu1;
						$waktu11=$key1->waktu2;
						$waktu22=$key2->waktu2;
						$matkul1=$key1->matkul;
						$matkul2=$key2->Matkul;
						if ($hari1 == $hari2 && $waktu1 < $waktu2 && $waktu11 < $waktu2 || $waktu1 > $waktu22 && $waktu11 > $waktu22) {
							DB::table('matkul_maha')->insert(
								[
									'Nama_dosen'=>$key1->Dosen,
									'Matkul'=>$key1->matkul,
									'kelas'=>$key1->kelas,
									'hari'=>$key1->hari,
									'waktu1'=>$key1->waktu1,
									'waktu2'=>$key1->waktu2,
									'nilai'=>0,
									'sks'=>$key->sks,
									'nama_mahasiswa'=>$_SESSION['nama'],
									'semester'=> $key1->semester,
									'kode'=> $key1->kode,
									'Tahun' => $key1->Tahun,
									'share'=> $key1->share,
									'Tahun' => $key1->Tahun,
									'prodi'=> $key1->prodi,
									'fakultas' => $key1->fakultas,
									'banyak_Kelas' => $key1->banyak_kelas
								]
							);
							$sks = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
							foreach ($sks as $key10) {
								$y = $key10->jumlah;
							}
							$p = (int)$y; 
							if ($p < $num){
								return redirect('siasat/regristrasi');
							}else{
								DB::select("delete from matkul_maha where kode='$kode' AND nama_mahasiswa='$nama'");
								return redirect('siasat/regristrasi');
							}
						}elseif($hari1 != $hari2){
							$jenis6 = DB::select("select count(waktu2) AS total from  matkul_maha where kode='$kode' AND waktu1='$waktu1' AND waktu2='$waktu11'");
							foreach ($jenis6 as $key0) {
								$total11 = $key0->total;
							}
							$a = (int)'$total11';
							if ($a == 0 ) {
								DB::table('matkul_maha')->insert(
									[
										'Nama_dosen'=>$key1->Dosen,
										'Matkul'=>$key1->matkul,
										'kelas'=>$key1->kelas,
										'hari'=>$key1->hari,
										'waktu1'=>$key1->waktu1,
										'waktu2'=>$key1->waktu2,
										'nilai'=>0,
										'sks'=>$key1->sks,
										'nama_mahasiswa'=>$_SESSION['nama'],
										'semester'=> $key1->semester,
										'kode'=> $key1->kode,
										'Tahun' => $key1->Tahun,
										'share'=> $key1->share,
										'Tahun' => $key1->Tahun,
										'prodi'=> $key1->prodi,
										'fakultas' => $key1->fakultas,
										'banyak_Kelas' => $key1->banyak_kelas
									]
								);
								$sks1 = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
								foreach ($sks1 as $key11) {
									$x = $key11->jumlah;
								}
								$q = (int)$x; 
								if ($q < $num){
									return redirect('siasat/regristrasi');
								}else{
									DB::select("delete from matkul_maha where kode='$kode' AND nama_mahasiswa='$nama'");
									return redirect('siasat/regristrasi');
								}
							}else{
								return redirect('siasat/regristrasi');
							}
						}else{
							return redirect('siasat/regristrasi');
						}
					}else{
						return redirect('siasat/regristrasi');
					}
				}
			}
		}elseif ($m < $n && $n > 1) {
			foreach ($jenis1 as $key3) {
				foreach ($jenis2 as $key4) {		
					$hari1=$key3->hari;
					$hari2=$key4->hari;
					$waktu1=$key3->waktu1;
					$waktu2=$key4->waktu1;
					$waktu11=$key3->waktu2;
					$waktu22=$key4->waktu2;
					if ($num0 < $num ) {
						if ($hari1 == $hari2 && $waktu1 < $waktu2 && $waktu11 < $waktu2 || $waktu1 > $waktu22 && $waktu2 > $waktu22) {
							DB::table('matkul_maha')->insert(
								[
									'Nama_dosen'=>$key3->Dosen,
									'Matkul'=>$key3->matkul,
									'kelas'=>$key3->kelas,
									'hari'=>$key3->hari,
									'waktu1'=>$key3->waktu1,
									'waktu2'=>$key3->waktu2,
									'nilai'=>0,
									'sks'=>$key3->sks,
									'nama_mahasiswa'=>$_SESSION['nama'],
									'semester'=> $key3->semester,
									'kode'=> $key3->kode,
									'Tahun' => $key3->Tahun,
									'share'=> $key3->share,
									'Tahun' => $key3->Tahun,
									'prodi'=> $key3->prodi,
									'fakultas' => $key3->fakultas,
									'banyak_Kelas' => $key3->banyak_kelas
								]
							);
						}elseif($hari1 != $hari2){
							$hari=$key3->hari;
							echo $hari;
							$waktu1 = $key3->waktu1;
							$waktu2 = $key3->waktu2;
							$jenis7 = DB::select("select count(kode) AS total from matakuliah where kode='$kode'");
							$jenis10 = DB::select("select count(kode) AS total from matkul_maha where kode='$kode' AND nama_mahasiswa='$nama'");
							foreach ($jenis7 as $key0) {
								$total111 = $key0->total;
							}
							foreach ($jenis10 as $key8) {
								$total112 = $key8->total;
							}
							$b = (int)$total111;
							$c = (int)$total112;
							if ($c < $b) {
								DB::table('matkul_maha')->insert(
									[
										'Nama_dosen'=>$key3->Dosen,
										'Matkul'=>$key3->matkul,
										'kelas'=>$key3->kelas,
										'hari'=>$key3->hari,
										'waktu1'=>$key3->waktu1,
										'waktu2'=>$key3->waktu2,
										'nilai'=>0,
										'sks'=>$key3->sks,
										'nama_mahasiswa'=>$_SESSION['nama'],
										'semester'=> $key3->semester,
										'kode'=> $key3->kode,
										'Tahun' => $key3->Tahun,
										'share'=> $key3->share,
										'Tahun' => $key3->Tahun,
										'prodi'=> $key3->prodi,
										'fakultas' => $key3->fakultas,
										'banyak_Kelas' => $key3->banyak_kelas
									]
								);
								break;
							}else{
								return redirect('siasat/regristrasi');
							}
						}
					}else{
						return redirect('siasat/regristrasi');
					}
				}
			}
		}
		$jenis11 = DB::select("select count(kode) AS total from matakuliah where kode='$kode'");
		$jenis12 = DB::select("select count(kode) AS total from matkul_maha where kode='$kode' AND nama_mahasiswa='$nama'");
		foreach ($jenis11 as $key10) {
			$total1111 = $key10->total;
		}
		foreach ($jenis12 as $key18) {
			$total1112 = $key18->total;
		}
		$d = (int)$total1111;
		$e = (int)$total1112;


		if ($e < $d && $num > $num0) {
			$jenis11 = DB::select("delete from matkul_maha where kode='$kode' AND nama_mahasiswa='$nama'");
			return redirect('siasat/regristrasi');
		}else{
			return redirect('siasat/regristrasi');
		}
	}
	public function matakuliah_share(){
		session_start();
		$kelompok1 = DB::select("select matkul,kodematkul,sks,prodi from matakuliah where share = 'ya' group by matkul,kodematkul,sks,prodi");
		return view('matakuliah_share',['kelompok1'=>$kelompok1]);
	}
	public function matkul($kode1){
		session_start();
		$jenis1 = DB::select("select*from matakuliah where kodematkul='$kode1'");
		return view('matkul2',['jenis1'=>$jenis1]);
	}
	public function matkul2($kode2){ 
		session_start();
		$nama = $_SESSION['nama'];
		$jenis1 = DB::select("select*from matakuliah where kode='$kode2'");
		$jenis6 = DB::select("select SUM(sks) AS jumlah from matakuliah where kode='$kode2'");
		$jenis2 = DB::select("select*from matkul_maha where nama_mahasiswa='$nama'");
		$jenis3 = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
		$jenis4 = DB::select("select count(banyak_kelas) AS total from matakuliah where kode='$kode2'");
		$jenis5 = DB::select("select count(banyak_kelas) AS total from matkul_maha where kode='$kode2'AND nama_mahasiswa='$nama' ");
		
		$sks=$_SESSION['sks'];
		foreach ($jenis3 as $key3) {
			$hasil = $key3->jumlah;
		}
		foreach ($jenis4 as $key4) {
			$hasil1 = $key4->total;
		}
		foreach ($jenis5 as $key5) {
			$hasil2 = $key5->total;
		}
		foreach ($jenis6 as $key6) {
			$hasil3 = $key6->jumlah;
		}
		$n = (int)$hasil1;
		$m = (int)$hasil2;
		$i = (int)$hasil3;
		$r = $i+$n;
		$num0 = (int)$hasil;
		$num = (int)$sks;
		foreach ($jenis1 as $key) {
			if ($num0==0) {
				DB::table('matkul_maha')->insert(
					[
						'Nama_dosen'=>$key->Dosen,
						'Matkul'=>$key->matkul,
						'kelas'=>$key->kelas,
						'hari'=>$key->hari,
						'waktu1'=>$key->waktu1,
						'waktu2'=>$key->waktu2,
						'nilai'=>0,
						'sks'=>$key->sks,
						'nama_mahasiswa'=>$_SESSION['nama'],
						'semester'=> $key->semester,
						'kode'=> $key->kode,
						'Tahun' => $key->Tahun,
						'share'=> $key->share,
						'Tahun' => $key->Tahun,
						'prodi'=> $key->prodi,
						'fakultas' => $key->fakultas,
						'banyak_Kelas' => $key->banyak_kelas
					]
				);
			}
		}
		if ($n==1 && $m < $n) {
			foreach ($jenis1 as $key1) {
				foreach ($jenis2 as $key2) {
					if ($num0 < $num) {
						$hari1=$key1->hari;
						$hari2=$key2->hari;
						$waktu1=$key1->waktu1;
						$waktu2=$key2->waktu1;
						$waktu11=$key1->waktu2;
						$waktu22=$key2->waktu2;
						$matkul1=$key1->matkul;
						$matkul2=$key2->Matkul;
						if ($hari1 == $hari2 && $waktu1 < $waktu2 && $waktu11 < $waktu2 || $waktu1 > $waktu22 && $waktu11 > $waktu22) {
							DB::table('matkul_maha')->insert(
								[
									'Nama_dosen'=>$key1->Dosen,
									'Matkul'=>$key1->matkul,
									'kelas'=>$key1->kelas,
									'hari'=>$key1->hari,
									'waktu1'=>$key1->waktu1,
									'waktu2'=>$key1->waktu2,
									'nilai'=>0,
									'sks'=>$key->sks,
									'nama_mahasiswa'=>$_SESSION['nama'],
									'semester'=> $key1->semester,
									'kode'=> $key1->kode,
									'Tahun' => $key1->Tahun,
									'share'=> $key1->share,
									'Tahun' => $key1->Tahun,
									'prodi'=> $key1->prodi,
									'fakultas' => $key1->fakultas,
									'banyak_Kelas' => $key1->banyak_kelas
								]
							);
							$sks = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
							foreach ($sks as $key10) {
								$y = $key10->jumlah;
							}
							$p = (int)$y; 
							if ($p < $num){
								return redirect('siasat/matakuliah_share');
							}else{
								DB::select("delete from matkul_maha where kode='$kode2' AND nama_mahasiswa='$nama'");
								return redirect('siasat/matakuliah_share');
							}			
						}elseif($hari1 != $hari2){
							$jenis6 = DB::select("select count(waktu2) AS total from  matkul_maha where kode='$kode2' AND waktu1='$waktu1' AND waktu2='$waktu11'");
							foreach ($jenis6 as $key0) {
								$total11 = $key0->total;
							}
							$a = (int)'$total11';
							if ($a == 0 ) {
								DB::table('matkul_maha')->insert(
									[
										'Nama_dosen'=>$key1->Dosen,
										'Matkul'=>$key1->matkul,
										'kelas'=>$key1->kelas,
										'hari'=>$key1->hari,
										'waktu1'=>$key1->waktu1,
										'waktu2'=>$key1->waktu2,
										'nilai'=>0,
										'sks'=>$key1->sks,
										'nama_mahasiswa'=>$_SESSION['nama'],
										'semester'=> $key1->semester,
										'kode'=> $key1->kode,
										'Tahun' => $key1->Tahun,
										'share'=> $key1->share,
										'Tahun' => $key1->Tahun,
										'prodi'=> $key1->prodi,
										'fakultas' => $key1->fakultas,
										'banyak_Kelas' => $key1->banyak_kelas
									]
								);
								$sks1 = DB::select("select SUM(sks) AS jumlah from matkul_maha where nama_mahasiswa='$nama'");
								foreach ($sks1 as $key11) {
									$x = $key11->jumlah;
								}
								$q = (int)$x; 
								if ($q < $num){
									return redirect('siasat/matakuliah_share');
								}else{
									DB::select("delete from matkul_maha where kode='$kode2' AND nama_mahasiswa='$nama'");
									return redirect('siasat/matakuliah_share');
								}
							}else{
								return redirect('siasat/matakuliah_share');
							}
						}else{
							return redirect('siasat/matakuliah_share');
						}
					}else{
						return redirect('siasat/matakuliah_share');
					}
				}
			}
		}elseif ($m < $n && $n > 1) {
			foreach ($jenis1 as $key3) {
				foreach ($jenis2 as $key4) {
					
					if ($num0 < $num) {
						$hari1=$key3->hari;
						$hari2=$key4->hari;
						$waktu1=$key3->waktu1;
						$waktu2=$key4->waktu1;
						$waktu11=$key3->waktu2;
						$waktu22=$key4->waktu2;

						if ($hari1 == $hari2 && $waktu1 < $waktu2 && $waktu11 < $waktu2 || $waktu1 > $waktu22 && $waktu2 > $waktu22) {
							DB::table('matkul_maha')->insert(
								[
									'Nama_dosen'=>$key3->Dosen,
									'Matkul'=>$key3->matkul,
									'kelas'=>$key3->kelas,
									'hari'=>$key3->hari,
									'waktu1'=>$key3->waktu1,
									'waktu2'=>$key3->waktu2,
									'nilai'=>0,
									'sks'=>$key3->sks,
									'nama_mahasiswa'=>$_SESSION['nama'],
									'semester'=> $key3->semester,
									'kode'=> $key3->kode,
									'Tahun' => $key3->Tahun,
									'share'=> $key3->share,
									'Tahun' => $key3->Tahun,
									'prodi'=> $key3->prodi,
									'fakultas' => $key3->fakultas,
									'banyak_Kelas' => $key3->banyak_kelas
								]
							);
							
						}elseif($hari1 != $hari2){
							$hari=$key3->hari;
							echo $hari;
							$waktu1 = $key3->waktu1;
							$waktu2 = $key3->waktu2;
							$jenis7 = DB::select("select count(kode) AS total from matakuliah where kode='$kode2'");
							$jenis10 = DB::select("select count(kode) AS total from matkul_maha where kode='$kode2' AND nama_mahasiswa='$nama'");
							foreach ($jenis7 as $key0) {
								$total111 = $key0->total;
							}
							foreach ($jenis10 as $key8) {
								$total112 = $key8->total;
							}
							$b = (int)$total111;
							$c = (int)$total112;
							if ($c < $b) {
								DB::table('matkul_maha')->insert(
									[
										'Nama_dosen'=>$key3->Dosen,
										'Matkul'=>$key3->matkul,
										'kelas'=>$key3->kelas,
										'hari'=>$key3->hari,
										'waktu1'=>$key3->waktu1,
										'waktu2'=>$key3->waktu2,
										'nilai'=>0,
										'sks'=>$key3->sks,
										'nama_mahasiswa'=>$_SESSION['nama'],
										'semester'=> $key3->semester,
										'kode'=> $key3->kode,
										'Tahun' => $key3->Tahun,
										'share'=> $key3->share,
										'Tahun' => $key3->Tahun,
										'prodi'=> $key3->prodi,
										'fakultas' => $key3->fakultas,
										'banyak_Kelas' => $key3->banyak_kelas
									]
								);
								break;
							}else{
								return redirect('siasat/matakuliah_share');
							}
						}
					}else{
						return redirect('siasat/matakuliah_share');
					}
				}
			}
		}
		$jenis11 = DB::select("select count(kode) AS total from matakuliah where kode='$kode2'");
		$jenis12 = DB::select("select count(kode) AS total from matkul_maha where kode='$kode2' AND nama_mahasiswa='$nama'");
		foreach ($jenis11 as $key10) {
			$total1111 = $key10->total;
		}
		foreach ($jenis12 as $key18) {
			$total1112 = $key18->total;
		}
		$d = (int)$total1111;
		$e = (int)$total1112;
		echo $d;
		echo $e;
		if ($e < $d) {
			$jenis11 = DB::select("delete from matkul_maha where kode='$kode2' AND nama_mahasiswa='$nama'");
			return redirect('siasat/matakuliah_share');
		}else{
			return redirect('siasat/matakuliah_share');
		}
	}
	public function kartu_study(){
		session_start();
		$nama = $_SESSION['nama'];
		$Tahun = $_SESSION['Tahun'];
		$semester = $_SESSION['Semester'];
		$kartu = DB::select("select*from matkul_maha where tahun='$Tahun' AND semester='$semester' AND nama_mahasiswa='$nama'");
		return view('kartu_study',['kartu'=>$kartu]);
	}
	public function hapus1($kode3){
		session_start();
		$nama = $_SESSION['nama'];
		$Tahun = $_SESSION['Tahun'];
		$semester = $_SESSION['Semester'];
		$hapus = DB::select("delete from matkul_maha where kode='$kode3' AND tahun='$Tahun' AND semester='$semester' AND nama_mahasiswa='$nama'");
		return redirect('siasat/kartu_study');
	}
	public function jadwal(){
		session_start();
		$nama = $_SESSION['nama'];
		$Tahun = $_SESSION['Tahun'];
		$semester = $_SESSION['Semester'];
		$kartu1 = DB::select("select*from matkul_maha where tahun='$Tahun' AND semester='$semester' AND nama_mahasiswa='$nama'");
		return view('jadwal',['kartu1'=>$kartu1]);

	}
	
	public function Dosen()
	{
		session_start();
		if(isset($_SESSION['username'])){
			return view('Dosen');
		}elseif(!isset($_SESSION['username'])){
			return view('login_dosen');
		}
	}
	
	public function login_dosen()
	{
		session_start();
		return view('login_dosen');
	}

	public function login_dosen1(Request $req){
		if (isset($req->username) && isset($req->password)) {
			session_start();
			$a = $req->username;
			$b = $req->password;
			$login = DB::select("select*from dosen where username='$a'");
			$login1 = DB::select("select*from dosen where password='$b'");
			['login'=>$login];
			['login1'=>$login1];
			if ($login==true && $login1==true ) {
				foreach ($login as $user){
					csrf_field();
					if(isset($user->password) && isset($user->username)){
						if(isset($_SESSION['gagal'])){
							session_destroy();
						}
						$_SESSION['username']=$user->username;
						$_SESSION['nama']=$user->nama;
						$_SESSION['fakultas']=$user->fakultas;
						$_SESSION['Semester']=$user->semester;
						$_SESSION['Tahun']=$user->tahun;
						return redirect('siasat/Dosen');
					}else{
						$gagal = 'Anda gagal masuk !';
						$_SESSION['gagal'] = $gagal;
						return redirect('siasat/login_dosen');
					}
				}
			}else{
				$gagal = 'Anda gagal masuk !';
				$_SESSION['gagal'] = $gagal;
				return redirect('siasat/login_dosen');
			}
		}else{
			$gagal = 'Anda gagal masuk !';
			$_SESSION['gagal'] = $gagal;
			return redirect('siasat/login_dosen');
		}
	}

	public function hapussession1(){
		session_start();
		session_destroy();
		return redirect('siasat/login_dosen');
	}
	public function dosen_kelas(){
		session_start();
		return view('dosen_kelas');
	}
	public function kode_kelas(){
		session_start();
		$jenis1 = DB::select("select*from daftar_matkul");
		return view('daftar_matkul',['jenis1'=>$jenis1]);
	}
	public function proses_kelas(Request $req){
		csrf_field();
		session_start();
		$b = $req->Matkul;
		$_SESSION['MATKUL'] = $b;
		$c = $req->Kelas;
		$_SESSION['KELAS'] = $c;
		$d = $req->Kode_Matkul;
		$_SESSION['KODE_MATAKULIAH'] = $d;
		$f = $req->SKS;
		$_SESSION['SKS'] = $f;
		$g = $req->Semester;
		$_SESSION['SEMESTER'] = $g;
		$m = $req->Tahun;
		$_SESSION['TAHUN'] = $m;
		$h = $req->Share;
		$_SESSION['SHARE'] = $h;
		$i = $req->Prodi;
		$_SESSION['PRODI'] = $i;
		$j = $req->Fakultas;
		$_SESSION['FAKULTAS'] = $j;
		$k = $req->Banyak_Kelas;
		$_SESSION['BANYAK_KELAS '] = $k;
		return redirect('siasat/akhir');
	}
	public function akhir(){
		session_start();
		return view('akhir');	
	}

	public function input_kelas(Request $req){
		session_start(); 
		$jenis8 = DB::select("select max(kode) AS total from matakuliah");
		foreach ($jenis8 as $value) {
			$hasil = $value->total;
		}
		$int = (int)$hasil;
		$kode = $int+1;
		$t = $_SESSION['BANYAK_KELAS '];
		$y = (int)$t;
		$kelas1 = $_SESSION['KELAS'];
		$nama1 = $_SESSION['nama'];
		$mat1 = $_SESSION['MATKUL'];
		$ji1 = DB::select("select count(matkul) AS jumlah1 from matakuliah where Dosen='$nama1' and matkul='$mat1' and kelas='$kelas1'");
		foreach ($ji1 as $key11) {
			$ji2 = $key11->jumlah1;
		}
		$vi = (int)$ji2;
		if($vi == 0){
			for ($z=1; $z <= $y; $z++) { 
				$r = "Hari$z";
				$f = "Waktu_1$z";
				$g = "Waktu_2$z";
				$h = $req->$r;
				$i = $req->$f;
				$j = $req->$g;
				$matakuliah = $_SESSION['MATKUL'];
				$kelas = $_SESSION['KELAS'];
				$nama = $_SESSION['nama'];
				$ji = DB::select("select*from matakuliah where Dosen='$nama'");
				$score = 0;
				foreach ($ji as $keye) {
					$hari = $keye->hari;
					$waktu1 = $keye->waktu1;
					$waktu2 = $keye->waktu2;
					if($hari == $h && $waktu1 <= $i && $waktu2 >= $i && $waktu1 <= $j  && $waktu2 >= $j){
						$score++;
					}elseif($hari == $h && $waktu1 == $i && $waktu2 == $j){
						$score++;
					}elseif($hari == $h && $i <= $waktu1 && $j >= $waktu2){
						$score++;
					}
					elseif($hari == $h && $i >= $waktu1 && $i <= $waktu2 && $j >= $waktu2 ){
						$score++;
					}
					elseif($hari == $h && $j >= $waktu1 && $j <= $waktu2 && $i <= $waktu1 ){
						$score++;
					}
				}
				if($score == 0){
					DB::table('matakuliah')->insert(
						[
							'matkul'=>$_SESSION['MATKUL'],
							'kode'=>$kode,
							'kelas'=>$_SESSION['KELAS'],
							'kodematkul'=>$_SESSION['KODE_MATAKULIAH'],
							'Dosen'=> $_SESSION['nama'],
							'hari'=>$h,
							'waktu1'=>$i,
							'waktu2'=>$j,
							'sks'=> $_SESSION['SKS'],
							'semester'=> $_SESSION['SEMESTER'],
							'Tahun' => $_SESSION['TAHUN'],
							'share'=> $_SESSION['SHARE'],
							'prodi' => $_SESSION['PRODI'],
							'fakultas' => $_SESSION['FAKULTAS'],
							'banyak_Kelas' => $z
						]
					);
				}
			}
		}else{
			return redirect('siasat/dosen_kelas');
		}
		$ji2 = DB::select("select count(matkul) AS jumlah1 from matakuliah where Dosen='$nama1' and matkul='$mat1' and kelas='$kelas1'");
		foreach ($ji2 as $key12) {
			$jl = $key12->jumlah1;
		}
		$vi1 = (int)$jl;
		if ($y > $vi1) {
			DB::select("delete from matakuliah where Dosen='$nama1' AND matkul='$mat1' AND kelas='$kelas1'");
			return redirect('siasat/dosen_kelas');
		}else{
			return redirect('siasat/dosen_kelas');
		}
	}
	public function tampilkan(){
		session_start();
		$nama1 = $_SESSION['nama'];
		$kelompok = DB::select("select matkul,kode,sks,prodi,kelas from matakuliah where Dosen='$nama1' group by matkul,kode,sks,prodi,kelas");
		return view('tampilkan',['jenis1'=>$kelompok]);
	}
	public function hapus($hapus){
		session_start();
		$nama1 = $_SESSION['nama'];
		$mat1 = $_SESSION['MATKUL'];
		DB::select("delete from matakuliah where Dosen='$nama1' AND matkul='$mat1' AND kode='$hapus'");
		DB::select("delete from matkul_maha where Nama_dosen='$nama1' AND Matkul='$mat1' AND kode='$hapus'");
		return redirect('siasat/tampilkan');
	}
	public function tampilkan1($tampilkan1){
		session_start();
		$sill = DB::select("select*from matkul_maha where kode='$tampilkan1' and banyak_kelas='1'");
		return view('tampilkan1',['je'=>$sill]);

	}
	public function nilai($nilai){
		session_start();
		$nama = $_SESSION['nama_mahasiswa'];
		if (!isset($nama)) {
			return view('tampilan1');	
		}
		$r = $nilai;
		$_SESSION["nilai"] = $r;
		return view('nilai');	
	}
	public function masukkan_nilai(Request $req){
		session_start();
		$r = $_SESSION['nama_mahasiswa'];
		$v = $req->nilai;
		$f = $_SESSION["nilai"];
		if($v == "A"){
			$R = 4;
		}else if($v == "AB"){
			$R = 3.6;
		}else if($v == "B"){
			$R = 3.2;
		}else if($v == "BC"){
			$R = 2.8;
		}else if($v == "C"){
			$R = 2.4;
		}else if($v == "DC"){
			$R = 2.0;
		}else if($v == "E"){
			$R = 1.6;
		}
		DB::update("update matkul_maha SET nilai='$v',nilai1='$R' where nama_mahasiswa='$r' and kode='$f' and banyak_kelas='1'");
		unset($_SESSION["nilai"]);
		unset($_SESSION['nama_mahasiswa']);
		return redirect('siasat/tampilkan1/'.$f);
	}
	public function hasil_nilai(){
		session_start();
		$L = $_SESSION['nama_mahasiswa'];
		$O = $_SESSION['Tahun'];
		$P =$_SESSION['Semester'];
		$sill = DB::select("select*from matkul_maha where banyak_kelas='1' and nama_mahasiswa='$L' and semester='$P' and tahun='$O'");
		return view('hasil_nilai',['je'=>$sill]);
	}
	public function transkrip(){
		session_start();
		$L = $_SESSION['nama_mahasiswa'];
		$O = $_SESSION['Tahun'];
		$P =$_SESSION['Semester'];
		$sill = DB::select("select*from matkul_maha where banyak_kelas='1' and nama_mahasiswa='$L'");
		return view('transkrip',['je'=>$sill]);
	}
}

