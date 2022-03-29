<style type="text/css">
    .crop {
        width: 445px;
        height: 260px;
        overflow: hidden;
    }

    .crop img {
        width: 445px;
        height: 260px;
    }

    h3 {text-align: center; margin-top: -5px;}
    p {text-align: left; font-size: 10pt;}
    table {
    border-collapse: collapse;
    }
    
    table, td, th {
    border: 1px solid black;
    }
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Dokumentasi</title>
</head>
<body>
  <?php 
  foreach ($section0 as $i) {
    $section = $i['section'];

    $sql ="SELECT `subpekerjaan` FROM `dokumentasi` WHERE section = '$section' GROUP by subpekerjaan ORDER BY idfoto ASC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        // ini untuk perulangan pekerjaan dengan where kondisi session yang sedang berjalan, misal session 0 meiliki 1 atau 2 pekerjaan
        ?>

  <div style="page-break-inside: avoid;">
    <table id="example1" style="font-size: 11pt; width: 100%; text-align: center; font-weight: bold;">
      <tr>
        <td style="width: 33%; text-align: center; font-weight: bold;">KONSULTAN PENGAWAS</td>
        <td style="width: 33%; text-align: center; font-weight: bold;">PEKERJAAN</td>
        <td style="width: 33%; text-align: center; font-weight: bold;">FORM FORMAT</td>
      </tr>
      <tr>
        <td style ="font-size: 9pt;">
            <?php
            $urllogo;
            if ($logo != null ) {
                  $foto = file_get_contents(base_url('upload/logo/').$logo); 
                  $urllogo = "data:image/png;base64,".base64_encode($foto);
              }
              else{
                  $foto = file_get_contents(base_url('upload/ttd/kosong.png')); 
                  $urllogo = "data:image/png;base64,".base64_encode($foto);
              }
            ?>
            <br><img style="width:50px; height:50px; object-fit: cover;" src="<?php echo $urllogo; ?>"> <br> <?php echo $pengawas; ?>
        </td>
        <td><?php echo $proyek ?></td>
        <td>LAPORAN VISUAL</td>
      </tr>
    </table>
    <br>
    <table style="font-size: 10pt; border: 0; border-spacing: 0; border: 0px solid #CCC; width: 100%">
      <tr>
        <td style="border: none; vertical-align:top">UNIT KERJA</td>
        <td style="border: none; vertical-align:top">: <?php echo $unitkerja ?></td>
        <td style="border: none; vertical-align:top">NAMA LAPORAN</td>
        <td style="border: none; vertical-align:top">: Laporan Visual</td>
      </tr>
      <tr>
        <td style="border: none; vertical-align:top">AGGARAN</td>
        <td style="border: none; vertical-align:top">: <?php echo $anggaran ?></td>
        <td style="border: none; vertical-align:top">TANGGAL</td>
        <td style="border: none; vertical-align:top">: <?php echo $periode ?></td>
      </tr>
      <tr>
        <td style="border: none; vertical-align:top">LOKASI</td>
        <td style="border: none; vertical-align:top">: <?php echo $lokasi ?></td>
        <td style="border: none; vertical-align:top">MINGGU KE</td>
        <td style="border: none; vertical-align:top">: <?php echo $minggu ?></td>
      </tr>
    </table>
    <br>
    
    <table id="example1" style="font-size: 11pt; width: 100%; text-align: center; font-weight: bold;">
    <?php 
    $n = 1;
    $sql ="SELECT * FROM `dokumentasi` WHERE idminggu = '{$idminggu}' AND section = '$section' AND subpekerjaan = '{$row->subpekerjaan}' ORDER BY idfoto ASC";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
          $url;
          if ($row->foto != null ) {
              $foto = file_get_contents(base_url('upload/dokumentasi/').$row->foto); 
              $url = "data:image/png;base64,".base64_encode($foto);
          }
          else{
              $foto = file_get_contents(base_url('upload/ttd/kosong.png')); 
              $url = "data:image/png;base64,".base64_encode($foto);
          }
        ?>
      <tr>
        <td style="width: 1%; text-align: center; vertical-align: middle;"><?= $n++; ?>.</td>
        <!--<td style="width: 65%; text-align: center; font-weight: bold;"><img style="width:445px; height:260px;" src="<?php echo $url; ?>"></td>-->
        <td style="width: 65%; text-align: center; font-weight: bold;">
          <!--<div style="width: 445px; height: 260px; overflow: hidden; margin: 10px; position: relative;">-->
          <!--    <img style="position:absolute; left: -100%; right: -100%; top: -100%; bottom: -100%; margin: auto; min-height: 100%; min-width: 100%;" src="<?php echo $url; ?>">-->
          <!--</div>-->
            <img style="width:445px; height:260px; object-fit: cover;" src="<?php echo $url; ?>">
            <!--<img src="<?php echo $url; ?>">-->
        </td>
        <td style="padding-top: 8px; padding-left: 8px; height: 260px width: 33%; text-align: left; font-weight: bold; vertical-align:top">Tanggal : <br> <?php echo date_format(date_create($row->tanggal),"d F Y"); ?><br><br><br><?= $section; ?> - <?= $row->subpekerjaan; ?> </td>
      </tr>
      <?php }} ?>
    </table>
  </div>

<br><br>

<?php }} } ?>
</body>
</html>

