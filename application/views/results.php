<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
	<script type="text/javascript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" src='https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css'>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>
	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js'></script>
	<link rel="stylesheet" type="text/css" href="assets/results.css">
	<script type="text/javascript" src='assets/charts.js'></script>
	<script type="text/javascript">
		var female_answers=JSON.parse('<?= $f_json ?>');
		var male_answers=JSON.parse('<?= $m_json ?>');
		var questions=JSON.parse('<?= $questions ?>');
	</script>
</head>

<body>
	<a href="/">Take Survey</a>
	<div id="charts"></div>
	<div id="container">
		<div id="females">
			<h3>Females</h3>
			<table>
				<tr>
					<th>Question</th>
					<th>Most Popular</th>
					<th>Number Submitted</th>
				</tr>	
			<?php 
				foreach($f_answers as $answer){
			?>

					<tr>
						<td><?= $answer['q'] ?></td>
						<td><?= $answer['ch'] ?></td>
						<td><?= $answer['tally'] ?></td>
					</tr>

			<?php
				}
			 ?>
			</table>
			
		</div>

		<div id='males'>
			<h3>Males</h3>
			<table>
				<tr>
					<th>Question</th>
					<th>Most Popular</th>
					<th>Number Submitted</th>
				</tr>	
			<?php 
				foreach($m_answers as $answer){
			?>

					<tr>
						<td><?= $answer['q'] ?></td>
						<td><?= $answer['ch'] ?></td>
						<td><?= $answer['tally'] ?></td>
					</tr>

			<?php
				}
			 ?>
			</table>

		</div>
	</div>
</body>
</html>