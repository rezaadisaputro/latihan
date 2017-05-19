<?php 
//Validasi Input 
echo validation_errors ('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/site/edit/'. $site->id_site));
?>
<div class="col-md-6">
<div class="form-group-lg">
<label>Nama Site</label>
<input type="text" name="nama_site" class="form-control" placeholder="Nama Site" value="<?php echo $site-> nama_site ?>">
</div>

<br>
<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $site-> alamat ?>">
</div>

<br>
<div class="form-group">
<label>Telepon</label>
<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $site-> telepon ?>">
</div>

<br>
<div class="form-group">
<label>No Hp</label>
<input type="text" name="hp" class="form-control" placeholder="No HP" value="<?php echo $site-> hp ?>">
</div>

<br>
<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $site-> email ?>">
</div>

<br>
<div class="form-group">
<label>Kota</label>
<input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo $site-> kota ?>">
</div>
</div>


<div class="col-md-6">
<div class="form-group-lg">
<label>Contact Person</label>
<input type="text" name="contact_person" class="form-control" placeholder="Contact Person" value="<?php echo $site-> contact_person ?>">
</div>

<br>
<div class="form-group">
<label>Keterangan Lain</label>
<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $site-> keterangan ?></textarea>
</div>

<br>
<div class="form-group">
<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>

<?php
//close form
echo form_close();
?>