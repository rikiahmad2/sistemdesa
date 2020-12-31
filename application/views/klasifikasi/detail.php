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
                        <li><a href="../pilihan.php?menu=3">KLASIFIKASI</a></li>
                        <li>DETAIL</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->

    <!-- Datatables Block -->
    <!-- Datatables is initialized in <?=base_url('assets/') ?>js/pages/uiTables.js -->
    <?php 
    if (isset($_COOKIE['alert'])) {
        echo $_COOKIE['alert'];
    }else{
        echo "";
    }
    ?>
    <div class="block full">
        <div class="block-title">
            <h2><i class="fa fa-child sidebar-nav-icon"></i><?=$data2['nama_klasifikasi']?></h2>
        </div>
        <div class="row">
            <form action="<?=base_url('Admin/sDokumenKlasifikasi')?>" method="post">
                <div class="form-group col-md-10">
                    <select id="example-chosen" name="id_dokumen" class="select-chosen" required="Pilih Dokumen Dulu">
                        <option value=""> ---- Pilih Dokumen ---- </option>
                        <?php
                        foreach ($data3 as $row) {
                            echo '<option value="'.$row->id_dokumen.'">'.$row->id_dokumen.'/'.$row->nama_dokumen.'</option>';
                        }
                            
                        ?>
                    </select>
                    <input type="hidden" name="id_klasifikasi" value="<?=$data2['id_klasifikasi']?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-effect-ripple btn-info" name="tambah_dokumen"><i class="fa fa-plus"></i> Tambah Dokumen</a>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Dokumen</th>
                            <th style="width: 200px" class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $row) {
                            echo '<tr>
                                    <td class="text-center">'.$i.'</td>
                                    <td><strong>'.$row->nama_dokumen.'</strong></td>
                                    <td class="text-center">
                                    <a href="'.base_url('Admin/hapusDokumenKlasifikasi/'.$row->id_dokumen.'/'.$row->id_klasifikasi.'').'" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
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
<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
<script src="<?=base_url('assets/') ?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?=base_url('assets/') ?>js/vendor/bootstrap.min.js"></script>
<script src="<?=base_url('assets/') ?>js/plugins.js"></script>
<script src="<?=base_url('assets/') ?>js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/') ?>js/pages/uiTables.js"></script>
<script>$(function () {UiTables.init();});</script>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
<script src="<?=base_url('assets/') ?>js/plugins/ckeditor/ckeditor.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/') ?>js/pages/formsComponents.js"></script>
<script>$(function(){ FormsComponents.init(); });</script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/') ?>js/pages/uiProgress.js"></script>
<script>$(function () { UiProgress.init(); });</script>


</body>
</html>