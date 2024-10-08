<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Editar Pedido</h6>

                <a href="/pedidos/listar" class="btn btn-light mb-1 me-4">
                    Listar
                </a>
            </div>
        </div>
        <div class="card-body p-5">
            <form method="post" action="">
                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="type">
                        Tipo
                        <input type="text" name="type" id="type" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="items">
                        Items
                        <input type="text" name="items" id="items" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="customer">
                        Cliente
                        <input type="text" name="customer" id="customer" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="status">
                        Status
                        <input type="number" name="status" id="status" class="form-control">
                    </label>
                </div>
                <button class="btn btn-primary btn-lg w-30">Pronto</button>
            </form>
        </div>
    </div>
</section>
