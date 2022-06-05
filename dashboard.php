<?php include 'core/isLogged.php' ?>
<?php include "components/head.php" ?>
<?php include "components/header.php" ?>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'components/sidebar.php' ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <!-- Dashboard Navbar -->
                <?php include 'components/dashboard_navbar.php' ?>


                <div class="container-fluid">

                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">
                            <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
                    </div>

                    <!-- Stats -->
                    <?php include "components/dashboard_stats.php" ?>
                    <!-- /Stats -->

                    <!-- Start: Chart -->
                    <?php include "components/dashboard_chart.php" ?>
                    <!-- End: Chart -->

                    <div class="row">
                        <div class="col-lg-6 mb-4">

                            <!-- Progress -->
                            <?php include "components/dashboard_progress.php" ?>

                            <!-- Todo list -->
                            <?php include "components/dashboard_todolist.php" ?>

                        </div>
                        <div class="col">
                            <!-- Cards -->
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Primary</p>
                                            <p class="text-white-50 small m-0">#4e73df</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Success</p>
                                            <p class="text-white-50 small m-0">#1cc88a</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-info text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Info</p>
                                            <p class="text-white-50 small m-0">#36b9cc</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-warning text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Warning</p>
                                            <p class="text-white-50 small m-0">#f6c23e</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-danger text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Danger</p>
                                            <p class="text-white-50 small m-0">#e74a3b</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card textwhite bg-secondary text-white shadow">
                                        <div class="card-body">
                                            <p class="m-0">Secondary</p>
                                            <p class="text-white-50 small m-0">#858796</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cards -->

                            <div class="col-lg">

                                <!-- Last articles -->
                                <?php include "components/dashboard_lastarticles.php" ?>

                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <?php include 'components/footer.php' ?>


        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
</body>