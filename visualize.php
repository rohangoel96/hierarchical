<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>MultiStream</title>
<link rel="shortcut icon" type="image/png" href="img/favicon.png" />

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/styles.css"></link>
<link rel="stylesheet" type="text/css" href="css/loader.css"></link>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>

<!-- FONTS used for icons -->
<link href="fonts/font-awesome-4.2.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/d3.min.js"></script>
<script type="text/javascript" src="js/compVecOut.js"></script>
<script type="text/javascript" src="js/rpoly.js"></script>
<script type="text/javascript" src="js/PolyReCoeffInT.js"></script>
<script type="text/javascript" src="js/svg-crowbar-2.js"></script>
<script type="text/javascript" src="js/chroma.js"></script>

<script type='text/javascript'>
			<?php
			$indexSelect = $_POST ["dataset"];
			switch ($indexSelect) {
				case 0 :
					$name = "Music genre evolution";
					$fileName = "Music_genre_evolution";
					$filePath = "source/music_genre_evolution/json/" . $fileName . ".json";
					$timePolarity = 5; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
					$nTimeGranularity = 1; // interval by nGranularity minimum 1 max 5
					$getText = TRUE; // to get the text of the values
					$description = "<strong>About: </strong>This visualization shows the evolution of music genres<br><strong>Period: </strong>From 1960 to 2016<br><strong>Dataset: </strong>10,642 bands. Metadata comes from MusicBrainz web site";
					break;
 				case 1 :
// 					$name = "Sentiment analysis of the 2016 US presidential election day";
// 					$fileName = "2016_US_presidential_election_day";
// 					$filePath = "source/2016_us_presidential_election_day/json/" . $fileName . ".json";
// 					$timePolarity = 0; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
// 					$nTimeGranularity = 10; // interval by nGranularity minimum 1 max 5
// 					$getText = TRUE; // to get the text of the values
// 					$description = "<strong>About: </strong>This visualization shows the sentiments expressed in tweets on the 2016 US presidential election day<br><strong>Period: </strong>8-9 November, 2016 (UTC)<br><strong>Dataset: </strong>371,584 tweets with the hashtag #Hillary or #Trump";
// 					break;
				case 1 :
					$name = "Sentiment analysis of the 2016 US second presidential debate";
					$fileName = "2016_US_second_presidential_debate";
					$filePath = "source/2016_us_second_presidential_debate/json/" . $fileName . ".json";
					$timePolarity = 0; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
					$nTimeGranularity = 1; // interval by nGranularity minimum 1 max 5
					$getText = TRUE; // to get the text of the values
					$description = "<strong>About: </strong>Tweets collected<br><strong>Period: </strong><br><strong>Tweets: </strong>  <br><strong>Hashtag: </strong>";
					break;
				case 2 :
					$name = "Sentiment analysis of the 2013 Australian presidential period";
					$fileName = "2013_Australian_presidential_period";
					$filePath = "source/2013_australian_presidential_period/json/" . $fileName . ".json";
					$timePolarity = 1; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
					$nTimeGranularity = 1; // interval by nGranularity minimum 1 max 5
					$getText = TRUE; // to get the text of the values
					$description = "<strong>About: </strong>This visualization shows the sentiments expressed in tweets on the 2013 Australian presidential period<br><strong>Period: </strong>5-7 September, 2013 (UTC+10)<br><strong>Dataset: </strong> 122,393 tweets";
					break;
				case 3 :
					$name = "Sentiment analysis of the 2016 UEFA Champions league final";
					$fileName = "2016_UEFA_champions_league_final";
					$filePath = "source/2016_uefa_champions_league_final/json/" . $fileName . ".json";
					$timePolarity = 0; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
					$nTimeGranularity = 1; // interval by nGranularity minimum 1 max 5
					$getText = TRUE; // to get the text of the values
					$description = "<strong>About: </strong>This visualization shows the sentiments expressed in tweets on the 2016 UEFA Champions league final<br><strong>Period: </strong>Mai 28th, 2016 20:00-24:00 (UTC+2)<br><strong>Tweets: </strong>2,009 tweets";
					break;
				case 4 :
					$name = "Sentiment analysis of a rugby union match 2014";
					$fileName = "2014_Rugby_union_match";
					$filePath = "source/2014_rugby_union_match/json/" . $fileName . ".json";
					$timePolarity = 0; // 0 minutes, 1 hours, 2 days, 3 week, 4 month, 5 years
					$nTimeGranularity = 1; // interval by nGranularity minimum 1 max 5
					$getText = TRUE; // to get the text of the values
					$description = "<strong>About: </strong>This visualization shows the sentiments expressed in tweets on a rugby union match 2014<br><strong>Period: </strong>November 22th, 2014 17:40-19:10 (UTC+2)<br><strong>Tweets: </strong>2,531 tweets with the hashtag #WAvNZ";
					break;
			}

			$str = file_get_contents($filePath);
			
			//$json = json_encode(json_decode($str));
			$json = json_decode(json_encode(utf8_encode($str))); //works
			$error = json_last_error(); 	
		
			//$str = file_get_contents ( $filePath );
			//$json = json_decode(json_encode(utf8_encode($str))); //works
			?>
			var jsonArray =  <?php echo ($json); ?>;
			var timePolarity = <?php echo $timePolarity; ?>;
			var nTimeGranularity = <?php echo $nTimeGranularity; ?>;
			var fileName = <?php echo json_encode($fileName); ?>; //json_encode for the String
			var getText = <?php echo json_encode($getText); ?>;

		</script>
