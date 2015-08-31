<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
	<a href="/results">View Results</a>
	<?php 
	 	echo "<br>".$this->session->flashdata('error');
	  ?>
	<form action='/submit' method='POST'>
		
	
	<?php
		$q_num=1;
		$q_type='';
		foreach($questions as $question){
			echo "<h5 class='question'>".$q_num.". ".$question['question']."</h5>";
	
		foreach($choices as $choice){

			if($choice['question_id']==$question['id']){
				if($question['radio']){
					$q_type='radio';
				}
				else{
					$q_type='checkbox';
				}
				if($q_type=='radio'){
					echo "<input type=".$q_type." value=".$choice['id']." name=".$question['id'].">".$choice['choice']."<br>";
				}
				else{
					echo "<input type=".$q_type." value=".$choice['id']." name=".$question['id']."[]>".$choice['choice']."<br>";
				}
				
			}
		}
			$q_num++;
		}

	 ?>
	 	<input type='submit' value='submit'>
	 </form>
</body>
</html>