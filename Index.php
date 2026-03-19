<?php
include 'db.php';  // Conexão MySQL
$result = $conn->query("SELECT * FROM produtos");
$produtos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Raiz Verde | Loja Sustentável</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
* { box-sizing:border-box; margin:0; padding:0; }
body { font-family:'Roboto', sans-serif; background:#e0f7e5; color:#045d04; line-height:1.6; }

/* HEADER */
header { background:linear-gradient(135deg,#22c55e,#4ade80); color:#fff; text-align:center; padding:50px 20px; font-size:32px; font-weight:700; border-bottom-left-radius:20px; border-bottom-right-radius:20px; box-shadow:0 4px 20px rgba(0,0,0,0.15); }

/* NAV */
nav { background:#16a34a; padding:15px 0; text-align:center; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
nav a { color:#fff; margin:0 20px; text-decoration:none; font-weight:600; font-size:16px; transition:0.3s; }
nav a:hover { color:#d1f3d1; }

/* SECTIONS */
section { padding:60px 20px; }
h2 { text-align:center; color:#059669; font-size:28px; margin-bottom:35px; }

/* PRODUTOS GRID */
.produtos { display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:25px; }
.produto { background:#ffffff; border-radius:15px; padding:20px; box-shadow:0 6px 20px rgba(0,0,0,0.1); text-align:center; transition:0.3s; cursor:pointer; }
.produto:hover { transform:translateY(-8px); box-shadow:0 12px 25px rgba(0,0,0,0.15); }
.produto img { width:100%; height:180px; object-fit:cover; border-radius:12px; margin-bottom:15px; }
.produto h3 { font-size:20px; margin-bottom:8px; }
.preco { font-weight:700; font-size:18px; color:#16a34a; margin-bottom:12px; }
button.produtoBtn { background:#22c55e; color:#fff; border:none; padding:10px 18px; font-weight:600; border-radius:8px; cursor:pointer; transition:0.3s; font-size:14px; }
button.produtoBtn:hover { background:#16a34a; transform:scale(1.05); }

/* CARRINHO */
#toggleCarrinho { position:fixed; top:25px; right:25px; background:#22c55e; color:#fff; width:55px; height:55px; border-radius:50%; border:none; font-size:22px; display:flex; align-items:center; justify-content:center; cursor:pointer; z-index:1000; box-shadow:0 4px 15px rgba(0,0,0,0.2); transition:0.3s; }
#toggleCarrinho:hover { background:#16a34a; transform:scale(1.1); }
#toggleCarrinho span { position:absolute; top:-6px; right:-6px; width:22px; height:22px; font-size:12px; background:#ef4444; color:#fff; display:flex; align-items:center; justify-content:center; border-radius:50%; }

#carrinho { position:fixed; top:80px; right:25px; width:320px; max-height:80vh; overflow-y:auto; background:#fff; border-radius:15px; padding:20px; box-shadow:0 8px 25px rgba(0,0,0,0.2); display:none; z-index:999; }
.itemCarrinho { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
.itemCarrinho img { width:45px; height:45px; border-radius:8px; object-fit:cover; margin-right:10px; border:1px solid #16a34a; }
.itemCarrinho button { background:#ef4444; border:none; color:#fff; border-radius:6px; padding:5px 8px; cursor:pointer; font-size:12px; transition:0.3s; }
.itemCarrinho button:hover { background:#dc2626; }

/* MODAL */
#modalProduto { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.65); display:none; justify-content:center; align-items:center; z-index:1000; }
.modalConteudo { background:#f0fff0; border-radius:20px; padding:30px; width:450px; max-height:85vh; overflow-y:auto; text-align:center; transform:scale(0.5); opacity:0; transition:0.35s; }
.modalConteudo.show { transform:scale(1); opacity:1; }
.modalConteudo img { width:100%; height:250px; border-radius:15px; object-fit:cover; margin-bottom:15px; }
.modalConteudo h3 { font-size:24px; margin-bottom:10px; color:#16a34a; }
.modalConteudo p { font-size:15px; text-align:left; margin-bottom:12px; }
.modalConteudo button { width:48%; padding:10px 0; font-weight:600; border-radius:8px; margin-top:10px; cursor:pointer; }
.modalConteudo button.fechar { background:#ef4444; margin-left:4%; color:#fff; border:none; transition:0.3s; }
.modalConteudo button.fechar:hover { background:#dc2626; }

/* FOOTER */
footer { background:#16a34a; color:#fff; text-align:center; padding:25px 20px; border-top-left-radius:20px; border-top-right-radius:20px; font-size:14px; margin-top:50px; box-shadow:0 -4px 15px rgba(0,0,0,0.15); }

@media(max-width:600px){
    .produto img{height:150px;}
    .modalConteudo{width:90%;}
}
</style>
</head>
<body>

<header>Raiz Verde | Produtos Sustentáveis</header>
<nav>
    <a href="#produtos">Produtos</a>
    <a href="#sobre">Sobre</a>
    <a href="#contactos">Contactos</a>
</nav>

<button id="toggleCarrinho">🛒<span id="badge">0</span></button>
<div id="carrinho">
    <div id="itensCarrinho"></div>
    <p><strong>Total: €<span id="total">0.00</span></strong></p>
    <button id="checkoutBtn">Finalizar Compra</button>
</div>

<section id="produtos">
<h2>Produtos Sustentáveis</h2>
<div class="produtos">
<?php foreach($produtos as $p): ?>
<div class="produto" onclick="abrirModal(<?= $p['id'] ?>)">
    <img src="<?= $p['imagem'] ?>" alt="<?= $p['nome'] ?>">
    <h3><?= $p['nome'] ?></h3>
    <p class="preco">€<?= number_format($p['preco'],2,",",".") ?></p>
    <button class="produtoBtn">Detalhes</button>
</div>
<?php endforeach; ?>
</div>
</section>

<div id="modalProduto">
    <div class="modalConteudo">
        <img id="modalImg">
        <h3 id="modalNome"></h3>
        <p id="modalPreco"></p>
        <p id="modalDescricao"></p>
        <button onclick="adicionarCarrinhoModal()">Adicionar ao Carrinho</button>
        <button class="fechar" onclick="fecharModal()">Fechar</button>
    </div>
</div>

<footer>
    <p>Projeto Escolar | Álvaro Leite nº4 | Pedro Lopez nº20</p>
</footer>

<script>
let carrinho = [];

function abrirModal(id){
    const produto = <?php echo json_encode($produtos); ?>.find(p => p.id == id);
    document.getElementById("modalImg").src = produto.imagem;
    document.getElementById("modalNome").innerText = produto.nome;
    document.getElementById("modalPreco").innerText = "€" + produto.preco.toFixed(2);
    document.getElementById("modalDescricao").innerText = produto.descricao;
    document.getElementById("modalProduto").style.display="flex";
    document.querySelector(".modalConteudo").classList.add("show");
}
function fecharModal(){ 
    const modal = document.getElementById("modalProduto"); 
    modal.querySelector(".modalConteudo").classList.remove("show"); 
    setTimeout(()=>modal.style.display="none",300);
}
function adicionarCarrinhoModal(){ 
    const produto = <?php echo json_encode($produtos); ?>[0]; // simplificado
    carrinho.push(produto); atualizarCarrinho(); fecharModal();
}
function atualizarCarrinho(){ 
    const itens=document.getElementById("itensCarrinho"); itens.innerHTML=""; let total=0;
    carrinho.forEach((item,index)=>{ total+=parseFloat(item.preco); itens.innerHTML+=`<div class="itemCarrinho"><div style="display:flex; align-items:center;"><img src="${item.imagem}"><span>${item.nome} (€${item.preco.toFixed(2)})</span></div><button onclick="removerCarrinho(${index})">X</button></div>`; });
    document.getElementById("total").innerText=total.toFixed(2);
    document.getElementById("badge").innerText=carrinho.length;
}
function removerCarrinho(index){ carrinho.splice(index,1); atualizarCarrinho(); }
document.getElementById("toggleCarrinho").addEventListener("click",()=>{ 
    const carrinhoDiv=document.getElementById("carrinho"); 
    carrinhoDiv.style.display = carrinhoDiv.style.display==="block"?"none":"block"; 
});
document.getElementById("checkoutBtn").addEventListener("click",()=>{ 
    if(carrinho.length>0){ alert("Compra finalizada!"); carrinho=[]; atualizarCarrinho(); }
});
</script>
</body>
</html>