<?php

?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
<div class="col-lg-12">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                <a class="closebox"><i class="fa fa-times"></i></a>
            </div>
            Dashboard information and statistics
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="small">
                        <i class="fa fa-bolt"></i> Page views
                    </div>
                    <div>
                        <h1 class="font-extra-bold m-t-xl m-b-xs">
                            226,802
                        </h1>
                        <small>Page views in last month</small>
                    </div>
                    <div class="small m-t-xl">
                        <i class="fa fa-clock-o"></i> Data from January
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center small">
                        <i class="fa fa-laptop"></i> Active users in current month (December)
                    </div>
                    <div class="flot-chart" style="height: 160px">
                        <div class="flot-chart-content" id="flot-line-chart"></div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="small">
                        <i class="fa fa-clock-o"></i> Active duration
                    </div>
                    <div>
                        <h1 class="font-extra-bold m-t-xl m-b-xs">
                            10 Months
                        </h1>
                        <small>And four weeks</small>
                    </div>
                    <div class="small m-t-xl">
                        <i class="fa fa-clock-o"></i> Last active in 12.10.2015
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        <span class="pull-right">
              You have two new messages from <a href="#">Monica Bolt</a>
        </span>
            Last update: 21.05.2015
        </div>
    </div>
</div>
</div>

</div>
        
<?php include_once("pie.php");?>