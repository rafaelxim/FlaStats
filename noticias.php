<?php
$idnoticia= $_GET['caminho'];

$mysqli = new mysqli("mysql.hostinger.com.br", "u858014573_rafsx", "14041404", "u858014573_rafsx");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT data, url, titulo, texto, fonte FROM noticias WHERE caminho=(?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

$stmt->bind_param("s", $idnoticia);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($data, $url, $titulo, $texto, $fonte);

 /* fetch values */

 $stmt->fetch() ;
    
 $stmt->close();
$date = date_create($data);

 ?>

<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'
xmlns:og='http://ogp.me/ns#'>
<head lang="pt-br">
	<!-- meta propertys para redes sociais -->
	<meta property='og:title' content= <?php printf("'%s'",$titulo) ?>/>
	<meta property='og:description' content='Estatísticas' >
	<meta property='og:url' content=<?php printf("'http://www.flastats.com/noticias/%s'",$idnoticia) ?>>
	<meta property='og:image' content=<?php printf('%s',$url) ?>>
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Fla Stats' /> 
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Veja as estatísticas geral do Flamengo separada por jogos. ">
	<meta name="keywords" content="Futebol, Scout, Estatísticas, Narração, Campeonatos, Time, Jogadores, Programação, Televisão, Brasileiro, Brasileirão, Copa do Brasil, Libertadores, Campeonato Carioca, Flamengo, Passes, Lançamentos, Passes Chave, Passes Decisivos, Passes Totais">
	<meta name="robots" content="index, follow">
	<!-- css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/custom.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>

	<!-- Script jQuery -->
	<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	
	<!-- Fim script -->
	<script type="text/javascript">
		$(document).ready(function(){

			(function(d, s, id){
    var js,
        fjs = d.getElementsByTagName(s)[0],
        p = (('https:' == d.location.protocol) ? 'https://' : 'http://'),
        r = Math.floor(new Date().getTime() / 1000000);
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id; js.async=1;
    js.src = p + "www.opinionstage.com/assets/loader.js?" + r;
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'os-widget-jssdk'));

$( window ).scroll(function() {
					var local = $( window ).scrollTop();
					if ((local)<30) 
						{
							$('#logoimg').slideDown();
							$('#logoimg2').fadeOut(1);
						}
					else 
					{
					$('#logoimg').slideUp();					
					$('#logoimg2').fadeIn(1500);
					}
				});
			
			(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
			
		});
	</script>
	<title> <?php printf("%s", $titulo) ?> </title>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76145926-2', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

<!-- container principal -->
<div class="container-fluid">
	<!-- navbar -->
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid" style="padding: 0px">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">
							<img id="logoimg" alt="Brand" src="../imagens/logosmall.png">
							<img id="logoimg2" alt="Brand" src="../imagens/logosmall.png">
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="hvr-overline-from-left"><a href="http://www.flastats.com/index.html">HOME <span class="sr-only">(current)</span></a></li>
							<li class="hvr-overline-from-left"><a href="http://www.flastats.com/noticias_flamengo.html">NOTÍCIAS/COLUNAS </a></li>
							<li class="hvr-overline-from-left"><a href="http://www.flastats.com/estatisticas.html">ESTATÍSTICAS</a></li>
							<li class="hvr-overline-from-left"><a href="http://www.flastats.com/entenda.html">ENTENDA AS ESTATÍSTICAS</a></li>
						</ul>			
						<div class="socialbar">
						<div id="seguirtwitter">
							<a href="http://www.twitter.com/flastats_web" target="_blank"> 
							<i class="fa fa-twitter"></i></a>
						</div>
						<div id="seguirfacebook">
							<a href="http://www.facebook.com/flastats" target="_blank"> 
							<i class="fa fa-facebook"></i></a>
						</div>
						 </div>		<!-- social bar -->						
					</div><!-- /.navbar-collapse -->
				</div> <!-- container da barra de nav -->
			</nav>
		</div>
	</div>
	<div class="row noticias">
		<div class="row navegar"> 
		<ol class="breadcrumb">
  <li><a href="http://www.flastats.com/index.html">Home</a></li>
  <li class="active">Colunas/ Notícias</li>
</ol>
</div>
		<div class="col-md-8 col-md-offset-1 noticiafull">
		<div id="titulonoticia"><h1><?php printf("%s",$titulo) ?></h1></div>
		<div id="fontedata">Por <b><?php printf("%s",$fonte) ?></b> - <?php echo date_format($date, 'd/m/Y'); ?></div>
		<hr>
		<div id="imagemnoticia"><p align="center"><img src=<?php printf("'%s'",$url) ?> class='img-responsive' alt='Responsive image'> </p></div>
		<div id="textonoticia"><?php printf("%s",$texto) ?></div>
<hr>
		<div id="compartilhar"><a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="Flamengo">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script> 
	<span class="fb-share-button" data-href=<?php printf("'http://www.flastats.com/noticias/%s'",$idnoticia) ?> data-layout="button_count"></span>
</div>
		<hr>
		<div id="fb"><div class="fb-comments" data-href=<?php printf("'http://www.flastats.com/noticias/%s'",$idnoticia) ?> data-width="100%" data-numposts="5"></div></div>
		</div><!-- col da noticia -->

		<div class="col-md-3"> 
  

<div class="os_poll" data-path="/polls/2346692" data-width="250" ></div>
<div id="adddddsense"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- flastats-noticias-lateral-1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:90px"
     data-ad-client="ca-pub-7022559953706730"
     data-ad-slot="8387044804"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- flastats-noticias-lateral-1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:200px;height:90px"
     data-ad-client="ca-pub-7022559953706730"
     data-ad-slot="8387044804"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
<!-- google_ad_section_start -->
<div> <h2 id='artesport'>Em breve no site: análise e avaliação de artigos esportivos, chuteiras, chuteira society, chuteira futsal, tênis futsal, e outros</h2></div>
<!-- google_ad_section_end -->

		</div><!-- col dos anuncios -->

	</div><!-- row  -->

					</div> <!-- container principal-->

				</body>
				</html>