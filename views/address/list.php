<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Endereços</h6>

                <a href="/endereco/adicionar" class="btn btn-light mb-1 me-4">
                    Add
                </a>
            </div>
        </div>
        <div class="card-body p-2">
            <table class="table table-hover align-items-center text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Cep</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Criado</th>
                        <th>Alterado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($enderecos as $end) {
                        $id = $end->getId();
                        
                        

                        echo "
                        <tr>
                            <td>{$id}</td>
                            <td>{$end->getStreet()}</td>
                            <td>{$end->getNumber()}</td>
                            <td>{$end->getZipcode()}</td>
                            <td>{$end->getDistrict()}</td>
                            <td>{$end->getCity()}</td>
                            <td>{$end->getState()}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <a class='btn btn-outline-danger btn-sm' href='/enderecos/editar'>Editar</a>
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