</head>


<body id="body-visualization">

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.8";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>

 	<div id="loader"></div>

	<nav id="menu-top" class="navbar navbar-default" style="display: none;">
		<div class="container-fluid">
			<div class="navbar-header">
				<h3 id="file-name" class="text-capitalize"
					style="display: inline-block;"><?php echo($name)?>
				</h3>
				<a id="info" data-toggle="modal" data-target="#infoModal"> <i
					class="fa fa-info-circle fa-lg" aria-hidden="true"></i>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<!-- data-via="eedu" -->
					<li><a href="https://twitter.com/share"
						class="twitter-share-button" data-url="http://advanse.lirmm.fr/MultiStream/"></a></li>
					<li><a class="fb-share-button"
						data-href="http://advanse.lirmm.fr/MultiStream/"
						data-layout="button" data-size="small"></a></li>
					<li>
						<button id="svg-export" type="button" class="btn btn-default">
							<span class="fa fa-download"></span> SVG
						</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<svg id="main" style="display: none;"></svg>
	</div>

	<nav id="menu-bottom" class="navbar navbar-default navbar-fixed-bottom"
		style="display: none;">
		<div class="container-fluid">
			<div class="col-md-6">
				<div id="col-hierarchy" class="btn-group"></div>
			</div>
			<div class="col-md-3">
				<div id="col-projections">
					<div class="col-md-4">
						<h6>
							&#x3B1; <input type="number" id="alpha" name="alpha"
								data-toggle="tooltip" title="detailed-area">
						</h6>
					</div>
					<div class="col-md-4">
						<h6>
							&#x3B2; <input type="number" id="beta" name="beta"
								data-toggle="tooltip" title="transition-areas">
						</h6>
					</div>
					<div class="col-md-4">
						<h6>
							&#x3B3; <input type="number" id="gamma" name="gamma"
								data-toggle="tooltip" title="context-areas">
						</h6>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div id="col-visualization">
					<label class="radio-inline"><input id="label-streamgraph"
						type="radio" name="optradio" value="stream" checked>Streamgraph</label>
					<label class="radio-inline"><input id="label-stackedgraph"
						type="radio" name="optradio" value="stacked">Stackedgraph</label>
				</div>
			</div>
			<div class="col-md-1">
				<div id="col-checked">
					<label class="checkbox-inline"><input id="animation"
						type="checkbox" value="" checked>Animation</label>
				</div>
			</div>
		</div>
	</nav>

	<div id="alert-msg"
		class="alert alert-danger alert-dismissable hidden fade in">
		<span id="close-alert" class="close">&times;</span> <strong>Warning!</strong>
		not allowed due to constraints.
	</div>

	<!-- Modal information -->
	<div class="modal fade" id="infoModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" style="text-transform: capitalize;"><?php echo($name)?></h4>
				</div>
				<div class="modal-body">
					<p><?php echo($description)?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>



	<!-- Modal data -->
	<div class="modal fade" id="data-modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div id="data-modal-title" class="modal-header"></div>
				<div id="data-modal-msg" class="modal-body"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>




	<!-- SCRIPTS -->
	<script type="text/javascript" src="js/generalizes.js"></script>
 	<script type="text/javascript" src="js/multistream.js"></script>
</body>
</html>