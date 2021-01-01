<script src="<?=base_url('assets/');?>js/vendor/modernizr-3.3.1.min.js"></script>
<link href="<?=base_url('assets/');?>bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url('assets/');?>bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?=base_url('assets/');?>style_sesudah.css" rel="stylesheet">
<script src="<?=base_url('assets/');?>bootstrap/js/jQuery.js"></script>
 <!-- Page content -->
 <div id="page-content" class="inner-sidebar-right">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>CHAT || SIWADES</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li><a href="../dashboard">SIWADES</a></li>
                        <li>Chat Room</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <!-- Inner Sidebar -->
    <div id="page-content-sidebar">
        <!-- Collapsible People List -->
        <a href="javascript:void(0)" class="btn btn-block btn-effect-ripple btn-primary visible-xs" data-toggle="collapse" data-target="#people-nav">People</a>
        <div id="people-nav" class="collapse navbar-collapse remove-padding">
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    Online
                </h4>
                <ul class="nav-users nav-users-online">
                    <?php foreach ($online as $row):?>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="<?=base_url('store/foto/'.$row->foto.'') ?>" alt="image" class="nav-users-avatar">
                                <span class="nav-users-heading"><?php echo $row->nama ?></span>
                                <span class="text-muted"><?php if ($row->jk == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="block-section">
                <h4 class="inner-sidebar-header">
                    Offline
                </h4>
                <ul class="nav-users nav-users-offline">
                    <?php foreach ($offline as $rows):?>
                        <li>
                            <a href="javascript:void(0)">
                                <img src="<?=base_url('store/foto/'.$rows->foto.'') ?>" alt="image" class="nav-users-avatar">
                                <span class="nav-users-heading"><?php echo $rows->nama ?></span>
                                <span class="text-muted"><?php if ($rows->jk == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- END Collapsible People List -->
    </div>
    <!-- END Inner Sidebar -->

    <!-- Social Net Content -->
    <div class="header-section">
        <div class="row">
            <div class="col-sm-12">
                <div id="boxpesan" style="height: 400px;">
                    
                </div>
            </div>
        </div>
    </br>
    <div class="row">
        <div class="col-sm-10">
            <form method="post" action="" id="formpesan" class="form-inline">
                <textarea class="input-xlarge" style="width: 550px; height: 37px;" name="pesan" placeholder="Ketik Pesan kemudian Kirim !" required x-moz-errormessage="Masukkan Pesan !" autofocus></textarea>
                <input type='submit' value='Kirim' class='btn btn-info pull-right' id='pencet'>
            </form>
            <audio controls id="suara">
                <source src="<?= base_url("assets/"); ?>chat.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="col-sm-2">
                </div>
            </div>
        </div>
        <!-- END Social Net Content -->

    </div>
    <!-- END Page Content -->
    /div>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
<script src="<?=base_url('assets/')?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?=base_url('assets/')?>js/vendor/bootstrap.min.js"></script>
<script src="<?=base_url('assets/')?>js/plugins.js"></script>
<script src="<?=base_url('assets/')?>js/app.js"></script>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/')?>js/pages/appSocial.js"></script>
<script type="text/javascript">
    function getMessages(){
        $.ajax({
            url : '<?=base_url('Home/getPesan') ?>',
            type : 'GET',
            data : '',
            success : function(e)
            {
                $("#boxpesan").html(e);
                $("#boxpesan").animate({ scrollTop: $("#boxpesan")[0].scrollHeight }, 1000);
            },
        });
    }
    setInterval(getMessages,10000);
    $(document).ready(function()
    {
        getMessages();
        var audio=$('#suara');
        audio.hide();
        $("#formpesan").submit(function()
        {
            var pesan=$(".input-xlarge").val();
            $.ajax({
                url : '<?=base_url('Home/submitPesan') ?>',
                type : 'POST',
                data : 'pesan='+pesan,
                success : function(e)
                {
                    var suara=document.getElementById("suara");
                    suara.play();
                    getMessages();
                    if(e=="terkirim")
                    {
                        $(".input-xlarge").val("");
                    }
                    else
                    {
                        return false;
                    }
                },
            });
            return false;
        });

        $("#emott").popover({
            html: true,
            content: function(){
                return "<img src='emot/akasmaran.gif' title='[kasmaran]' onClick=\"addemot('[kasmaran]')\">"+
                "<img src='emot/akedip.gif' title='[kedip]' onClick=\"addemot('[kedip]')\">"+
                "<img src='emot/aketawa.gif' title='[ketawa]' onClick=\"addemot('[ketawa]')\">"+
                "<img src='emot/amarah.gif' title='[marah]' onClick=\"addemot('[marah]')\">"+
                "<img src='emot/amelet.gif' title='[melet]' onClick=\"addemot('[melet]')\">"+
                "<img src='emot/anangis.gif' title='[nangis]' onClick=\"addemot('[nangis]')\">"+
                "<img src='emot/asakit.gif' title='[sakit]' onClick=\"addemot('[sakit]')\">"+
                "<img src='emot/bye.gif' title='[bye]' onClick=\"addemot('[bye]')\">"+
                "<img src='emot/maki-maki.gif' title='[maki-maki]' onClick=\"addemot('[maki-maki]')\">"+
                "<img src='emot/marah.gif' title='[cmarah]' onClick=\"addemot('[cmarah]')\">"+
                "<img src='emot/murung.gif' title='[cmurung]' onClick=\"addemot('[cmurung]')\">"+
                "<img src='emot/nangis.gif' title='[cnangis]' onClick=\"addemot('[cnangis]')\">"+
                "<img src='emot/sedih.gif' title='[csedih]' onClick=\"addemot('[csedih]')\">"+
                "<img src='emot/smile.gif' title='[csenyum]' onClick=\"addemot('[csenyum]')\">"+
                "<img src='emot/bonus.png' title='[bonus]' onClick=\"addemot('[bonus]')\">";
            }
        });


    });
    function addemot(emot)
    {
        document.forms[0].pesan.value+=" "+emot;
    }
</script>
<script>$(function(){ AppSocial.init(); });</script>


</body>
</html>