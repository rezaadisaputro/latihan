<?php 
//Validasi Input 
echo validation_errors ('<div class="alert alert-warning">','</div>');

//open form
echo form_open(base_url('admin/user/tambah'));
?>

<div class="col-md-6">
<div class="form-group form-group-lg">
<label>User untuk Site?</label>
<select name="id_site" class="form-control">
	<?php foreach($site as $site) { ?>
	<option value="<?php echo $site->id_site?>">
	<?php echo $site->nama_site. '-'.$site->kota?>
	</option>
	<?php } ?>
</select>

<div class="from-group-lg">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
</div>

<div class="from-group-lg">
<label>Password</label>
<input type="Password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
</div>

</div>
</div>

<div class="col-md-6">
<div class="form-group form-group-lg">
<label>Nama Lengkap</label>
<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value ('nama') ?>" required>
</div>


<div class="from-group-lg">
<label>Email</label>
<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>">
</div>

<div class="from-group-lg">
<label>Level Hak Akses</label>
<select name="akses_level" class="form-control">
	<option value="Admin">Administrator</option>
	<option value="User">User/Staff</option>
	<option value="Blocked">Blocked</option>
	</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Save Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>

<?php
echo form_close();
?>