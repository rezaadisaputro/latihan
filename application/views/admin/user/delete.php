<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $user->id_users ?>" title=="Delete user">
<i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $user->id_users ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data user ?</h4>
            </div>
            <div class="modal-body">
              Yakin Mau di Hapus data user nya ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <a href = "<?php echo base_url ('admin/user/delete/'.$user->id_users) ?>" class= "btn btn-primary"> <i class="fa fa-trash-o"></i> Ya, Hapus Data ini</a>  
            </div>
        </div>
    </div>
</div>