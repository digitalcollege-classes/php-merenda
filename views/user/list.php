<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Usuários</h6>

                <a href="/usuarios/adicionar" class="btn btn-light mb-1 me-4">
                    Add
                </a>
            </div>
        </div>
        <div class="card-body p-2">
            <table class="table table-hover align-items-center text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "
                                <tr>
                                    <td>{$i}</td>
                                    <td>Nome Usuário {$i}</td>
                                    <td>Endereço Usuário {$i}</td>
                                    <td>
                                        <a class='btn btn-outline-danger btn-sm' href='/usuarios/editar'>Editar</a>
                                        <a class='btn btn-outline-warning btn-sm' href=''>Excluir</a>
                                    </td>
                                </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>