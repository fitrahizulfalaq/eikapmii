<script type="text/javascript">
  $(document).ready(function(){
    $('#komisariat_id').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/getRayon');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].deskripsi+'</option>';
                }
                html += '<option value="-">- Belum ada Rayon -</option>';
                $('#rayon_id').html(html);         
        }
      });
    });
  });
</script>