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
                        <li>DOKUMEN</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->

    <!-- Datatables Block -->
    <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
    <?php 
    if (isset($_COOKIE['alert'])) {
        echo $_COOKIE['alert'];
    }else{
        echo "";
    }
    ?>
    <div class="block full">
        <div class="block-title">
            <h2><i class="fa fa-folder sidebar-nav-icon"></i> DOKUMEN</h2>
        </div>
        <a href="#modal-fade" title="Tambah Agama" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Dokumen</a>
        <br>
        <br>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Dokumen</th>
                        <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    foreach ($data as $row) {
                    echo '<tr>
                            <td class="text-center">'.$i.'</td>
                            <td><strong>'.$row->nama_dokumen.'</strong></td>';

                    echo'<td class="text-center">
                                <a href="'.base_url("Admin/editDokumen/".$row->id_dokumen."").'" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                <a href="'.base_url("Admin/hapusDokumen/".$row->id_dokumen."").'" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>';
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END Datatables Block -->
</div>
<!-- END Page Content -->

<!-- Regular Fade -->
<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah Dokumen</strong></h3>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('Admin/sDokumen')?>" method="post" class="form-bordered">
                    <div class="form-group">
                        <label>ID Dokumen</label>
                        <input type="text" name="id_dokumen" class="form-control" value="D<?=$id['id_new']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" class="form-control">
                        <span class="help-block">Masukkan Nama Dokumen</span>
                    </div>
                    <div class="form-group form-actions">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah">Tambah</button>
                        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Regular Fade -->

<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

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

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/');?>js/pages/uiProgress.js"></script>
<script>$(function () { UiProgress.init(); });</script>

<script>
function myFunction() {
  confirm("Delete Data ?");
}
</script>

</body>
</html>