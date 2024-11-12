<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Novo Endereço</h6>

                <a href="/enderecos/listar" class="btn btn-light mb-1 me-4">
                    Listar
                </a>
            </div>
        </div>
        <div class="card-body p-5">
            <form method="post" enctype="multipart/form-data" action="">
                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="street">
                        Endereço
                        <input type="text" name="street" id="street" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="number">
                        Número
                        <input type="text" name="number" id="number" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="zipcode">
                        CEP
                        <input type="text" name="zipcode" id="zipcode" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="district">
                        Bairro
                        <input type="text" name="district" id="district" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="city">
                        Cidade
                        <input type="text" name="city" id="city" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="state">
                        Estado
                        <input name="state" id="state" class="form-control">
                    </label>
                </div>

                <button class="btn btn-primary btn-lg w-30">Pronto</button>
            </form>
        </div>
    </div>
</section>