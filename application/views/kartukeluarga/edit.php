<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>SIWADES</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li><a href="../dashboard">SIWADES</a></li>
                        <li><a href="../pilihan.php?menu=3">KK</a></li>
                        <li>EDIT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <div class="row">
        <!-- Input States Block -->
        <div class="col-md-8">
            <div class="block">
                <!-- Input States Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
                    </div>
                    <h2>Edit Kartu Keluarga</h2>
                </div>
                <!-- END Input States Title -->

                <!-- Input States Content -->


                <form action="<?=base_url('Admin/sEditKk')?>" method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3">No KK</label>
                        <div class="col-md-8">
                            <input type="text" name="no_kk" class="form-control" value="<?=$data['no_kk'];?>">
                            <input type="hidden" name="kkLama" value="<?=$data['no_kk'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">RT</label>
                        <div class="col-md-8">
                            <input type="text" name="rt" class="form-control" value="<?=$data['rt'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">RW</label>
                        <div class="col-md-8">
                            <input type="text" name="rw" class="form-control" value="<?=$data['rw'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Alamat</label>
                        <div class="col-md-8">
                            <input type="text" name="alamat" class="form-control" value="<?=$data['alamat'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Desa</label>
                        <div class="col-md-8">
                            <input type="text" name="desa" class="form-control" value="<?=$data['desa'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Kecamatan</label>
                        <div class="col-md-8">
                            <input type="text" name="kecamatan" class="form-control" value="<?=$data['kecamatan'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Kabupaten</label>
                        <div class="col-md-8">
                            <input type="text" name="kabupaten" class="form-control" value="<?=$data['kabupaten'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Kode Pos</label>
                        <div class="col-md-8">
                            <input type="text" name="kode_pos" class="form-control"  value="<?=$data['kode_pos'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3">Provinsi</label>
                        <div class="col-md-8">
                            <input type="text" name="provinsi" class="form-control" value="<?=$data['provinsi'];?>">
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-12">
                            <button type="submit" name="edit_proses" class="btn btn-effect-ripple btn-primary">Edit</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Input States Content -->
        </div>
        <!-- END Input States Block -->
    </div>

</div>
<!-- END Page Content -->
 <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?=base_url('assets/');?>js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url('assets/');?>js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/');?>js/plugins.js"></script>
        <script src="<?=base_url('assets/');?>js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url('assets/');?>js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url('assets/');?>js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>
        

    </body>
</html>