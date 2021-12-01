

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SPK Pemilihan Karyawan</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/pages/auth-light.css" rel="stylesheet" />
	
</head>

        
<body class="bg-blue-300" id="login">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.php">PT. PARAMOUNT BED INDONESIA</a>
        </div>
    <form id="formlogin" method="POST" action="ceklogin.php">
            <h2 class="login-title">SPK Pemilihan Karyawan Terbaik</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <input class="form-control" type="text" name="username" placeholder="Username" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>

            
            <div class="text-center">
                <div class="alert alert-danger" style="display:none;" id="alert"><i class="fa fa-info-circle fa-lg"></i><p id="value"></p></div>

            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="assets/js/app.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="asset/js/jquery.js" type="text/javascript"></script>
        <script type="text/javascript">

$(document).ready(function () {
    $(document).on('click','#hapus',function (e) {
        e.preventDefault();
        var data=$(this).data('a');
        var url=$(this).attr('href');
        var confirm=window.confirm("Apakah anda ingin mengahapus data "+data+" ?");
        if (confirm==true){
            $.ajax({
                type:'GET',
                url:url,
                dataType:'JSON',
                cache:false,
                success:function (e) {
                    if (e=='success'){
                        alert('berhasil hapus data!');
                        setTimeout(function () {
                            location.reload();
                        },100);
                    }else{
                        alert('Gagal Hapus data'+e);
                    }
                }
            });
        }else{
            return false;
        }
    });
    $('a#out').click(function () {
        var confirm=window.confirm("Apakah anda ingin keluar ?");
        if (confirm == true){
            return true;
        }else{
            return false;
        }
    });
    $('form#form').on('submit',function (e) {
        e.preventDefault();
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.ajax({
            url:url,
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend:function(){
                $("#buttonsimpan").html("process..");
                $("input,#buttonsimpan,#buttonreset").attr('disabled',true);
            },
            success:function (e) {
                if (e=='success'){
                    alert('Berhasil Memasukan Data!');
                    setTimeout(function () {
                        location.reload();
                    },100);
                }else if (e=='ada data'){
                    alert('Data tidak Boleh sama!');
                    setTimeout(function () {
                        location.reload();
                    },100);
                }else if (e=='failed'){
                    alert('Gagal Memasukan data!');
                    setTimeout(function () {
                        location.reload();
                    },100);
                }else{
                    alert('Berhasil Update Data!');
                    window.location.href=e;
                }
            }
        })
    })
    $('form#formlogin').on('submit', function(event) {
        event.preventDefault();
        var url=$(this).attr('action');
        var data=$(this).serialize();
        $.ajax({
            url:url,
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend:function(){
                $("#buttonsimpan").html("process..");
                $("input,#buttonsimpan,#buttonreset").attr('disabled',true);
            },
            success:function(e){
                if (e=='success') {
                    location.reload();
                }else{
                    $('#value').html(e);
                        $('#alert').slideDown('slow', function() {
                        setTimeout(function () {
                            location.reload();
                        },1500);
                    });
                }
            }
        });
    });
    $('button#hidden').on('click',function () {
        $('ul.nav').slideToggle();
    })
    $('button#btn-dropdown').on('click',function () {
        $(this).next('#panel-dropdown').toggleClass('show');
    })
    $('#isiSubkriteria').load("./proses/proseslihat.php/?op=subkriteria");
    $('#pilih').change(function() {
        var value =$(this).val();
        $('#isiSubkriteria').hide().load("./proses/proseslihat.php/?op=subkriteria&id="+value).fadeIn('400');
    });
    $('#isiNilai').load("./proses/proseslihat.php/?op=nilai");
    $('#pilihNilai').change(function() {
        var value =$(this).val();
        $('#isiNilai').hide().load("./proses/proseslihat.php/?op=nilai&id="+value).fadeIn('400');
    });
    $("#pilihHasil").change(function() {
        var value=$(this).val();
        $("#valueHasil").hide("slow");
        document.cookie="pilih="+value+";expires=3600;path=/";
        if (getCookieData) {
            $("#valueHasil").load("./hasil.php").slideToggle("slow");
            $('button#btn-dropdown').attr('disabled', false);
        }
    });
    function getCookieData(){
        var data=getCookie("pilih");
        if (data==null && data=="") {
            return false;
        }else{
            return true;
        }
    }
    $('button#btn-dropdown').attr('disabled', true);
})
        </script>
</body>

</html>