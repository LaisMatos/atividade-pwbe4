<?php

	//Declaração de variaveis
$valor1=(double)0;
$valor2=(double)0;
$resultado=(double)0;
$opcaoRadio=(String) null;


	//Criando função para calcular as operações matematicas
	function operacaoMatematica($numero1,$numero2,$operacao){
		
		//declaração de variaveis locais
		$num1= (double) $numero1;
		$num2=(double) $numero2;
		$total=(double)0;
		$tipoCalculo=(string)$operacao;
		

		//CALCULO com Switch/Case
		switch ($tipoCalculo) {
			case "SOMAR":
				$total=$num1+$num2;
				break;
			
			case "SUBTRAIR":
				$total=$num1-$num2;
				break;

			case "MULTIPLICAR":
				$total=$num1*$num2;
				break;

			case "DIVIDIR":
				$total=$num1/$num2;
				if ($num2==0) {
					echo('<script>alert("Não é possível calcular!");</script>');
				}else{
					$total=$num1/$num2;
				}
				break;
			//<default> equivale ao <else> final
			default:
		}
		//estrura para arredondar e limitar casas decimais
		$total= round($total,2);
		return $total;
	}

	//Validação do botão 
if(isset($_POST['btncalc'])){
		
	//Recebe dados do formulário
	$valor1=$_POST['txtn1'];
	$valor2=$_POST['txtn2'];
	
	
	//tratamento da caixa vazia
	if ($_POST['txtn1']==""||$_POST['txtn2']=="") {
		echo('<script>alert("Por favor preencher todas as caixas!");</script>');
	}else{
		
		//validação de tratamento de erro para radio sem escolha
		if(!isset($_POST['rdocalc'])){
			echo('<script>alert("Por favor, escolha uma opção valida!");</script>');
		}else{

			//validação de dado não numérico
			if (!is_numeric($valor1) || !is_numeric($valor2) ) {
				echo('<script>alert("Não é possível calcular!!");</script>');
			}else{
					//só podemos receber o valor do radio quando ele existir
				$opcaoRadio=strtoupper($_POST['rdocalc']);

			//camando função para realizar calculos matematicos
			$resultado=operacaoMatematica($valor1,$valor2,$opcaoRadio);

			}
		}
	}
}


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style2.css">
	</head>
	
	<body>

		<header id="header">
			<label class="logo">SENAI + $PHP</label>
		
			<div id="divMenu">
				<nav id="navMenu">

					<ul id="menuBurguer">
						<li id="imgMenu">
							<img src="img/Group 1.png" alt="Menu">

							<ul id="navUl">
								<li><a href="../media/media.php">Média</a></li>
								<li><a href="calculadora_simples.php">Calculadora</a></li>
								<li><a href="../tabuada/tabuada.php">Tabuada</a></li>
								<li><a href="../parEimpar/parEimpar.php">Pares e Impares</a></li>
							</ul>

						</li>
					</ul>
				</nav>
			</div>        
		</header>

		<main>
			<div id="conteudo">
				<div id="titulo">
					Calculadora Simples
				</div>

				
				<div id="form">
					<form name="frmcalculadora" method="post" action="calculadora_simples.php">
							Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>" > <br> <!--<value> mantem o histórico do que foi digitado-->
							Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>" > <br> <!--<value> mantem o histórico do que foi digitado-->
							<div id="container_opcoes">
								<input type="radio" name="rdocalc" value="somar" <?=$opcaoRadio=='SOMAR'?'checked':null;?> >Somar <br> 
								<input type="radio" name="rdocalc" value="subtrair"<?=$opcaoRadio=='SUBTRAIR'?'checked':null;?> >Subtrair <br>
								<input type="radio" name="rdocalc" value="multiplicar" <?=$opcaoRadio=='MULTIPLICAR'?'checked':null;?> >Multiplicar <br>
								<input type="radio" name="rdocalc" value="dividir" <?=$opcaoRadio=='DIVIDIR'?'checked':null;?>>Dividir <br>
								
								<input type="submit" name="btncalc" value ="Calcular" >
								
							</div>	
							<div id="resultado">
								<?=$resultado;?>
							</div>
					</form>
				</div>
			</div>
		</main>
	</body>

</html>