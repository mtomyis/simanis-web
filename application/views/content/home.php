<!-- 
<a href="javascript:void(0)" title="Delete" onclick="delete_data('."'".$d->id_rencana_po."'".')">
              <span class="nav-icon"><i class="delete-icon"></i></span>
            </a>

<script type="text/javascript">
  function delete_data(id)
  {
    swal({
    title: "DELETE FILE !",
    text: "Are you sure?",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: 'Yes, delete!',
    cancelButtonText: "No, cancel!",
    closeOnConfirm: true,
    closeOnCancel: true,
    },
    function(isConfirm)
    {
      if (isConfirm)
      {
        $('.loading').fadeIn('fast');
        $.ajax({
          url : "<?php echo site_url('order_material/delete_rencana')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
            $('.loading').fadeOut('fast');
            if(data.status)
            {
              reload_table();
              reset_form();
            }
            else
            {
              swal("Peringatan ...!", "Anda tidak berhak melakukan perintah ini !", "error"); 
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            $('.loading').fadeOut('fast');
            swal("Upss...!", "Terjadi kesalahan jaringan pesan error : !"+errorThrown, "error");
          }
        });
      } 
      else 
      {
        $('.loading').fadeOut('fast');
          swal("Batal", "Data masih tersimpan:)", "error");
      }
    });
  }
</script> -->