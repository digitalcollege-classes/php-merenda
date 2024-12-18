<?php

use App\Service\ValidationService;

ValidationService::renderErrors();

?>

<div class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Nova Categoria</h6>

                <a href="/categorias/listar" class="btn btn-light mb-1 me-4">
                    Listar
                </a>
            </div>
        </div>
        <div class="card-body p-5">
            <form method="post" action="">
                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="name">
                        Nome
                        <input type="text" name="name" id="name" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="description">
                        Descrição
                        <input type="text" name="description" id="description" class="form-control">
                    </label>
                </div>

                <div class="input-group input-group-outline mb-3">
                    <label class="w-30" for="image">
                        Imagem
                        <input type="text" name="image" id="image" class="form-control">
                    </label>
                </div>

                <button class="btn btn-primary btn-lg w-30">Pronto</button>
            </form>
        </div>
    </div>
</div>