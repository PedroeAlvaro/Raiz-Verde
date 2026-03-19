<?php
include 'db.php';  // Certifica-te que db.php está na mesma pasta

// Adicionar produto
if(isset($_POST['adicionar'])){
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    $img = $_POST['imagem'];
    $conn->query("INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome','$desc','$preco','$img')");
}

// Editar produto
if(isset($_POST['editar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    $img = $_POST['imagem'];
    $conn->query("UPDATE produtos SET nome='$nome', descricao='$desc', preco='$preco', imagem='$img' WHERE id=$id");
}

// Remover produto
if(isset($_GET['remover'])){
    $id = $_GET['remover'];
    $conn->query("DELETE FROM produtos WHERE id=$id");
}

// Pesquisar produto
$busca = "";
if(isset($_GET['busca'])){
    $busca = $_GET['busca'];
    $result = $conn->query("SELECT * FROM produtos WHERE nome LIKE '%$busca%'");
} else {
    $result = $conn->query("SELECT * FROM produtos");
}
$produtos = $result->fetch_all(MYSQLI_ASSOC);
?>

<h1>Admin - Produtos</h1>

<form method="GET">
<input type="text" name="busca" placeholder="Pesquisar produto" value="<?= $busca ?>">
<button>Pesquisar</button>
</form>

<h2>Adicionar Produto</h2>
<form method="POST">
<input name="nome" placeholder="Nome"><br>
<input name="descricao" placeholder="Descrição"><br>
<input name="preco" placeholder="Preço"><br>
<input name="imagem" placeholder="URL da imagem"><br>
<button name="adicionar">Adicionar</button>
</form>

<h2>Produtos Cadastrados</h2>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Preço</th><th>Imagem</th><th>Ações</th></tr>
<?php foreach($produtos as $p): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= $p['nome'] ?></td>
<td>€<?= number_format($p['preco'],2,",",".") ?></td>
<td><img src="<?= $p['imagem'] ?>" width="50"></td>
<td>
<form method="POST" style="display:inline">
<input type="hidden" name="id" value="<?= $p['id'] ?>">
<input name="nome" value="<?= $p['nome'] ?>">
<input name="descricao" value="<?= $p['descricao'] ?>">
<input name="preco" value="<?= $p['preco'] ?>">
<input name="imagem" value="<?= $p['imagem'] ?>">
<button name="editar">Editar</button>
</form>
<a href="?remover=<?= $p['id'] ?>" onclick="return confirm('Remover produto?')">Remover</a>
</td>
</tr>
<?php endforeach; ?>
</table>