<!DOCTYPE html>
<html lang="en">
<head>
<title>MultiStream</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="shortcut icon" type="image/png" href="img/favicon.png" />

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="css/styles.css"></link>

<!-- FONTS used for icons -->
<link href="fonts/font-awesome-4.2.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container">
		<div class="panel">
			<h2 class="title" align="center">MultiStream: A Multiresolution
				Streamgraph Approach to Explore Hierarchical Time Series</h2>
			<h3 class="title" align="center">An approach to convey the
				hierarchical structure of multiple time series</h3>

			<div class="text-center">
				<iframe width="75%" height="370"
					src="http://www.youtube.com/embed/FoNH2p8JZGs?rel=0"
					frameborder="0" webkitallowfullscreen mozallowfullscreen
					allowfullscreen></iframe>
			</div>
			<br>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<h3>What is...?</h3>
				<p align="justify">
					Multiple time series are present in many domains such as medicine,
					finance, and manufacturing for analytical purposes. When dealing
					with several time series scalability problem overcome. To solve
					this problem, multiple time series can be organized into a
					hierarchical structure. Our approach extends a <strong> <a
						href="http://leebyron.com/streamgraph/" target="_blank">
							Streamgraph</a></strong> visualization to convey this
					hierarchical structure. Thus, facilitate the exploration of
					temporal evolution in time series. Based on a focus+context
					technique, our method allows time series exploration at different
					granularities (e.g., from overview to details).
				</p>
			</div>
			<div class="col-sm-4">
				<h3>Datasets available</h3>
				<ul>
					<li>Sentiment analysis of political events:
						<ul>
							<li>2016 US presidential election day</li>
							<!-- 							<li>2016 US second presidential debate</li> -->
							<li>2013 Australian presidential period</li>
						</ul>
					</li>
					<li>Sentiment analysis of sporting events:
						<ul>
							<li>2016 UEFA Champions league final</li>
							<li>2014 Rugby union match</li>
						</ul>
					</li>
					<li>Other datasets:
						<ul>
							<li>Music genre evolution</li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="col-sm-4">
				<form action="visualize.php" method="post"
					enctype="multipart/form-data">
					<h3>Visualize an example</h3>
					<div class="dropdown">
						<select id="dataset" name='dataset'>
							<?php
							header ( 'content-type: text/html; charset=utf-8' );
							$myfile = fopen ( "php/select-option.txt", "r" ) or die ( "Unable to open file select-option.txt in php/!" );
							// Output one line until end-of-file
							// echo '<option value="">Select...</option>';
							$index = 0;
							while ( ! feof ( $myfile ) ) {
								echo '<option value="' . $index . '">' . fgets ( $myfile ) . '</option>';
								$index ++;
							}
							fclose ( $myfile );
							?>

						</select>
					</div>
					<br>
					<!-- 
					<p>Select json file:</p>
					<p>
						<input type="file" name="fileToUpload" id="fileToUpload">
					</p>
					 -->
					<p>
						<input type="submit" value="Visualize" name="submit">
					</p>
					<p>
						<strong>Optimized</strong> for chrome browser.
					</p>
				</form>
			</div>
		</div>
		<br> <br>

		<div class="col-lg-12 col-md-12 col-sm-12"
			style="text-align: center; display: none;">
			<img class="img-responsive" alt="example-structure"
				src="img/example-structure.jpg">
		</div>
	</div>

</body>
</html>
