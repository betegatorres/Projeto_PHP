<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    
    $nome = (string)$nome;
    $preco = (float)$preco;
    $quantidade = (int)$quantidade;



    if ($nome == null || $preco == null || $quantidade == null) {
        // $mensagem = "Preencha todos os campos obrigatórios.";
        $mensagem = "Preencha todos os campos obrigatórios e confira se os conteudos estão corretos.";
    }
    
    else {
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade)
                VALUES ('$nome', '$descricao', '$preco', '$quantidade')";

        if (mysqli_query($conexao, $sql)) {
            header('Location: listar.php');
            exit;
        } else {
            $mensagem = "Erro ao cadastrar produto: " . mysqli_error($conexao);
        }
    }
}
?>

<?php require __DIR__ . '/../cabecalho.php'; ?>

<main>

    <h2>Cadastrar Produto</h2>

    <?php if (isset($mensagem)) { ?>
        <p><?php echo $mensagem; ?></p>
    <?php } ?>

    <form action="cadastrar.php" method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Ex: lápis"><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" placeholder="Ex: Lápis de alta qualidade, grafite bom e duradouro"><br>

        <label>Preço:</label>
        <input type="text" name="preco" placeholder="Ex: 1,50"><br>
        

        <label>Quantidade:</label>
        <input type="text" name="quantidade" placeholder="Ex: 50">

        <button type="submit">Salvar</button>

    </form>

</main>

<?php require __DIR__ . '/../rodape.php'; ?>


