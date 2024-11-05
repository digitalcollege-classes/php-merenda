<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Editar Usuário</h6>
                <a href="/usuarios/listar" class="btn btn-light mb-1 me-4">Listar</a>
            </div>
        </div>
        <div class="card-body p-5">
            <form class="rounded border border-primary p-3" action="/usuarios/editar?id=<?= $user->getId(); ?>" method="POST">

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="name">
                        Nome do Usuário
                        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user->getName()) ?>" required>
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="email">
                        E-mail
                        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user->getEmail()) ?>" required>
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="type">
                        Tipo de Usuário
                        <input type="text" name="type" id="type" class="form-control" value="<?= $displayType ?>" disabled>

                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="/usuarios/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</section>