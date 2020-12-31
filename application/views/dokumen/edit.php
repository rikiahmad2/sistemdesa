<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Edit</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li><a href="../dashboard">SIWADES</a></li>
                        <li><a href="../pilihan.php?menu=1">DOKUMEN</a></li>
                        <li>EDIT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->

    <!-- Input States Block -->
    <div class="col-md-8">
        <div class="block">
            <!-- Input States Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
                </div>
                <h2>Edit Dokumen</h2>
            </div>
            <!-- END Input States Title -->

            <!-- Input States Content -->

            <form action="<?=base_url('Admin/sEditDokumen/'.$data['id_dokumen'].'')?>" method="post" class="form-horizontal form-bordered">
                <div class="form-group">
                    <input type="hidden" name="id_agama" value="asd">
                    <label class="col-md-3">Nama Dokumen</label>
                    <div class="col-md-8">
                        <input type="text" name="nama_dokumen" class="form-control" placeholder="Nama Agama" value="<?=$data['nama_dokumen']?>">
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
<!-- END Page Content -->

 <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="<?=base_url('assets/');?>js/vendor/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url('assets/');?>js/vendor/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/');?>js/plugins.js"></script>
        <script src="<?=base_url('assets/');?>js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url('assets/');?>js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>
        
        <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
        <script src="<?=base_url('assets/');?>js/plugins/ckeditor/ckeditor.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="<?=base_url('assets/');?>js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>
        

    </body>
</html>