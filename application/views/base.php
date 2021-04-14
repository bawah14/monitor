<?php error_reporting(0); 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Monitoring Ketersediaan dan Harga Pangan</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">

<link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')?>" rel="stylesheet">
    <!-- https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css -->
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('assets/build/css/custom.min.css')?>" rel="stylesheet">
 <style type="text/css">
   
  .footer {
    z-index:9;
  } 
  #load{
      width:100%;
      height:100%;
      position:fixed;
      z-index:9999;
      background:url("<?php echo base_url('assets/img/loading.gif')?>") no-repeat center center rgba(0,0,0,0.25)
  }
 </style>
  </head>

  <body class="nav-md <?php if ($this->session->userdata('role')=='lapangan'): ?>
    footer_fixed
  <?php endif ?>">

    <div id="load" >
      
    </div>
    <div class="container body" id="contents" <?php if ($this->session->userdata('role')=='lapangan'): ?>
      style="margin-bottom: 15%"
    <?php endif ?>>
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#"class="site_title"><i class="fa fa-laptop"></i> <span>Monitoring</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets/img/user.png') ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('username'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home </span></a>
                    <!-- <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('index.php/welcome/getpasar/1'); ?>">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul> -->
                  </li>
                  <li><a href="<?php echo(base_url('index.php/welcome/handlerlogout')) ?>"><i class="fa fa-sign-out"></i> Logout </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav top-nav-fixed">
          <div class="nav_menu navbar-fixed-top">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $this->session->userdata('username') ?>
                    <!-- <span class=" fa fa-angle-down"></span> -->
                  </a>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
              
        <!-- page content -->
        <?php //var_dump($page) ?>
        <!-- <?php var_dump($data) ?> -->
        <?php $this->view($page,$data) ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="footer">
          
          <!-- <div class="pull-right"> -->
            <!-- Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a> -->
          <!-- </div> -->
          <div class="clearfix">
            <div class="row">
            <?php if ($this->session->userdata('role')=="lapangan"): ?>
            <div class="col-xs-4" style="text-align: center;">
              <a href="<?php echo base_url() ?>">
                <i class="fa fa-home fa-3x"></i>
              </a>
            </div>
              
            <div class="col-xs-4" style="text-align: center;">
              <a href="<?php echo base_url('index.php/router/index/input_harga') ?>">
                <i class="fa fa-dollar  fa-3x"></i>
              </a>

              <!-- <i class="fa fa-angle-right fa-7x"></i> -->
            </div>
            <div class="col-xs-4" style="text-align: center;">
              <a href="<?php echo base_url('index.php/router/index/input_ketersediaan') ?>">
                <i class="fa fa-archive fa-3x"></i>
              </a>
              <!-- <i class="fa fa-angle-right fa-7x"></i> -->
            </div>
            <?php endif ?>
          </div>
          </div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js') ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
    <!-- jQuery Sparklines 
    <script src="<?php echo base_url('assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script> -->
    <!-- Flot 
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.pie.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.time.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.stack.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.resize.js') ?>"></script> -->
    <!-- Flot plugins
    <script src="<?php echo base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
     DateJS -->
    <script src="<?php echo base_url('assets/vendors/DateJS/build/date.js') ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <!-- date picker -->
    <script src="<?php echo base_url('assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>

    <script src="<?php echo base_url('assets/vendors/jquery.table2excel.js')?>"></script>
    <!-- datatable -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.js" integrity="sha256-BFIKaFl5uYR8kP6wcRxaAqJpfZfC424TBccBBVjVzuY=" crossorigin="anonymous"></script> -->
    <script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" language="javascript" src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/build/js/custom.min.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>
    <script type="text/javascript">
      
      document.onreadystatechange = function () {
        var state = document.readyState;
        if (state == 'interactive') {
             //document.getElementById('contents').style.visibility="hidden";
        } else if (state == 'complete') {
            setTimeout(function(){
               document.getElementById('interactive');
               document.getElementById('load').style.visibility="hidden";
               document.getElementById('contents').style.visibility="visible";
               <?php if (isset($_GET['pesan'])): ?>
                alert("<?php echo $_GET['pesan'] ?>");
              <?php endif ?>
            },1000);

        }

          
      }
      $("#date").datetimepicker({
        format: 'YYYY-MM-DD'
      });
      $("#date-manual").datetimepicker({
        format: 'YYYY-MM-DD'
      });
      $('#dt-responsive').DataTable({
        // responsive:true,
        // "scrollY": 200,
        "scrollX": true,
        "pageLength": 50
      });
        $(".export2xls").click(function(){
          var name = "Data harian";
          if (navigator.userAgent.search("Firefox") != 0) {
              name +=".xls";
          }
          $(".table").table2excel({
              name: "Worksheet Name",

              filename: name //do not include extension
            });
          });
        $("#heard-harga").on('change',function(){
          // alert('ok');
          var id_pasar = $("#heard-harga").val();
          request_data_harga(id_pasar);
        });
        $("#heard-stok").on('change',function(){
          var id_pasar = $("#heard-stok").val();
          request_data_stok(id_pasar);
          // alert('ok');
        });
        function request_data_stok(id_pasar){
          $('.input').val("");
          $.getJSON('<?php echo base_url("index.php/api/get_data_stok"); ?>/'+id_pasar, function(result){
            $.each(result,function(key,value){
              // alert(key+value);
              $('#kd'+key).val(value);
            });
            // console.log(result);

          });
          $('.input-stk').each(function(i, obj) {
            $.getJSON('<?php echo base_url("index.php/api/get_value_stok"); ?>/'+this.id, function(result){
              // console.log(result.harga);
              if ($('#'+result.kode).val()=='') {
                $('#'+result.kode).val(result.harga);
                $('.input-hg').mask("###,###,###", {reverse: true});
              }

            });
              //test
              // console.log(this.id);

          });
        }
        function request_data_harga(id_pasar){
          $('.input').val("");
          // console.log('<?php echo base_url("index.php/api/get_data_harga"); ?>/'+id_pasar);
          $.getJSON('<?php echo base_url("index.php/api/get_data_harga"); ?>/'+id_pasar, function(result){
            $.each(result,function(key,value){
              // alert(key+value);
              $('#kd'+key).val(value);
            });
            // console.log(result)
          });
          $('.input-hg').each(function(i, obj) {
            $.getJSON('<?php echo base_url("index.php/api/get_value_harga"); ?>/'+this.id, function(result){
              // console.log(result.harga);
              if ($('#'+result.kode).val()=='') {
                $('#'+result.kode).val(result.harga);
              }

            });
              //test
              // console.log(this.id);

          });
        }
        $( document ).ready(function() {
          $('.input-hg').mask("###.###.###", {reverse: true});
          <?php if ($page=="input_stok"): ?>
            <?php if ($this->session->userdata("id_pasar")!=0): ?>
              request_data_stok(<?php echo $this->session->userdata("id_pasar") ?>);
            <?php endif ?>
          <?php endif ?>
          <?php if ($page=="input_harga"): ?>
            <?php if ($this->session->userdata("id_pasar")!=0): ?>
              request_data_harga(<?php echo $this->session->userdata("id_pasar") ?>);
            <?php endif ?>
            
          <?php endif ?>
          
        });
        $('.input-hg').on('change',function(){
          $.getJSON('<?php echo base_url("index.php/api/save_value_harga"); ?>/'+this.id+'/'+$(this).val(), function(result){
            console.log(result);
          });
        });
        $("#simpan-webconfig").on("click",function(){

          $.getJSON('<?php echo base_url("index.php/api/save_webconfig"); ?>'+"/"+$("#minggu-webconfig").val()+"/"+$("#bulan-webconfig").val()+"/"+$("#tahun-webconfig").val(), function(result){
            console.log(result);
            alert(result);
          });
        });
        $("#simpan-tanggal-harga").on("click",function(){
          $.getJSON('<?php echo base_url("index.php/api/save_tanggal_harga"); ?>'+"/"+encodeURI($("#tanggal_harga_websetting").val()), function(result){
            alert('<?php echo base_url("index.php/api/save_tanggal_harga"); ?>'+"/"+encodeURI($("#tanggal_harga_websetting").val()));
            alert($("#tanggal_harga_websetting").val());
            alert(result);
          });
        });
        $('.input-stk').on('change',function(){
          // alert($(this).val()+' ok '+this.id);
          $.getJSON('<?php echo base_url("index.php/api/save_value_stok"); ?>/'+this.id+'/'+$(this).val(), function(result){
            console.log(result);
          });
        });
        $('#export-xls').on('click',function(){
          window.location.href = "<?php echo base_url('index.php/router/handlerexportharian') ?>/"+$('#date').val();
        });
        $('#export-laporan').on('click',function(){
          window.location.href = "<?php echo base_url('index.php/router/handlerexportlaporan') ?>/"+$('#date').val();
        });

        $('#input-ketersediaan').on('click',function(){
          if ($("#komoditi").val()!="" && $("#jumlah").val() > 0 ) {

            window.location.href = "<?php echo base_url('index.php/router/index/proses_input_ketersediaan') ?>/" +$("#komoditi option:selected").text()+"/"+$('#komoditi').val()+"/"+$('#jumlah').val();
          }
        });
        $('#tipe-manual').on('change',function(){
          validate();
        });
        $('#pasar-manual').on('change',function(){
          validate();
        });
        $('#date-manual').on('dp.change',function(){
          // alert('ok');
          validate();
        });
        function validate(){

          if ($('#tipe-manual').val()!="" && $('#date-manual').val()!="" && $('#pasar-manual').val()!="") {
            $('.input').each(function(i, obj) {
              // console.log(this.id);
              // this.val('');
              console.log($('#'+this.id).val());
              $('#'+this.id).val('');
            });

            // alert("ok");
            $.getJSON('<?php echo base_url("index.php/api/get_manual"); ?>/'+$('#pasar-manual').val()+"/"+$('#tipe-manual').val()+"/"+$('#date-manual').val(), function(result){
              $.each(result,function(key,value){
                // alert(key+value);
                $('#kd'+key).val(value);
              });
              // console.log(result)
            });
          }
        }
      // $('#myDatepicker').datetimepicker();
    </script>
    <script type="text/javascript">
      $('.grfk').on('change',function(){

      });
      function validate_grafik() {
        // body...
        var cek = true;
        if($('grafik-komoditi').val() ==""){
          cek = false;
        }
        if($('grafik-pasar').val() ==""){
          cek = false;
        } 
        return cek;
      }
      $('.btn_tambah').on("click",function(){
        // alert("#form-group-"+this.id);
        $("#form-group-"+this.id).append(form[this.id]);
      });
    </script>
    <script>
      var cek = false;
      $('.grfk').on('change',function(){
        if($('#grafik-komoditi').val()!="" && $('#grafik-pasar').val()!=""){
          // alert("changed");
          // console.log()
          if (typeof myChart !== 'undefined') {
            // your code here
            myChart.destroy();
          }
          $.getJSON('<?php echo base_url("index.php/api/get_grafik_komoditi"); ?>/'+$('#grafik-komoditi').val()+'/'+$('#grafik-pasar').val(),function(result){
            console.log(result.length);
            var d = new Array(result.length);
            var label = new Array(result.length);
            for (var i = 0; i <result.length; i++) {
              d[i] = result[i].harga_harga;
              label[i] = result[i].tanggal_harga;
              console.log(i);
            }
            // console.log(d);
            // console.log(label);
            var ctx = document.geytElementById("mychart").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: label,
                datasets: [{
                  label: 'Harga',
                  data: d,
                  borderColor: 'blue',
                  borderWidth: 2
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero:true
                    }
                  }]
                }
              }
            });
          });
        }
      });
    </script>

    <script type="text/javascript">
      // $(".api").on("change",function(){
      //   alert('ok');
      // });

       $("#pilih").on("click",function(){
          if ($('#minggu').val() !="" && $('#bulan').val() !="" && $('#tahun').val() !="" && $('#select-pasar').val() !='0') {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/index/kelola_ketersediaan_new"); ?>?minggu='+$('#minggu').val()+'&pasar='+$('#select-pasar').val()+'&bulan='+$('#bulan').val()+'&tahun='+$('#tahun').val();
          }
       });
       $("#pilih-edit-ketersediaan").on("click",function(){
          if ($('#minggu').val() !="" && $('#bulan').val() !="" && $('#tahun').val() !="" && $('#select-pasar').val() !='0') {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/index/edit_ketersediaan"); ?>?minggu='+$('#minggu').val()+'&pasar='+$('#select-pasar').val()+'&bulan='+$('#bulan').val()+'&tahun='+$('#tahun').val();
          }
       });
       $(".hapus-ketersediaan").on("click",function(){
          if (confirm('yakin Hapus ?')) {
            if ($('#minggu').val() !="" && $('#bulan').val() !="" && $('#tahun').val() !="" && $('#select-pasar').val() !='0') {
              // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
              window.location.href = '<?php echo base_url("index.php/router/index/edit_ketersediaan"); ?>?minggu='+$('#minggu').val()+'&pasar='+$('#select-pasar').val()+'&bulan='+$('#bulan').val()+'&tahun='+$('#tahun').val()+"&hapus="+this.id;
            }

          }
          return false;          
        });



       $("#pilih-laporan").on("click",function(){
          if ($('#bulan-laporan').val() !="" && $('#tahun-laporan').val() !="" ) {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/index/laporan_ketersediaan"); ?>?bulan='+$('#bulan-laporan').val()+'&tahun='+$('#tahun-laporan').val();
          }
       });

      $("#pilih-laporan-lihat").on("click",function(){
          if ($('#bulan-laporan').val() !="" && $('#tahun-laporan').val() !="" ) {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/index/lihat_ketersediaan"); ?>?bulan='+$('#bulan-laporan').val()+'&tahun='+$('#tahun-laporan').val();
          }
       });
       $("#pilih-grafik-ketersediaan").on("click",function(){
          if ($('#bulan-grafik').val() !="" && $('#tahun-grafik').val() !="" && $('#komoditi-grafik').val() !="" ) {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/index/grafik_ketersediaan"); ?>?bulan='+$('#bulan-grafik').val()+'&tahun='+$('#tahun-grafik').val()+'&komoditi='+$('#komoditi-grafik').val()+"&txtkom="+ $("#komoditi-grafik option:selected").text();
          }
       });
       $("#export-ketersediaan").on("click",function(){
          if ($('#bulan').val() !=""  && $('#tahun').val() ) {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/handlerexportketersediaan"); ?>?bulan='+$('#bulan').val()+'&tahun='+$('#tahun').val();

          }
       });
       $("#harga-valid").on("click",function(){
        // alert('<?php echo base_url('index.php/router/handlervalidasi/harga') ?>'+'?tanggal='+$('#date').val());
        window.location.href = '<?php echo base_url('index.php/router/handlervalidasi/harga') ?>'+'?tanggal='+$('#date').val();
       });
       $(function(){
        <?php  if ( isset($data['perminggu'] )&& $page=="grafik_ketersediaan"): ?>
              var d = new Array(5);
              var label = new Array(5);
            <?php  foreach ($data['perminggu'] as $key => $value): ?>
              d[<?php echo $key-1 ?>] = <?php echo isset($value[0]->total) ? $value[0]->total:0;  ?>;
              label[<?php echo $key-1 ?>] = "Minggu ke <?php echo $key ?>";
            <?php  endforeach ?>
            var ctx = $("#chart-ketersediaan");
            var context = ctx[0].getContext('2d');
            var myChart = new Chart(context, {
              type: 'line',
              data: {
                labels: label,
                datasets: [{
                  label: 'Jumlah (Kg)',
                  data: d,
                  borderColor: 'blue',
                  borderWidth: 2
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                    }
                  }]
                }
              }
            });
          <?php  endif ?>
       });
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
      $("#download-ketersediaan").on("click",function(){
        // alert("masuk");
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('export-ketersediaan-table');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');

        var a = document.createElement('a');
        a.href = data_type + ', ' + table_html;
        a.download = $("#bulan-laporan").val()+"_"+ $("#tahun-laporan").val()+"_" + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
        a.click();
      });
      $("#download-ketersediaan-bulanan").on("click",function(){
          if ($('#bulan-laporan').val() !="" && $('#tahun-laporan').val() !="" ) {
            // alert($('#date-manual').val()+" / "+$('#select-pasar').val());
            window.location.href = '<?php echo base_url("index.php/router/handlerlaporanketersediaan"); ?>?bulan='+$('#bulan-laporan').val()+'&tahun='+$('#tahun-laporan').val();
          }
      });
    </script>
  </body>
</html>