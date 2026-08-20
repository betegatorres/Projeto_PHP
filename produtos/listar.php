<?php include '../conexao.php';?>
<?php include 'verifica_login.php'; ?>
<?php include 'cabecalho.php'; ?>

<main>
    <p>Bem-vindo(a), <?php echo $_SESSION['usuario_nome']; ?>!</p>
    <!-- conteúdo da página -->
</main>

<?php include '../rodape.php'; ?>