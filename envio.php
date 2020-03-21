<?php

error_reporting(0);
$cont = 0;
$delay=$_POST['delay'];
if(isset($_POST['btn'])){
	$email = $_POST;
	$html = $_POST['html'];
	$conteudo = $html;
	extract($email);
	$l=explode(PHP_EOL, $lista);
	foreach ($l as $_list) {
		$dest=explode(";", $_list)[0];
		$remet=explode(";", $_list)[1];
		$nome="%NOME%";
		$_nome=$remet;
		$corpo=str_replace($nome,$_nome,$conteudo);
		$headers  = "MIME-Version: 1.0\n";
  		$headers .= "Content-type: text/html; charset=utf8\n";
  		$headers  .='From: Bitmail <teste@teste>';
  		@mail($dest, 'Bitmail ', "$corpo", $headers);
  		$sec = rand(0,$delay);
  		sleep($sec);
  		$cont++;
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #cece;
		}
		header{
			max-width: 900px;
			width: 100%;
			margin: auto;
			margin-top: 30px;
			margin-bottom: 15px;
			text-align: center;
			font-family: "Trebuchet MS", Helvetica, sans-serif;
		}
		header h1{
			color: #00008B;
		}
		header h4{
			color: #DAA520;
		}
		header p{
			color: #fff;
		}
		header strong{
			color: red;
		}
		#area{
			display: flex;
			justify-content: center;
		}
		.box{
			display: flex;
			flex-wrap: wrap;
		}
		
		form button{
			padding: 10px 30px;
			border: none;
			border-radius: 2px;
			color: #fff;
			background-color: #008000;
			cursor: pointer;
			border: 1px solid #fff;
		}
		#btn{
			max-width: 250px;
			width: 100%;
			margin: auto;
			margin-top: 10px;
			display: flex;
		}
		.box1{
			margin-right: 10px;
		}
		.btn-iniciar{
			padding: 10px 20px;
			border: none;
			border-radius: 2px;
			background-color: #B22222;
			border: 1px solid #fff;
		}
		#btn input[type="number"]{
			width: 50px;
			margin: 0px 10px;
		}
		button:hover{
			opacity: .8;
			border: 1px solid #000;
			color: #000;
		}
		.box1 textarea,.box2 textarea{
			width: 350px;
			background-color: #ADD8E6;
			border: 2px solid #fff;
		}
		textarea::placeholder{
			color: #fff;
			padding-top: 5px;
			text-align: center;
		}
	</style>
</head>
<body>
	
	<header>
		<h1>Bitmail v1.0</h1>
		<h4>Email Marketing</h4>
		<p><?php
			echo "Qtds enviada: "."<strong>".$cont."<strong>";
		?></p>
	</header>
	<div id="area">
		<form action="" method="POST">
			<div class="box">
				<div class="box1">
					<textarea name="lista" id="" cols="35" rows="20" placeholder="email@bitmail.com;Destinatario"></textarea>
				</div>
				<div class="box2">
					<textarea name="html" id="" cols="35" rows="20" placeholder="Mensagem"></textarea>
				</div>	
			</div>
			<div id="btn">
				<button name="btn">Enviar</button>
				<input type="number" name="delay" placeholder="Seg">
				<button class="btn-iniciar" onclick="window.location.href='envio.php'">Reiniciar</button>
			</div>
		</form>
		
	</div>
</body>
</html>