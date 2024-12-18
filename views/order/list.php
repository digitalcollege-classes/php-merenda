<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Pedidos</h6>

                <a href="/pedidos/adicionar" class="btn btn-light mb-1 me-4">
                    Add
                </a>
            </div>
        </div>
        <div class="card-body p-2">
            <table class="table table-hover align-items-center text-center">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tipo</th>
                        <th>Item</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Criado</th>
                        <th>Atualizado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($orders as $ord) {
                            $id = $ord->getId();
                            $createdAt = $ord->getCreatedAt();
                            $updateAt = $ord->getUpdateAt();
                            $items = count($ord->getItems());

                            $type = \App\Enum\OrderTypeEnum::from($ord->getType())->name;

                            $type = match($type) {
                                'DELIVERY' => '<span class="badge bg-primary">Delivery</span>',
                                'RETIRADA' => '<span class="badge bg-success">Retirada</span>',
                                default => "<span class='badge bg-secondary'>{$type}</span>",
                            };

                            echo "
                                <tr>
                                    <td>{$id}</td>
                                    <td>{$type}</td>
                                    <td>{$items}</td>
                                    <td>{$ord->getCustomer()}</td>  
                                    <td>{$ord->getStatus()}</td>
                                    <td>{$createdAt->format('Y-m-d H:i:s')}</td>
                                    <td>{$updateAt->format('Y-m-d H:i:s')}</td>
                                    <td>
                                        <a class='btn btn-outline-danger btn-sm' href='/pedidos/editar'>Editar</a>
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

