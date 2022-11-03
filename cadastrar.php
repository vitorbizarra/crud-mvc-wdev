<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

// Validação do POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $objVaga = new Vaga;

    $objVaga->setTitulo($_POST['titulo']);
    $objVaga->setDescricao($_POST['descricao']);
    $objVaga->setAtivo($_POST['ativo']);
    $objVaga->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
