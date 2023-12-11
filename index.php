<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reajustador de Preços</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <section class="card">
    <h1>Reajustador de Preços</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
      <label for="custo">Preço do Produto (R$)</label>
      <input type="number" name="custo">
      <label for="pct">Qual será o percentual do reajuste? <strong id="porcentagem">(0 %)</strong></label>
      <input type="range" name="pct" value="0" id="pct" oninput="atualizarInput()">
      <button type="submit">Calcular</button>
    </form>
  </section>
  <section class="card">
    <h1>Resultado do Reajuste</h1>
    <?php
    $pct = $_GET["pct"] ?? 0;
    if ($pct > 0) {
      $preco = $_GET["custo"];
      $res = $preco + ($preco * $pct / 100);
      $final = number_format($res, 2);
      echo "o produto que custava R$ $preco, com $pct% de aumento vai passar a custar R$ $final a partir de agora";
    }

    ?>
  </section>
  <script>
    function atualizarInput() {
      let input = document.querySelector('#pct')
      console.log(input)
      let porcentagemEx = document.getElementById('porcentagem')

      let porcentagem = input.value
      console.log(porcentagem)

      if (porcentagem === 0) {
        porcentagemEx.innerHTML = `(0 %)`
      } else {
        porcentagemEx.innerHTML = `(${porcentagem} %)`
      }
      // porcentagemEx.innerHTML = `(${porcentagem} %)`
    }
  </script>
</body>

</html>