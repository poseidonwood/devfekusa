<?php
require './connect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>SPK</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="assets/css/main.min.css" rel="stylesheet" />
        <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />



    </head>

    <body class="fixed-navbar">
        <div class="page-wrapper">
            <!-- START HEADER-->
            <header class="header">
                <div class="page-brand" style="background-color:white;">
                    <span class="brand">    
                        <div>
                            <img src="./assets/img/logo.png"  />
                        </div>
                    </span>
                    <span class="brand-mini" style=" color:black;">PR</span>

                </div>
                <div class="flexbox flex-1">
                    <!-- START TOP-LEFT TOOLBAR-->
                    <ul class="nav navbar-toolbar">
                        <li>
                            <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                        </li>
                    </ul>
                    <!-- END TOP-LEFT TOOLBAR-->
                    <!-- START TOP-RIGHT TOOLBAR-->
                    <ul class="nav navbar-toolbar">
                        <li class="dropdown dropdown-user">
                            <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                                <img src="./assets/img/admin-avatar.png" />
                                <span></span><?php echo $_SESSION['user']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="./logout.php" id="out" ><i class="fa fa-power-off"></i>Logout</a>
                            </ul>
                        </li>
                    </ul>
                    <!-- END TOP-RIGHT TOOLBAR-->
                </div>
            </header>
            <!-- END HEADER-->
            <!-- START SIDEBAR-->
            <nav class="page-sidebar" id="sidebar">
                <div id="sidebar-collapse">
                    <div class="admin-block d-flex">
                        <div>
                            <img src="./assets/img/admin-avatar.png" width="45px" />
                        </div>
                        <div class="admin-info">
                            <div class="font-strong"><?php echo $_SESSION['user']; ?></div><small>Administrator</small></div>
                    </div>
                    <?php
                    if ($_SESSION['role'] == "1") {
                        include 'navigation_bagian.php';
                    } else if ($_SESSION['role'] == "2")  {
                        include 'navigation_departement.php';
                    } else  {
                        include 'navigation_admin.php';
                    }
                    ?>

                </div>
            </nav>
            <!-- END SIDEBAR-->
            <div class="content-wrapper">
                <!-- START PAGE CONTENT-->
                <?php include "page.php"; ?>

                <!-- END PAGE CONTENT-->
                <footer class="page-footer">
                    <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
                </footer>
            </div>
        </div>

        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>
        <!-- END PAGA BACKDROPS-->

        <!-- CORE SCRIPTS-->
        <script src="./assets/js/main.js" type="text/javascript"></script>


        <!-- CORE PLUGINS-->
        <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->
        <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
        <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
        <script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/js/app.min.js" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

        <script type="text/javascript">


            $(function () {
                $('#pegawai-table').DataTable({
                    pageLength: 10,
                    //"ajax": './assets/demo/data/table_data.json',
                    "aoColumns": [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": false}
                    ]});

                $('#bagian-table').DataTable({
                    pageLength: 10,
                    //"ajax": './assets/demo/data/table_data.json',
                    "aoColumns": [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": false}
                    ]});

            })


            $(document).ready(function () {
                $(document).on('click', '#hapus', function (e) {
                    e.preventDefault();
                    var data = $(this).data('toggle');
                    var url = $(this).attr('href');
                    var confirm = window.confirm("Apakah anda ingin mengahapus data " + data + " ?");
                    if (confirm == true) {
                        $.ajax({
                            type: 'GET',
                            url: url,
                            dataType: 'JSON',
                            cache: false,
                            success: function (e) {
                                if (e == 'success') {
                                    alert('berhasil hapus data!');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 100);
                                } else {
                                    alert('Gagal Hapus data' + e);
                                }
                            }
                        });
                    } else {
                        return false;
                    }
                });
                $('a#out').click(function () {
                    var confirm = window.confirm("Apakah anda ingin keluar ?");
                    if (confirm == true) {
                        return true;
                    } else {
                        return false;
                    }
                });
                $('form#form').on('submit', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var data = $(this).serialize();
                    $.ajax({
                        url: url,
                        data: data,
                        dataType: 'JSON',
                        type: 'POST',
                        beforeSend: function () {
                            $("#buttonsimpan").html("process..");
                            $("input,#buttonsimpan,#buttonreset").attr('disabled', true);
                        },
                        success: function (e) {
                            
                            console.log(e);
                            if (e == 'success') {
                                alert('Berhasil Memasukan Data!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else if (e == 'ada data') {
                                alert('Data tidak Boleh sama!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else if (e == 'failed') {
                                alert('Gagal Memasukan data!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else {
                                alert('Berhasil Update Data!');
                                window.location.href = e;
                            }
                        }
                    })
                });
                $('form#formUpload').on('submit', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var data = new FormData(this); // <-- 'this' is your form element

                    $.ajax({
                        url: url,
                        data: data,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $("#buttonsimpan").html("process..");
                            $("input,#buttonsimpan,#buttonreset").attr('disabled', true);
                        },
                        success: function (e) {
                            console.log(e);

                                var reply = JSON.parse(e);

                            if (reply == '1') {
                                alert('Berhasil Memasukan Data!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else if (reply == '0') {
                                alert('Gagal Memasukan data!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else {
                                alert('Server Error!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            }
                        }
                    })
                });

                $('form#formEditUpload').on('submit', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('action');
                    var data = new FormData(this); // <-- 'this' is your form element

                    $.ajax({
                        url: url,
                        data: data,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $("#buttonsimpan").html("process..");
                            $("input,#buttonsimpan,#buttonreset").attr('disabled', true);
                        },
                        success: function (e) {
                            console.log(e);
                              var value = JSON.parse(e);

                             if (value == '0') {
                                alert('Gagal Memasukan data!');
                                setTimeout(function () {
                                    location.reload();
                                }, 100);
                            } else {
                                alert('Berhasil Update Data!');
                                window.location.href = e;
                            }
                        }
                    })
                });

                $('form#login-form').on('submit', function (event) {
                    event.preventDefault();
                    var url = $(this).attr('action');
                    var data = $(this).serialize();
                    $.ajax({
                        url: url,
                        data: data,
                        dataType: 'JSON',
                        type: 'POST',
                        beforeSend: function () {
                            $("#buttonsimpan").html("process..");
                            $("input,#buttonsimpan,#buttonreset").attr('disabled', true);
                        },
                        success: function (e) {
                            if (e == 'success') {
                                location.reload();
                            } else {
                                $('#value').html(e);
                                $('#alert').slideDown('slow', function () {
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1500);
                                });
                            }
                        }
                    });
                });
                $('button#hidden').on('click', function () {
                    $('ul.nav').slideToggle();
                })
                $('button#btn-dropdown').on('click', function () {
                    $(this).next('#panel-dropdown').toggleClass('show');
                })

                /// SUB KRITERIA
                $('#isiSubkriteria').load("./action/action_view.php/?op=sub_kriteria");
                $('#pilih').change(function () {
                    var value = $(this).val();
                    $('#isiSubkriteria').hide().load("./action/action_view.php/?op=sub_kriteria&id=" + value).fadeIn('400');
                });

                // Bagian
                $('#isiPegawai').load("./action/action_view.php/?op=pegawai");
                $('#bagian').change(function () {
                    var value = $(this).val();
                    console.log(value);
                    $('#isiPegawai').hide().load("./action/action_view.php/?op=pegawai&id=" + value).fadeIn('400');
                });


                // NILAI
                $('#isiNilai').load("./action/action_view.php/?op=nilai");
                $('#pilihNilai').change(function () {
                    var value = $(this).val();
                    $('#isiNilai').hide().load("./action/action_view.php/?op=nilai&id=" + value).fadeIn('400');
                });
                $("#pilihHasil").change(function () {
                    var value = $(this).val();
                    var idBagian =  <?php echo @$_SESSION[id_bagian]; ?> 
                    $("#valueHasil").hide("slow");
                    $("#valuePrint").hide("slow");

                    document.cookie = "pilih=" + value + ";expires=3600;path=/";
                    document.cookie = "idBagian=" + idBagian + ";expires=3600;path=/";

                    if (getCookieData) {
                        $("#valueHasil").load("./hasil.php").slideToggle("slow");
                        $('#valuePrint').load("./print_button.php").slideToggle("slow")
                        $('button#btn-dropdown').attr('disabled', false);
                    }
                });

                $("#pilihHasilBeranda").change(function () {
                    var value = $(this).val();
                    $("#valueHasilBeranda").hide("slow");

                    var value = $(this).val();
                    var idBagian =  <?php echo @$_SESSION[id_bagian]; ?> 
                    document.cookie = "pilih=" + value + ";expires=3600;path=/";
                    document.cookie = "idBagian=" + idBagian + ";expires=3600;path=/";

                    if (getCookieData) {
                        $("#valueHasilBeranda").load("./hasil_beranda.php").slideToggle("slow");
                        $('button#btn-dropdown').attr('disabled', false);
                    }
                });

                function getCookieData() {
                    var data = getCookie("pilih");
                    if (data == null && data == "") {
                        return false;
                    } else {
                        return true;
                    }
                }
                $('button#btn-dropdown').attr('disabled', true);
            })

        </script>
    </body>

</html>