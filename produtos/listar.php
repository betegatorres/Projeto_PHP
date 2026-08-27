<?php
require __DIR__ . '/verifica_login.php';
require __DIR__ . '/../conexao.php';
$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<?php require __DIR__ . '/../cabecalho.php'; ?>

<main>
    <h2>Produtos cadastrados</h2>
    <a class="btn-cadastrar" href="cadastrar.php">Cadastrar novo produto</a>

    <div class="table-wrapper">
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
                        <a class="btn-atualizar" href="atualizar.php?id=<?php echo $produto['id'];
                        ?>">Editar</a>
                        <a class="btn-excluir" href="excluir.php?id=<?php echo $produto['id'];
                        ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</main>
<?php require __DIR__ . '/../rodape.php'; ?>