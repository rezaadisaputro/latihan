 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url ('admin/dasbor') ?>">RAZE Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Akses : 
<?php
date_default_timezone_set("Asia/Jakarta");
echo date ('d M Y');


//Ambil data user model ID dari data login
$id_users   = $this->session->userdata('id');
$v = $this->user_model->detail($id_users);
?>
&nbsp;

<a href="<?php echo base_url('admin/dasbor/profil') ?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-user"></i> <?php echo $v ->username ?> ( <?php echo $v ->akses_level ?> ) </a>

 <a href="<?php echo base_url ('login/logout') ?>" class="btn btn-danger square-btn-adjust"> <i class="fa fa-sign-out"></i>Logout</a> </div>
        </nav>   