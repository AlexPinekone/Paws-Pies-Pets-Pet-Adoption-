<?php
	require_once "html/CAD.php";
	session_start();
	$_SESSION['errlog'] = false;
	
	if(isset($_SESSION['idUsuario'])) {
		$idUsuario = intval($_SESSION['idUsuario']);
	} else {
		$idUsuario = 0; 
	}
	
	$cad = new CAD();
		
	$mascotas = $cad->obtenerVariasMascotas();
	
	$urls = [];
    foreach ($mascotas as $mascota) {
        $urls[$mascota["idPost"]] = "html/postx.php?id=" . $mascota["idPost"];
    }
?>

<html>
	<head>
		<meta charset="utf-8">
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link href="css/estilo2.css" rel="stylesheet" type="text/css">
		<link href="css/estilo3.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/funcion.js"></script>
		<script type="text/javascript" src="js/carrusel.js"></script>
	</head>
	<body>
		<div class="Principal">
			<div class="Menu">
				<div class="Logo">
					<a href="index.php"><img src="img/LogoP.png"/></a>
				</div>
				<button id="menu-btn" aria-label="Menú desplegable">&#9776;</button>
				<nav id="menu">
				<div class="Enlaces" id="en1">
					<ul class="ListaB">
						<li><a href="index.php"><div class="b">Inicio</div></a></li>
						<li><a href="html/posts.php"><div class="b">Posts</div></a></li>
						<li><a href="html/buscar.php"><div class="b">Buscar</div></a></li>
					</ul>
					
					</div>
					<div class="Enlaces" id="en2">
					
					<ul class="ListaB">
						<li id="creapostbot"><a href="html/crearpost.php"><div class="b">Crear Post</div></a></li>
						<li id="perfilboton"><a href="html/perfilpersonal.php"><div class="b">Perfil</div></a></li>
						<li id="botEscon1"><a href="html/login.php"><div class="b">Ingresar</div></a></li>
						<li id="botEscon2"><a href="html/register.php"><div class="b">Registrarse</div></a></li>
					</ul>
				</div>
				</nav>
			</div>
			<script>
				
				var idUsuario = <?php echo $idUsuario; ?>;
				console.log("Usuario: "+idUsuario);
				// Verifica si la sesión está iniciada
				var sesionIniciada = <?php echo isset($_SESSION['iniciada']) && $_SESSION['iniciada'] ? 'true' : 'false'; ?>;

				// Función para mostrar u ocultar los botones
				function toggleBotones() {
					var bot1 = document.getElementById('botEscon1');
					var bot2 = document.getElementById('botEscon2');
					var crea = document.getElementById('creapostbot');
					var perfil = document.getElementById('perfilboton');
					
					if (sesionIniciada) {
						crea.style.display = 'block';
						perfil.style.display = 'block';
						bot1.style.display = 'none';
						bot2.style.display = 'none';
					} else {
						bot1.style.display = 'block';
						bot2.style.display = 'block';
						crea.style.display = 'none';
						perfil.style.display = 'none';
					}
				}

				// Llama a la función cuando la página se carga
				window.onload = toggleBotones();
			</script>
			<div class="Intermedio">
				<div class="contCarru">
				<div class="Carrusel">
					<img src="img/bk1.jpg" alt="Imagen 1" class="slide active"/>
					<img src="img/bk2.jpg" alt="Imagen 2" class="slide"/>
					<img src="img/bk3.jpg" alt="Imagen 3" class="slide"/>
					
					<button id="prevBtn"><</button>
					<button id="nextBtn">></button>
				</div>
				</div>
			<div class="Espacio3"></div>
			<div class="ContenedorT">
					<h2>¡BIENVENIDO A PAWS PIES & PETS!</h2>
					<p>¡Adelante, explora todas las ventajas que tenemos!</p>
					
					<img src="img/pastel.png">
			</div>
				
			<div class="Titulo">VENTAJAS</div>
			<div class="sub1">
				<div class="Contenedor" id="c2">
					<h2>Explora y encuentra tu mascota ideal</h2>
					<p>Creemos firmemente en darle una segunda oportunidad a aquellos animales que necesitan un hogar amoroso. 
					La adopción no solo salva vidas, también enriquece la tuya con amor incondicional!</p>
					<div class="imInter">
					<img src="img/st1.png" class="imInterA">
					</div>
				</div>
				<div class="Contenedor" id="c2">
					<h2>Ayuda a los animales que lo necesitan</h2>
					<p>Al adoptar una mascota, estás cambiando su destino. 
					En lugar de contribuir al problema de la sobrepoblación de animales abandonados, 
					estás siendo parte de la solución.</p>
					<div class="imInter">
					<img src="img/st2.jpg" class="imInterA">
					</div>
				</div>
				<div class="Contenedor" id="c2">
					<h2>Los beneficios de adoptar</h2>
					<p>La adopción de mascotas es una experiencia gratificante tanto para el animal como para el adoptante. 
					Obtendrás un compañero leal que estará contigo en las buenas y en las malas.</p>
					<div class="imInter">
					<img src="img/st3.jpg" class="imInterA">
					</div>
				</div>
			</div>
			
			<div class="Titulo">ADOPTA A:</div>
				<div class="Mascotas">
                
				<?php 
					$cont = 0;
					foreach ($mascotas as $mascota): if($cont>7){break;}?>
					<div class="Mascota">
						<a href="<?php echo $urls[$mascota["idPost"]]; ?>">
							<?php
								echo "<img src='data:image/;base64,".base64_encode($mascota["foto"])."' alt='Mascota'>";
							?>
							<p><?php echo $mascota["nombre"]; ?></p>
						</a>
					</div>
				<?php $cont++; ?>
				<?php endforeach; ?>
				
        </div>
			<div class="Contenedor" id="c3">
					<h2>Únete a la Comunidad de Adopción:</h2>
					<p>Al adoptar, te conviertes en parte de una comunidad dedicada a mejorar la vida de los animales necesitados. 
					Comparte tus experiencias de adopción en las redes sociales, 
					participa en eventos de adopción y apoya a organizaciones que trabajan incansablemente para rescatar y rehabilitar a los animales abandonados. 
					Juntos, podemos marcar la diferencia en la vida de innumerables mascotas</p>
					<img src="img/shiba.png" alt="Imagen 2">
			</div>
        </div>
			<script type="text/javascript" src="js/menudes.js"></script>
			<div class="Pie">
				<div class="Informacion">
					<h3>Contacto</h3>
					<p>Correo electrónico: info@pawspiespets.com</p>
					<p>Teléfono: +42 123 1234</p>
					<p>Dirección: #42 Calle Juan, San Luis Potosí, México</p>
				</div>
				<div class="EnlacesPie">
					<h3>Enlaces útiles</h3>
					<ul>
						<li><a href="html/pdp.php">Política de privacidad</a></li>
						<li><a href="html/tyc.php">Términos y condiciones</a></li>
						<li><a href="html/pf.php">Preguntas Frecuentes</a></li>
					</ul>
				</div>
				<div class="RedesSociales">
					<h3>Síguenos en redes sociales</h3>
					<ul>
						<li><a href="https://www.facebook.com"><img src="img/facebook.png" alt="Facebook"></a></li>
						<li><a href="https://www.x.com"><img src="img/x.png" alt="X"></a></li>
						<li><a href="https://www.instagram.com"><img src="img/instagram.png" alt="Instagram"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>	
</html>