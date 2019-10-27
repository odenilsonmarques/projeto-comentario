<!DOCTYPE html>
<?php
include_once './assets/config/conexao.php';

if (isset($_POST['nome']) && empty($_POST['nome']) == FALSE) {

    $nome = addslashes($_POST['nome']);
    $mensagem = addslashes($_POST['mensagem']);

    $sql = $conectPDO->prepare("INSERT INTO tb_comentario SET nome= :nome, mensagem= :mensagem, data_msg= NOW()");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":mensagem", $mensagem);
    $sql->execute();
    header('Location: index.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="col-sm-12">
            <div class="jumbotron">
                <h1 class="text-center">Sistema de Comentário</h1>
            </div>
        </div>
        <div class="row" style="margin: 15px">
            <form method="POST">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="nome">NOME</label><br>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="mensagem">MENSAGEM</label><br>
                        <textarea name="mensagem" id="mensagem" class="form-control"></textarea>
                    </div>
                </div>
                <input type="submit" value="ENVIAR MENSAGEM"/>
            </form>
        </div>
    </body>
</html>
<?php
$sql = "SELECT *FROM tb_comentario";
$exeSql = $conectPDO->query($sql);

if ($exeSql->rowCount() > 0) {
    foreach ($exeSql->fetchAll() as $msg):
        ?>
        <strong><?php echo $msg['nome']; ?></strong><br/>
        <strong><?php echo $msg['mensagem']; ?></strong><br/>
        <strong><?php echo $msg['data_msg']; ?></strong><br/>
         <hr/>
    <?php
    endforeach;
} else {
    echo "Não há mensagem";

}

    