<!-- Modal -->

<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="modal-header">
                <!-- Texto H1 -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
                <!-- Conteúdo -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" id="confirmActionBtn" style="display: none;">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Clientes</h6>
                <a href="/clientes/adicionar" class="btn btn-light mb-1 me-4">
                    <i class="material-icons">add</i> Adicionar
                </a>
            </div>
        </div>
        <div class="card-body p-2">
            <table class="table table-hover align-items-center text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($customers)): ?>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?= $customer->getId(); ?></td>
                                <td>
                                    <img src="<?= $customer->getPhoto(); ?>" alt="Foto do Cliente" style="border-radius: 50%; width: 40px; height: 40px; cursor: pointer;" onclick="openModal('<?= $customer->getPhoto(); ?>')">
                                </td>

                                <td><?= $customer->getName(); ?></td>
                                <td><?= $customer->getEmail(); ?></td>
                                <td><?= $customer->getPhone(); ?></td>
                                <td><?= $customer->isStatus() ? '<i class="material-icons text-success">check_circle</i>' : '<i class="material-icons text-danger">cancel</i>'; ?></td>
                                <td>

                                    <a class='btn btn-outline-warning' href='/clientes/editar?id=<?= $customer->getId(); ?>'><i class="material-icons">edit</i> Editar</a>
                                    <button class="btn btn-outline-danger" onclick="confirmRemove(<?= $customer->getId(); ?>)"><i class="material-icons">delete</i> Remover</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Sem clientes cadastrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function confirmRemove(id) {
        document.getElementById('modal-header').innerHTML = `<h1 class="modal-title fs-5" id="modal-title">Confirmação</h1>`;
        document.getElementById('modal-body').innerHTML = `<p>Tem certeza que deseja remover este cliente?</p>`;

        const confirmButton = document.getElementById('confirmActionBtn');
        confirmButton.style.display = 'inline-block';

        confirmButton.onclick = function() {
            window.location.href = '/clientes/remover?id=' + id;
        };

        document.getElementById('modalImage').addEventListener('hidden.bs.modal', function() {
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });

        let modal = new bootstrap.Modal(document.getElementById('modalImage'));
        modal.show();
    }

    function openModal(image) {
        document.getElementById('modal-header').innerHTML = `<h1 class="modal-title fs-5" id="modal-title">Foto do Cliente</h1>`;

        document.getElementById('modal-body').innerHTML = `<img src="${image}" width="100%">`;

        const confirmButton = document.getElementById('confirmActionBtn');
        confirmButton.style.display = 'none';

        document.getElementById('modalImage').addEventListener('hidden.bs.modal', function() {
            document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        });

        let modal = new bootstrap.Modal(document.getElementById('modalImage'));
        modal.show();
    }
</script>