<!-- Page content -->
<div id="page-content">
    <!-- User Profile Row -->
    <div class="row">
        <div class="col-md-5 col-lg-4">
            <?php 
            if (isset($_COOKIE['alert'])) {
                echo $_COOKIE['alert'];
            }else{
                echo "";
            }
            ?>
            <div class="widget">
                <div class="widget-image widget-image-sm">
                    <img src="../assets/img/photo1.jpg" alt="image">
                    <div class="widget-image-content text-center" >
                        <img src="<?=base_url('store/foto/'.$data['foto'].'')?>" alt="avatar" class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                        <h2 class="widget-heading text-light"><strong></strong></h2>
                        <a href="#modal-fade2" class="btn btn-effect-ripple btn-default" data-toggle="modal" title="Edit Tentang"><i class="fa fa-pencil"></i></a>
                    </div>
                </div>
                <div class="widget-content border-bottom">
                    <h4>
                       <div class="col-md-10">Tentang</div>
                   </h4>
                   <br>
                   <br>
                   <br>
                   <p>
                    
                </p>
                <p>
                    Lahir di  <?php echo $data['tempat_lahir'].' / '.$data['tanggal_lahir'];?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-lg-8">
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li><a href="#profile-gallery"><strong>INFO LENGKAP <?=$data['nama'] ?></strong></a></li>
                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                <tbody>
                    <tr>
                        <td><strong>NIK</strong></td>
                        <td><?=$data['nik'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>NAMA</strong></td>
                        <td><?=$data['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>TTL</strong></td>
                        <td><?=$data['tempat_lahir'] ?> / <?=$data['tanggal_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>JENIS KELAMIN</strong></td>
                        <td><?=$data['jk'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>GOL. DARAH</strong></td>
                        <td><?=$data['golongan_darah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>PEKERJAAN</strong></td>
                        <td><?=$data['pekerjaan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>PENDIDIKAN</strong></td>
                        <td><?=$data['pendidikan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>STATUS PERKAWINAN</strong></td>
                        <td><?=$data['status_perkawinan'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>AGAMA</strong></td>
                        <td><?=$data['nama_agama']?></td>
                    </tr>
                    <tr>
                        <td><strong>KLASIFIKASI</strong></td>
                        <td><?=$data['nama_klasifikasi']?></td>
                    </tr>
                    <tr>
                        <td><strong>NO. KK</strong></td>
                        <td><?=$data['no_kk'] ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Tabs Content -->
        </div>
    </div>
</div>
<!-- END User Profile Row -->
</div>
<!-- END Page Content -->

<!-- Regular Fade -->
<div id="modal-fade2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Upload Foto Profil Baru</strong></h3>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('Home/sEditProfile/')?>" method="POST" class="form-bordered" enctype="multipart/form-data">
                    <div class="col-sm-8">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="<?=base_url('store/foto/'.$data['foto'].'')?>" alt=""/>
                            </div>
                            <input type="hidden" name="fotoLama" value="<?=$data['foto']?>">
                            <input type="hidden" name="nik" value="<?=$data['nik']?>">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                               <span class="btn btn-default btn-file">
                                 <span class="fileupload-new"><i class="fa fa-camera"></i> Ubah Foto</span>
                                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                 <input type="file" class="default" name="foto"/>
                             </span>
                             <div class="row"></div>
                             <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                         </div>
                     </div>
                 </div>
                 <div class="row"></div>
                 <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_baru" class="form-control" value="<?=$data['username']?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password_baru" class="form-control" value="<?=base64_decode($data['password'])?>">
                </div>
                <div class="form-group">
                    <label>Tentang Anda</label>
                    <textarea name="tentang" cols="75" rows="10" class="form-control ui-wizard-content"><?=$data['about']?></textarea>
                </div>
                <div class="form-group form-actions">
                    <button type="submit" class="btn btn-effect-ripple btn-primary">Edit Profil</button>
                    <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- END Regular Fade -->

<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
<script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="../assets/js/vendor/bootstrap.min.js"></script>
<script src="../assets/js/plugins.js"></script>
<script src="../assets/js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="../assets/js/pages/uiWidgets.js"></script>
<script>$(function () { UiWidgets.init(); });</script>

<!-- Load and execute javascript code used only in this page -->
<script src="../assets/js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>

<!--file upload-->
<script type="text/javascript" src="../assets/js/bootstrap-fileupload.min.js"></script>


</body>
</html>