<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Clientes</h6>

                <a href="/clientes/adicionar" class="btn btn-light mb-1 me-4">
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
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for ($i = 1; $i <= 10; $i++) {
                            echo "
                                <tr>
                                    <td>{$i}</td>
                                    <td>Cliente {$i}</td>
                                    <td>Endereço Tal {$i}</td>
                                    <td>(85) 9 8761-1234 {$i}</td>
                                    <td>
                                        <a class='btn btn-outline-danger btn-sm' href='/clientes/excluir'>Excluir</a>
                                        <a class='btn btn-outline-warning btn-sm' href='/clientes/editar'>Editar</a>
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

