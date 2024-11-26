const LIST_ORDERS = document.getElementById('list-orders');

const CardOrder = ({type, price, status, createdAt}) => {
    return `
        <div class="col-12 mt-3">
            <div class="card card-body">
                <div class="d-flex">
                    <span class="badge bg-primary">Tipo: ${type}</span>
                    &nbsp;
                    <span class="badge bg-secondary">Status: ${status}</span>
                </div>
                <hr>

                <div class="fs-2">R$ ${price}</div>

                <hr>
                <div>
                    Pedido realizado em ${createdAt} 
                </div>
            </div>
        </div>
    `;
};

fetch('http://localhost:8080/api/pedidos/list')
    .then(res => res.json())
    .then(data => {
        LIST_ORDERS.innerHTML = data.map(item => CardOrder(item)).join('');
    });