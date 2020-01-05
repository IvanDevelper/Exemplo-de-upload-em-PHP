<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /*
    if(isset($_POST['enviar'])){
        $formatosPermitidos =array("png","jpeg","jpg","gif");
      $quantidade = count($_FILES['arquivo']['name']);//variavel contador
      $contador = 0;

        while($contador < $quantidade){
            
            $extensao = pathinfo($_FILES['arquivo']['name'][$contador],PATHINFO_EXTENSION);

        if(in_array($extensao,$formatosPermitidos)){
            $pasta = "arquivos/";
            $temporario = $_FILES['arquivo']['tmp_name'][$contador];
            $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario,$pasta.$novoNome)){
            echo "Upload feito com sucesso para $pasta.$novoNome<br>";
        }else{
            echo  "Erro ao enviar o arquivo $temporario";
        }
        }else{
        echo "$extensao não é permitida<br>";
        }
        $contador++;
       
}
    }
   
 */
if(isset($_POST['enviar'])):
    $formatosPermitidos = array("png", "jpeg", "jpg", "gif");            
    $pasta = "arquivos/";
    $quantidadeArquivos = count($_FILES['arquivo']['name']);            
    for($contador = 0; $contador < $quantidadeArquivos; $contador++):            
            $extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);
            if(in_array($extensao, $formatosPermitidos)):
                $temporario = $_FILES['arquivo']['tmp_name'][$contador];
                $novoNome = uniqid().".$extensao";
                if(move_uploaded_file($temporario, $pasta.$novoNome)):
                    echo "Upload feito com sucesso para $pasta$novoNome <br/>";                        
                else:
                    echo "Erro ao enviar o arquivo. <br/>";                        
                endif;                   
            else:
                echo "A extensão $extensao não é permitida. <br/>";                    
            endif;
    endfor;
endif;    

    ?>
    
   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
      <input type="file"  id="" name="arquivo[]" multiple><br>
      <input type="submit" value="Enviar" name="enviar">
   </form>

</body>
</html>