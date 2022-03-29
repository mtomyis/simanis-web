<?php
	$status = 0;
	$id = $this->session->userdata('id');

	$user = array(
            "id" => $id
        );

    $xif = $this->db->get_where("pengguna", $user)->num_rows();
    $x = $this->db->get_where("pengguna", $user)->row();

    switch ($x->posisi) {
        case "PPK":
            $posisinya = "fk_id_ppk";
            $status = "status_ppk";
            $sql1 = "SELECT new_pekerjaan_detail.proyek, new_minggu.minggu FROM new_pekerjaan_detail join new_minggu on new_pekerjaan_detail.proyek = new_minggu.proyek WHERE new_pekerjaan_detail.{$posisinya} = '{$id}' AND new_minggu.{$status} = 1";

		    $query1 = $this->db->query($sql1);
		    if ($query1->num_rows() > 0) {
		        $status = $query1->num_rows();
		    }elseif ($query1->num_rows() == 0) {
		        $status = 0;
		    }
        break;
        case "KPA":
            $posisinya = "fk_id_kpa";
            $status = "status_kpa";
            $sql1 = "SELECT new_pekerjaan_detail.proyek, new_minggu.minggu FROM new_pekerjaan_detail join new_minggu on new_pekerjaan_detail.proyek = new_minggu.proyek WHERE new_pekerjaan_detail.{$posisinya} = '{$id}' AND new_minggu.{$status} = 1";

		    $query1 = $this->db->query($sql1);
		    if ($query1->num_rows() > 0) {
		        $status = $query1->num_rows();
		    }elseif ($query1->num_rows() == 0) {
		        $status = 0;
		    }
        break;

        case "PPSPM":
            $posisinya = "fk_id_ppspm";
            $status = "status_ppspm";
            $sql1 = "SELECT new_pekerjaan_detail.proyek, new_minggu.minggu FROM new_pekerjaan_detail join new_minggu on new_pekerjaan_detail.proyek = new_minggu.proyek WHERE new_pekerjaan_detail.{$posisinya} = '{$id}' AND new_minggu.{$status} = 1";

		    $query1 = $this->db->query($sql1);
		    if ($query1->num_rows() > 0) {
		        $status = $query1->num_rows();
		    }elseif ($query1->num_rows() == 0) {
		        $status = 0;
		    }

        break;
        case "KASUBDIT":
            $posisinya = "fk_id_kasubdit";
            $status = "status_kasubdit";
            $sql1 = "SELECT new_pekerjaan_detail.proyek, new_minggu.minggu FROM new_pekerjaan_detail join new_minggu on new_pekerjaan_detail.proyek = new_minggu.proyek WHERE new_pekerjaan_detail.{$posisinya} = '{$id}' AND new_minggu.{$status} = 1";

		    $query1 = $this->db->query($sql1);
		    if ($query1->num_rows() > 0) {
		        $status = $query1->num_rows();
		    }elseif ($query1->num_rows() == 0) {
		        $status = 0;
		    }
        break;
        case "Admin":
            $posisinya = "Admin";
            $status = "status_admin";
        break;
        default:
    }

	

	$posisi = $this->session->userdata('posisi');
	$email = $this->session->userdata('email');
	switch ($posisi) {

		case 'Admin':
			$adalah="(Admin)";
			break;
		case 'Pengawas':
			$adalah="(Pengawas)";
			break;
		case 'PPK':
			$adalah="(PPK)";
			break;
		case 'PPSPM':
			$adalah="(PPSPM)";
			break;
		case 'KASUBDIT':
			$adalah="(KASUBDIT)";
			break;
		
		default:
			# code...
			$adalah="Definisi User Gagal";
			break;
	}
?>


