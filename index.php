<?php
include_once("login/check.php");
$folder="";
$titulo="Página de Inicio";
$subtitulo="";
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
<div class="col-lg-12">
    <div class="hpanel">
        <div class="panel-heading">
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                <!--<a class="closebox"><i class="fa fa-times"></i></a>-->
            </div>
            Página de Inicio
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                      </ol>
                    
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <center>
                          <img src="imagenes/inicio/1.jpg" alt="">
                          </center>
                          <div class="carousel-caption">
                            ...
                          </div>
                        </div>
                        <div class="item">
                            <center>
                          <img src="imagenes/inicio/2.jpg" alt="">
                            </center>
                          <div class="carousel-caption">
                            ...
                          </div>
                        </div>
                        <div class="item">
                            <center>
                          <img src="imagenes/inicio/3.jpg" alt="">
                            </center>
                          <div class="carousel-caption">
                            ...
                          </div>
                        </div>
                        <div class="item">
                            <center>
                          <img src="imagenes/inicio/4.jpg" alt="">
                            </center>
                          <div class="carousel-caption">
                            ...
                          </div>
                        </div>
                    
                      </div>
                    
                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                      </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        <span class="pull-right">
              
        </span>
            
        </div>
    </div>
</div>
</div>

</div>
        
<?php include_once("pie.php");?>