<?php

$mysqli = new mysqli("localhost", "root", "", "flastats");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!($stmt = $mysqli->prepare("SELECT url, titulo FROM noticias ORDER BY id DESC"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}


if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->bind_result($url, $titulo);

 /* fetch values */

 $stmt->fetch() ;
    printf ("<div class='col-md-5'> 
			<div class='imagemnews'>
				<a href='#'><img src='%s' class='img-responsive imgnews' alt='Responsive image'>
			</div> <!-- imagemnews -->
				<div class='titulonewsmajor'>%s</a></div> 
		</div> <!-- colmd5 -->", $url, $titulo);

$stmt->fetch() ;
    printf ("<div class='col-md-5'>

				<div class='row'>

					<div class='col-md-6'>
						<div class='imagemnews'>
							<a href='#'><img src='%s' class='img-responsive imgnews' alt='Responsive image'> 	
							</div> 
							<div class='titulonews'>%s</a>
							</div>
						</div> <!-- colmd6 -->",$url, $titulo);
     $stmt->fetch() ;
    printf ("<div class='col-md-6'>
							<div class='imagemnews'>
								<a href='#'><img src='%s' class='img-responsive imgnews' alt='Responsive image'>
								</div> 
								<div class='titulonews'> %s </a>
								</div>
							</div> <!-- colmd6 -->

						</div> <!-- row -->", $url, $titulo);

$stmt->fetch() ;
    printf ("<div class='row' style='padding-top:15px;'>
					<div class='col-md-6'>
						<div class='imagemnews'>
							<a href='#'><img src='%s' class='img-responsive imgnews' alt='Responsive image'> 	
							</div> 
							<div class='titulonews'>%s</a>
							</div>
						</div> <!-- colmd6 -->", $url, $titulo);


     $stmt->fetch() ;
    printf ("<div class='col-md-6'>
							<div class='imagemnews'>
								<a href='#'><img src='%s' class='img-responsive imgnews' alt='Responsive image'>
								</div> 
								<div class='titulonews'> %s </a>
								</div>
							</div> <!-- colmd6 -->

						</div> <!-- row --> 
						</div> <!-- colmd5 -->
						<div class='col-md-2' ><script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
<!-- lateral-flastats-links1 -->
<ins class='adsbygoogle'
     style='display:inline-block;width:200px;height:90px'
     data-ad-client='ca-pub-7022559953706730'
     data-ad-slot='7747916404'></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br><script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
<!-- lateral-flastats-links1 -->
<ins class='adsbygoogle'
     style='display:inline-block;width:200px;height:90px'
     data-ad-client='ca-pub-7022559953706730'
     data-ad-slot='7747916404'></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br><script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
<!-- lateral-flastats-links1 -->
<ins class='adsbygoogle'
     style='display:inline-block;width:200px;height:90px'
     data-ad-client='ca-pub-7022559953706730'
     data-ad-slot='7747916404'></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>	",$url, $titulo);

    /* close statement */
 $stmt->close();

?>