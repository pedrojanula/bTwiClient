<?php
require_once('settings.php');
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>bTwiClient</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/bootstrap.css"/>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="#new" class="icon fa-pencil active"><span>New Tweet</span></a>
						<a href="#config" class="icon fa-cog"><span>Connection</span></a>
					</nav>

					<div id="main">

							<article id="new" class="panel">
								<?php
									if($connected == true){?>
										<div id="infoUser" class="dflex">
											<img src="<?php echo $response->profile_image_url_https ?>"/>
											<label><b><?php echo $response->screen_name ?></b> (<i class="fa fa-at"></i><?php echo $response->screen_name ?>)</label>
										</div>
										<section class="center">
											<textarea rows="3" id="tweetToSend" class="form-control"></textarea>
											<p id="characters" class="text-right">0/140</p>
											<button id="btnTweet" class="btn btn-info btn-lg">Tweet</button>

											<div id="message">
												<div class="alert">NULL</div>
											</div>
										</section>
									<?php }else{ ?>
										<div class="alert alert-danger"><i class="fa fa-times"></i>&nbsp;Authentication Error</div>
									<?php }
								?>
							</article>

							<article id="config" class="panel">
								<header class="center panel-heading">
									<h2>Connection to API</h2>
								</header>

								<hr/>

								<section>
									<?php
										if($connected == true){
											echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i>&nbsp;Connection: Correct.</div>";
									        echo "<h4>Connected as: <a href='https://www.twitter.com/".$response->screen_name."'>".$response->name." (<i class='fa fa-at'></i>".$response->screen_name.")</a>";
									        $img = $response->profile_image_url_https;
									        $img = str_replace("_normal", "", $img);

									        echo "<div id='photoProfile'><img class='img-rounded img-responsive center-block' src='".$img."'/></div>";
										}else{
											echo "<div class='alert alert-danger'><i class='fa fa-times'></i>&nbsp;Authentication Error.</div>";
										}
									?>
								</section>
							</article>
					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; 2016</li><li>Developed by: <a href="https://www.pedrojanula.xyz">Pedro José Anula</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/code.js"></script>

	</body>
</html>