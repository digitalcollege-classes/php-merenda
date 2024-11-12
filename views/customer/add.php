<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Novo Cliente</h6>
                <a href="/clientes/listar" class="btn btn-light mb-1 me-4">Listar</a>
            </div>
        </div>
        <div class="card-body p-5">
            <form class="rounded border border-primary p-3" method="post" action="" enctype="multipart/form-data">
                <div class="input-group input-group-outline mb-3">
                    <label class="w-100" for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-100" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-100" for="phone">Telefone</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-100" for="photo">Foto</label>
                    <input type="text" name="photo" id="photo" class="form-control">
                </div>

                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</section>