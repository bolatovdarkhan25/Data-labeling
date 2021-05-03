<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @include('layouts.breadcrumb')
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
                        <div class="large">{{$allUsersCount}}</div>
                        <div class="text-muted">Users</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-user-plus color-teal"></em>
                        <div class="large">{{$newUsersForWeekCount}}</div>
                        <div class="text-muted">New users for the last 7 days</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-microphone color-gray"></em>
                        <div class="large">{{$newUsersForWeekCount}}</div>
                        <div class="text-muted">Audio files annotated</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Application Overview
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>

</div>	<!--/.main-->
