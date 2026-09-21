<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado da Média</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="card-resultado">
    <h2>Resultado do Aluno</h2>

    <?php
    $nota1 = $_POST["nota1"] ?? 0;
    $nota2 = $_POST["nota2"] ?? 0;
    $nota3 = $_POST["nota3"] ?? 0;
    $nota4 = $_POST["nota4"] ?? 0;
    $nota5 = $_POST["nota5"] ?? 0;

    $media = (
        ($nota1 * 2) +
        ($nota2 * 3) +
        ($nota3 * 1) +
        ($nota4 * 1) +
        ($nota5 * 3)
    ) / 10;
    ?>

    <div class="notas-list">
      <div class="nota-item"><span>Nota 1:</span> <strong><?= $nota1 ?></strong></div>
      <div class="nota-item"><span>Nota 2:</span> <strong><?= $nota2 ?></strong></div>
      <div class="nota-item"><span>Nota 3:</span> <strong><?= $nota3 ?></strong></div>
      <div class="nota-item"><span>Nota 4:</span> <strong><?= $nota4 ?></strong></div>
      <div class="nota-item"><span>Nota 5:</span> <strong><?= $nota5 ?></strong></div>
    </div>

    <div class="media-final <?= $media >= 6 ? 'aprovado' : 'reprovado' ?>">
      <span>Média Final:</span>
      <strong><?= number_format($media, 2, ',', '.') ?></strong>
    </div>
  </div>

</body>
</html>