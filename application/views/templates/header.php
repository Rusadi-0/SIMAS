<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SIMAS | <?= $title; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>icons/materialdesignicons.min.css">

    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.ico">

    <link href="<?= base_url('assets/'); ?>plugins/morris/morris.css" rel="stylesheet">

    <!-- <link href="<?= base_url('assets/'); ?>css/bootstrap.css" rel="stylesheet" type="text/css"> -->
    <link href="<?= base_url('assets/'); ?>css/bootstrapp.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet" type="text/css">

    <!-- Alertify css -->
    <link href="<?= base_url('assets/'); ?>plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.css">
    <!-- DATATABLE -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/fixedHeader.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/responsive.bootstrap4.css">

    <!-- Dropzone css -->
    <link href="<?= base_url('assets/'); ?>plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>plugins/dropify/css/dropify.min.css" rel="stylesheet">


    <script src="<?= base_url('assets/'); ?>js/jquery-3.6.0.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.dataTabless.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dataTables.fixedHeader.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dataTables.responsive.js"></script>
    <script src="<?= base_url('assets/'); ?>js/responsive.bootstrap4.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                responsive: true,
                "order": [
                    [0, "asc"]
                ]

            });

            new $.fn.dataTable.FixedHeader(table);
        });
        $(document).ready(function() {
            var table = $('#myUse').DataTable({
                responsive: true,
                "order": [
                    [0, "desc"]
                ]

            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>





    <!-- Navigation Bar================================================================================-->
    <header id="topnav">