<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal - Confirm Remove -->
<div class="modal fade" id="modalRemove" tabindex="-1" aria-labelledby="modalRemoveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalRemoveLabel">Confirmação de Remoção</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body-remove">
        Você tem certeza que deseja remover o item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-secondary" onclick="confirmRemove()">Remover</button>
      </div>
    </div>
  </div>
</div>

<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Categorias</h6>

                <a href="/categorias/adicionar" class="btn btn-light mb-1 me-4">
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
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($categories as $cat) {
                            $id = $cat->getId();
                            $image = $cat->getImage();

                            echo "
                            <tr>
                                <td>{$id}</td>
                                <td>{$cat->getName()}</td>
                                <td>{$cat->getDescription()}</td>
                                <td> <img onclick='openModal(`{$image}`)' data-bs-toggle='modal' data-bs-target='#modalImage' src='{$image}' width='50px'> </td>
                                <td>
                                    <a class='btn btn-outline-danger btn-sm' href='/categorias/editar'>Editar</a>
                                    <a onclick='openModalRemove({$id})' data-bs-toggle='modal' data-bs-target='#modalRemove' href='#' class='btn btn-outline-warning btn-sm'>Excluir</a>
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

<script>
    function openModal(image) {
        document.getElementById('modal-body').innerHTML = `
            <img src="${image}" width="100%">
        `;
    }

    function openModalRemove(id) {
        document.getElementById('modal-body-remove').setAttribute('data-id',id);
    }

    function confirmRemove() {
        let id = document.getElementById('modal-body-remove').getAttribute('data-id');
        window.location.href = '/categorias/remover?id='+id;
    }
</script>

