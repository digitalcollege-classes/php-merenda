<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Editar Clientes</h6>

                <a href="/clientes/listar" class="btn btn-light mb-1 me-4">
                    <i class="material-icons">view_list</i> Listar
                </a>
            </div>
        </div>
        <div class="card-body p-5">
            <form class="rounded border border-primary p-3" action="/clientes/editar?id=<?= $customer->getId(); ?>" method="POST">
                <div class="input-group input-group-outline mb-3">
                    <label for="photo" class="w-100">Foto
                        <input type="text" class="form-control" id="photo" name="photo" value="<?= $customer->getPhoto(); ?>">
                    </label>

                </div>

                <div class="input-group input-group-outline mb-3">
                    <label for="name" class="w-100">Nome
                        <input type="text" class="form-control" id="name" name="name" value="<?= $customer->getName(); ?>" required>
                    </label>

                </div>

                <div class="input-group input-group-outline mb-3">
                    <label for="email" class="w-100">E-mail
                        <input type="email" class="form-control" id="email" name="email" value="<?= $customer->getEmail(); ?>" required>
                    </label>

                </div>

                <div class="input-group input-group-outline mb-3">
                    <label for="phone" class="w-100">Telefone
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer->getPhone(); ?>" required>
                    </label>

                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="statusAtivo" name="status" value="1" <?= $customer->isStatus() ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="statusAtivo">Ativo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="statusInativo" name="status" value="0" <?= !$customer->isStatus() ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="statusInativo">Inativo</label>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="/clientes/listar" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</section>