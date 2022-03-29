<div class="row container-fluid" style="margin-top: 10px;">
  <div class="card col-md-12 col-xs-12">
    <div class="card-header">
      <h5 class="card-title" style="text-align: center;">Data Riwayat Pembayaran</h5>
      <h6 align="center"><?php echo $proyek; ?></h6>

    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <table id="example1" class="table table-bordered responsif" style="font-size: 8pt; width: 100%">
        <thead>
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Kategori</th>
          <th>Rincian</th>
          <th>Nilai (Rp.)</th>
          <th>Surat</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              $jml = 0;
              foreach ($data as $value) {
              ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $value->tanggal; ?></td>
          <td><?php echo $value->kategori; ?></a> </td>
          <td><?php echo $value->rincian; ?> </td>
          <td><?php echo number_format($value->nilai, 2,',','.'); ?></td>
          <td><a target="blank" href="<?php echo site_url('pekerjaan/new_new_lihat_history_budget_surat/'.$value->surat); ?>"><?php echo $value->surat; ?></a></td>
          <td>
            <a href="<?php echo site_url('pekerjaan/new_new_edit_kelola_history_budget/'.$value->id); ?>">Edit</a>
          </td>
        </tr>
        <?php $jml += $value->nilai; ?>
              <?php } ?>

        </tbody>
        <tfoot>
            <tr style = "font-weight: bold;">
                <td colspan="6" align ="right">Jumlah</td>
                <td>
                <?php
                echo number_format($jml, 2,',','.'); ?>
                </td>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
