<?php
include_once('config/conexao.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //echo $id";
    $delete = "DELETE FROM Tbprojeto WHERE Idproduto=:id";
    try{
        $resultDel = $conect->prepare($delete);
        $resultDel->bindParam(':id',$id,PDO::PARAM_INT);
        $resultDel->execute();
        //retorno dinamico a página de relatorio
        $contar=$resultDel->rowCount();
        if($contar>0){
            header("location: relatorio.php");
        }else{
            header("location: relatorio.php");
        }
    }catch(PDOException $e){
        echo "<strong>ERRO DE DELETE: </strong>".$e->getMessage();
    }
}
