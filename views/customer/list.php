<section class="container-fluid">
    <div class="card my-4 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex justify-content-between bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 mt-1">Listar Clientes</h6>
                <a href="/clientes/adicionar" class="btn btn-light mb-1 me-4">
                    Adicionar
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
                                <td><?= $customer->getName(); ?></td>
                                <td><?= $customer->getEmail(); ?></td>
                                <td><?= $customer->getPhone(); ?></td>
                                <td><?= $customer->isStatus() ? 'Active' : 'Inactive'; ?></td>
                                <td>
                                    <a href="/customer/view/<?= $customer->getId(); ?>" class="btn btn-sm btn-info">View</a>
                                    <a href="/customer/edit/<?= $customer->getId(); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="/customer/delete/<?= $customer->getId(); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
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