<div class="row container-fluid" style="margin-top: 10px;">
  <div class="card col-md-12 col-xs-12">
    <div class="card-header">
      <h5 class="card-title" style="text-align: center;">Data Budgeting</h5>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
      <table id="example1" class="table table-bordered responsif" style="font-size: 8pt; width: 100%">
        <thead>
        <tr>
          <th>No.</th>
          <th>Proyek</th>
          <th>Biaya Total (Rp.)</th>
          <th>Biaya Kontruksi (Rp.)</th>
          <th>Honorium (Rp.)</th>
          <th>Perjalanan Dinas (Rp.)</th>
          <th>Biaya Habis Pakai (Rp.)</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($data as $value) {
              ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><a href="<?php echo site_url('pekerjaan/new_new_kelola_budget_history/'.$value->fk_id_kontruksi); ?>"><?php echo $value->proyek; ?></a> </td>
          <td><?php echo number_format($value->biaya_total, 2,',','.'); ?> </td>
          <td><a href="<?php echo site_url('pekerjaan/new_new_kelola_budget_kontruksi/'.$value->fk_id_kontruksi); ?>"><?php echo number_format($value->biaya_kontruksi, 2,',','.'); ?></td>
          <td><?php echo number_format($value->biaya_honorium, 2,',','.'); ?> </td>
          <td><?php echo number_format($value->biaya_perjalanan, 2,',','.'); ?> </td>
          <td><?php echo number_format($value->biaya_habis_pakai, 2,',','.'); ?> </td>
          <td>
            <a href="<?php echo site_url('pekerjaan/new_new_edit_kelola_budget/'.$value->id_budgeting); ?>">Edit</a>
          </td>
        </tr>
              <?php } ?>

        </tbody>
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
