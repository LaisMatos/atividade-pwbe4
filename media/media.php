<?php

//declaração de variaveis
$nota1= (double)0;
$nota2= (double)0;
$nota3= (double)0;
$nota4= (double)0;
$media= (double)0;

    //tratamento do botão post
    if (isset($_POST['btncalc'])) {
        
        //atribuição de dados
        $nota1= $_POST['txtn1'];
        $nota2= $_POST['txtn2'];
        $nota3= $_POST['txtn3'];
        $nota4= $_POST['txtn4'];

                //validação para tratamento de caixa vazia
        if ($_POST['txtn1']=="" || $_POST['txtn2']=="" || $_POST['txtn3']=="" || $_POST['txtn4']=="" ){
            echo('<p class="msgErro"> É obrigatório preencher os campos </p>');
        }else{           
                //validação para tratamento de caixa com valor String
            if (!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3) || !is_numeric($nota4)) {
                echo('<p class="msgErro"> Para realizar o calculo todos os dados devem ser números</p>');
            }else{
                //calular media (execução antes de mostrar a msg)
                $media=($nota1+$nota2+$nota3+$nota4)/4;
            }
        }
    }
    
           
  
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Média</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet"  type="text/css" href="css/style2.css">
        
        <meta charset="utf-8">
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
                                <li><a href="media.php">Média</a></li>
                                <li><a href="../caculadora/calculadora_simples.php">Calculadora</a></li>
                                <li><a href="../tabuada/tabuada.php">Tabuada</a></li>
                                <li><a href="../imparEpar/imparEpar.php">Pares e Impares</a></li>
                            </ul>

                        </li>
                    </ul>
                </nav>
            </div>        
        </header>

        <main>
            <div id="conteudo">
                <h3 id="titulo">
                    Calculo de Médias
                </h3>

                <div id="form">
                    <form name="frmMedia" method="post" action="">
                        <div>
                            <label>Nota 1:</label>
                            <input type="text" name="txtn1" value="<?php echo($nota1)?>"  > 
                        </div>
                        
                        <div>
                            <label>Nota 2:</label>
                            <input type="text" name="txtn2" value="<?php echo($nota2)?>" > 
                        </div>
                        
                        <div>
                            <label>Nota 3:</label>
                            <input type="text" name="txtn3" value="<?php echo($nota3)?>" > 
                        </div>
                        
                        <div>
                            <label>Nota 4:</label>
                            <input type="text" name="txtn4" value="<?php echo($nota4)?>" >
                        </div>
                        <div>
                            <input type="submit" name="btncalc" value ="Calcular" >
                            <div id="botaoReset">
                                <a href="media.php">
                                    Novo Cálculo
                                </a>    
                            </div>
                        </div>
                    </form>

                </div>

                <footer id="resultado">
                    Média: <?php echo($media);?>
                </footer>
            </div>
        </main>	
	</body>

</html>



 