<div class="header">
	<div class="top-header">
		<div class="logo-header">
			<!-- <img src="<?php echo base_url();?>aset/img/logo.png"  class="img-fluid"> -->
		</div>
		<div class="title-app">
			<h1>SI Manis (SISTEM INFORMASI MONITORING EVALUASI KONSTRUKSI TERINTEGRASI)</h1>
		</div>
		<div class="top-user">
			<!-- <img src="<?php echo base_url();?>aset/img/user.png" class="rounded-circle"> -->
			<p style="align-content: center;text-align: center; color: white;"><?php echo $email; ?><br><?php echo $adalah; ?></p>
		</div>

	</div>
	<nav class="navbar navbar-expand-lg navbar-light nav-border-bottom">
  		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button> -->
  		<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
    		<ul class="navbar-nav mr-auto">
				<?php if($posisi == "Admin"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="#">Beranda</a>
	      			</li>


					<li class="nav-item">
					<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/add"> Tambah Pekerjaan</a></li>
					</li>

	      			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarKegiatan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pekerjaan</a>
	        			<ul class="dropdown-menu" aria-labelledby="navbarKegiatan">
							<li><a class="dropdown-item" href="<?php echo base_url();?>pekerjaan/new_new_kelola_pekerjaan"><img class="img-fluid img-icon" src="<?php echo base_url();?>aset/icon/icon_laporan.png"> Kelola Pekerjaan</a></li>
	          				<li><a class="dropdown-item" href="<?php echo base_url();?>pekerjaan/new_new_kelola_budget"><img class="img-fluid img-icon" src="<?php echo base_url();?>aset/icon/icon_title_add_pekerjaan.png"> kelola Budgeting</a></li>
	          				<li><a class="dropdown-item" href="<?php echo base_url();?>pekerjaan/new_new_kelola_addendum"><img class="img-fluid img-icon" src="<?php echo base_url();?>aset/icon/ic_lihat.png"> kelola Addendum</a></li>

	        			</ul>
	      			</li>

					<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_pilih_proyek">Input Pekerjaan</a></li>
					</li>

					<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarKegiatan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengguna</a>
	        			<ul class="dropdown-menu" aria-labelledby="navbarKegiatan">
							<li><a class="dropdown-item" href="<?php echo base_url();?>pengguna/add"><img class="img-fluid img-icon" src="<?php echo base_url();?>aset/icon/icon_user_management.png"> Tambah Pengguna</a></li>
	          				<li><a class="dropdown-item" href="<?php echo base_url();?>pengguna/index"><img class="img-fluid img-icon" src="<?php echo base_url();?>aset/icon/icon_kas.png"> Lihat Pengguna </a></li>
	        			</ul>
	      			</li>
				<?php }?>

				<?php if($posisi == "Pengawas"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
	      			</li>

					<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_new_pilih_proyek_pengawas">Input Pekerjaan </a></li>
					</li>
				<?php }?>

				<?php if($posisi == "PPK"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
	      			</li>

					<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_new_pilih_proyek">Laporan Pekerjaan
							<? if ($status !== 0) {
								echo "<span class='badge badge-warning right'>".$status."</span>";
							} ?>
						</a></li>
					</li>

					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url('pekerjaan/new_new_pilih_addendum/'.$id);?>">Addendum</a>
	      			</li>
				<?php }?>

				<?php if($posisi == "KPA"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
	      			</li>

					<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_new_pilih_proyek">laporan Pekerjaan
							<? if ($status !== 0) {
								echo "<span class='badge badge-success right'>".$status."</span>";
							} ?>
						</a></li>
					</li>
				<?php }?>

				<?php if($posisi == "PPSPM"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
	      			</li>

					<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_new_pilih_proyek">laporan Pekerjaan
							<? if ($status !== 0) {
								echo "<span class='badge badge-secondary right'>".$status."</span>";
							} ?>
						</a></li>
					</li>
				<?php }?>

				<?php if($posisi == "KASUBDIT"){ ?>
					<li class="nav-item">
	        			<a class="nav-link" href="<?php echo base_url();?>">Beranda</a>
	      			</li>

	      			<li class="nav-item">
						<li><a class="nav-link" href="<?php echo base_url();?>pekerjaan/new_new_pilih_proyek">laporan Pekerjaan
							<? if ($status !== 0) {
								echo "<span class='badge badge-info right'>".$status."</span>";
							} ?>
						</a></li>
					</li>
				<?php }?>

				
				<li class="nav-item">
        			<a id="logout" class="nav-link" href="<?php echo base_url();?>login/logout">Logout</a>
      			</li>

      			
    		</ul>
  		<!-- </div> -->
	</nav>
</div>