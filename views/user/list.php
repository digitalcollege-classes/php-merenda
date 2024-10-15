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
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $cat) {
                        $id = $cat->getId();

                        echo "
                            <tr>
                                <td>{$id}</td>
                                <td>{$cat->getName()}</td>
                                <td>{$cat->getEmail()}</td>
                                <td>{$cat->getPassword()}</td>
                                <td>
                                    <a class='btn btn-outline-danger btn-sm' href='/categorias/editar'>Editar</a>
                                    <a onclick='confirmRemove({$id})' href='#' class='btn btn-outline-warning btn-sm'>Excluir</a>
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