<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';
require __DIR__ . '/../cabecalho.php';

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);

?>

<main>
    <h2>Produtos cadastrados</h2>

    <?php if (isset($_SESSION['mensagem'])) { ?>
        <p><?php echo $_SESSION['mensagem']; ?></p>
        <?php unset($_SESSION['mensagem']); ?>
    <?php } ?>
   
    <a href="cadastrar.php"><button type="submit" class="btn-cadastrar">Cadastrar novo produto</button></a>

    <table>
        <tr>
            <th>Produto</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Qtd.</th>
            <th>Ações</th>
        </tr>

        <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['descricao']; ?></td>
            <td>R$ <?php echo $produto['preco']; ?></td>
            <td><?php echo $produto['quantidade']; ?></td>
            <td>
                <a href="atualizar.php?id=<?php echo $produto['id'];
            ?>"><button type="submit" class="btn-editar">Editar</button></a>
                    <a href="excluir.php?id=<?php echo $produto['id'];
            ?>"><button type="submit" class="btn-excluir">Excluir</button></a>
                        </td>
                    </tr>
                <?php } ?>
    </table>
</main>

<?php
require __DIR__ . '/../rodape.php';
?>