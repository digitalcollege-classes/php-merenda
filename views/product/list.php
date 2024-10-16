<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Produtos</h6>

                <a href="/produtos/adicionar" class="btn btn-light mb-1 me-4">
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
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Imagem</th>
                        <th>Disponível</th>
                        <th>Criado</th>
                        <th>Atualizado</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        foreach ($products as $prod) {
                            $id = $prod->getId();
                            $image = $prod->getImages()[0] ?? '';
                           

                            echo "
                            <tr>
                                <td>{$id}</td>
                                <td>{$prod->getName()}</td>
                                <td>{$prod->getQuantity()}</td>
                                <td>{$prod->getPrice()}</td>
                                <td><img onclick='openModal(`{$image}`)' data-bs-toggle='modal' data-bs-target='#modalImage' src='{$image}' width='50px'></td>
                                <td> {$prod->isAvailable()}</td>
                                <td> {$prod->getCreatedAt()->format('d/m/Y')}</td>
                                <td> {$prod->getUpdatedAt()->format('d/m/Y')}</td>
                            
                            </tr>
                            ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function openModal(image) {
        document.getElementById('modal-body').innerHTML = `
            <img src="${image}" width="100%">
        `;
    }

    function confirmRemove(id) {
        let response = confirm('Tem certeza?');

        if (response === true) {
            window.location.href = '/produtos/remover?id='+id;
        }
    }
</script>

