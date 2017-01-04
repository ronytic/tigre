<?php
include_once("login/check.php");
php_start();
$folder="";
$titulo="Distribuidora del SUR";
$subtitulo="";
$titulo2="Página de Inicio";
?>
<?php include_once("cabecerahtml.php");?>
<?php include_once("cabecera.php");?>
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

        
<?php include_once("pie.php");?>