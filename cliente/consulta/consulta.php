
<!DOCTYPE HTML>
<html>
<head id="Head1">
    <title>Clínica Huellas</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../../assets/css/main.css" />
    
    
</head>
<body>
	<!-- Header -->
	<header id="header">
		<div class="inner" >
			<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
			<p class="logo" style="margin-top:3%"><strong>CLIENTE</strong></p>
			<a style="float:right; width:10%;" href="../../cerrarSesion.php"><img style="width:30%" src="../../images/logout.png"></a>
                <nav id="nav" >
					<a href="../clienteDatos.php">Datos</strong></a>
					<a href="../galeria.html">Galería</a>
					<a href="../ofertas.html">Ofertas</a>
					<a><strong>Consulta y Peluquería</strong></a>
					<a href="../tienda.php">Tienda online</a>
					<a href="../opiniones.php">Opiniones</a>
					<a href="../contacto.php">Contacto</a>
				</nav>                              
		</div>		
	</header>
	<!-- Banner -->
	<section id="banner" style="background-image:url(../../images/fondopeque.jpeg);  padding-bottom:0;"> 
		<div class="inner" >                     
		</div>
	</section> 
	
    <div>       
            
        <div id="caltoolbar" class="ctoolbar">
            <div id="faddbtn" class="fbutton">
				<div><span title='Cita' class="addcal">Solicita cita</span></div>    
            </div>
			
            <div class="btnseparator"></div>

            <div id="showdaybtn" class="fbutton">
                <div><span title='Dia' class="showdayview">Día</span></div>
            </div>
            <div  id="showweekbtn" class="fbutton fcurrent">
                <div><span title='Semana' class="showweekview">Semana</span></div>
            </div>
            <div  id="showmonthbtn" class="fbutton">
                <div><span title='Mes' class="showmonthview">Mes</span></div>
            </div>
			
            <div class="btnseparator"></div>
			
            <div  id="showreflashbtn" class="fbutton">
                <div><span title='Actualiza' class="showdayflash">Actualiza</span></div>
            </div>
			
            <div class="btnseparator"></div>
			
            <div id="sfprevbtn" title="Anterior"  class="fbutton"><span class="fprev"></span></div> 
            <div id="sfnextbtn" title="Siguiente" class="fbutton"><span class="fnext"></span></div>
                
            
            <div class="fshowdatep fbutton">
                    <div>
                        <input type="hidden" name="txtshow" id="hdtxtshow" />
                        <span id="Fecha">Loading</span>
                    </div>
            </div>
            
            <div class="clear"></div>
        </div>
    </div>
    <div style="padding:1px;">

        <div class="t1 chromeColor">&nbsp;</div>
            
        <div class="t2 chromeColor">&nbsp;</div>
        <div id="dvCalMain" class="calmain printborder">
            <div id="gridcontainer" style="overflow-y: visible;"></div>
        </div>
        <div class="t2 chromeColor">&nbsp;</div>
        <div class="t1 chromeColor">&nbsp;</div>   
    </div>     
  </div>
    
</body>
</html>
