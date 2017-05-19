 <p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
 <i class="fa fa-plus"></i> Tambah</a></p> 
 
<?php
// Cetak Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Nama / Site</th>
    <th>Username</th>
    <th>Telepon</th>
    <th>Level</th>
    <th></th>
        </tr>
</thead>
                                    
<tbody>
    <?php $i= 1; foreach($user as $user) {?>
        <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $user->nama ?> <br>
        <small><strong>Site :<?php echo $user->nama_site ?></small> </strong>   
        </td>
        <td><?php echo $user->username ?></td>
        <td><?php echo $user->email ?></td>
        <td><?php echo $user->akses_level ?></td>
        <td>
            
        <a href="<?php echo base_url('admin/user/edit/'.$user->id_users) ?>" class="btn btn-primary btn-sm" title="Edit user">
        <i class="fa fa-edit"></i></a> 

        <?php 
        include ('delete.php');
        ?> 

        </td>
</tr> 
<?php $i ++; } ?>
</tbody>
</table>