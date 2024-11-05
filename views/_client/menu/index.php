<div class="container-fluid">
    <h1 class="mt-1">Cardapio</h1>
    <hr>

    <div class="text-end">
        <button data-bs-toggle="modal" data-bs-target="#modalCart" class="btn btn-info">
            Carrinho
            <span class="badge bg-secondary">123</span>
        </button>
    </div>

    <div class="modal fade" id="modalCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    Itens do carrinho
                </div>
            </div>
        </div>
    </div>

    <section class="row">
        <?php
            foreach ($products as $item) {
                echo "
                    <div class='col-12 mt-3'>
                        <div class='card'>
                            <img style='border-radius: 10px;' src='{$item->getImages()[0]}' alt=''>
                
                            <div class='d-flex align-items-center justify-content-between p-3 pb-0'>
                                <span>
                                    {$item->getName()}
                                    |
                
                                    <strong>R$ {$item->getPrice()}</strong>
                                </span>    
                            
                                <button class='btn btn-primary'>+ 1</button>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>
    </section>
</div>
