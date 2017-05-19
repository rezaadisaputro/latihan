<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<i class="fa fa-plus"></i> Tambah
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kategori Berita</h4>
    </div>
    <div class="modal-body">
   <?php 
//Validasi Input 
echo validation_errors ('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/kategori_berita'));
?>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Kategori Berita</label>
<input type="text" name="Kategori_berita" class="form-control" value="<?php echo set_value('nama_kategori_berita')?>" placeholder="Kategori Berita" required> 

</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Urutan</label>  
<br> <input type="number" name="urutan" class="form-control" value="<?php echo set_value('urutan')?>" placeholder="Urutan" required> 
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan</label>
<br><textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3"><?php echo set_value('keterangan') ?></textarea>
</div>

<div class="form-group">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>


<?php echo form_close() ; ?>
<div class="clearfix"></div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    </div>
</div>
</div>
</div>