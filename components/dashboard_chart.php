<div class="row">
    
    <script src="assets/js/chart.min.js"></script>
    
    <!-- Line Chart -->
    <div class="col-lg-7 col-xl-8">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Minutes Watched</h6>
                <div class="dropdown no-arrow">
                    <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </button>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                        <p class="text-center dropdown-header">Options :</p>
                        <a class="dropdown-item" href="#">&nbsp;Action</a>
                        <a class="dropdown-item" href="#">&nbsp;Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">&nbsp;Export Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas data-bss-chart='{"type":"line","data":{"labels":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug"],"datasets":[{"label":"Minutes","fill":true,"data":["0","1","5","15","10","20","24","25"],"backgroundColor":"rgba(78, 115, 223, 0.05)","borderColor":"rgba(78, 115, 223, 1)"}]},"options":{"maintainAspectRatio":false,"legend":{"display":false,"labels":{"fontStyle":"normal"}},"title":{"fontStyle":"normal"},"scales":{"xAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"],"drawOnChartArea":false},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}],"yAxes":[{"gridLines":{"color":"rgb(234, 236, 244)","zeroLineColor":"rgb(234, 236, 244)","drawBorder":false,"drawTicks":false,"borderDash":["2"],"zeroLineBorderDash":["2"]},"ticks":{"fontColor":"#858796","fontStyle":"normal","padding":20}}]}}}'>
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /Line Chart -->
    
    <!-- Doughnut Chart -->
    <div class="col-lg-5 col-xl-4">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Courses categories</h6>
                <div class="dropdown no-arrow">
                    <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </button>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                        <p class="text-center dropdown-header">Options :</p>
                        <a class="dropdown-item" href="#">&nbsp;Action</a>
                        <a class="dropdown-item" href="#">&nbsp;Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">&nbsp;Export Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas data-bss-chart='{"type":"doughnut","data":{"labels":["CSS","Javascript","Git"],"datasets":[{"label":"","backgroundColor":["#4e73df","#1cc88a","#36b9cc"],"borderColor":["#ffffff","#ffffff","#ffffff"],"data":["50","30","15"]}]},"options":{"maintainAspectRatio":false,"legend":{"display":true,"labels":{"fontStyle":"normal","usePointStyle": true}},"title":{"fontStyle":"normal"}}}'>
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /Doughnut Chart -->
    
</div>