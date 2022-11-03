<?php
$resultados = '';

foreach ($vagas as $vaga) {
    $resultados .= '<tr>
                        <td>' . $vaga->getId() . '</td>
                        <td>' . $vaga->getTitulo() . '</td>
                        <td>' . $vaga->getDescricao() . '</td>
                        <td>' . ($vaga->getAtivo() == 's' ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->getData())) . '</td>
                        <td>
                            <a href="editar.php?id='. $vaga->getId() .'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir.php?id='. $vaga->getId() .'"><button type="button" class="btn btn-danger">Excluir</button></a>
                        </td>';
}
?>

<main>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">
                Nova vaga
            </button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados; ?>
            </tbody>
        </table>
    </section>
</main>