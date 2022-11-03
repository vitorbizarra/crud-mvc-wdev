<main>
    <h2 class="mt-3">Excluir vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Você deseja realmente exlcuir a vaga <strong><?= $objVaga->getTitulo(); ?></strong></p>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-light">
                    Cancelar
                </button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Enviar</button>
        </div>
    </form>
</main>