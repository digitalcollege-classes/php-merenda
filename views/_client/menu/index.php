<div class="container-fluid">
    <h1 class="mt-1">Cardapio</h1>
    <hr>

    <div class="text-end">
        <button data-bs-toggle="modal" data-bs-target="#modalCart" class="btn btn-info">
            Carrinho
            <span class="badge bg-secondary" id="quantity-items">0</span>
        </button>
        <a href="/cardapio/pedidos" class="btn btn-outline-info">
            Meus Pedidos
        </a>
    </div>

    <div class="modal fade" id="modalCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantidade</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                           
                        </tbody>
                    </table>

                    <p>
                        Preço total: <strong id="total-price">R$ 0</strong>
                    </p>

                    <form action="" onsubmit="confirmOrder(event)">
                        <span>Retirada ou Entrega?</span>
                        <label for="retirada">Retirada?</label>
                        <input type="radio" id="retirada" name="type" value="retirada">

                        <label for="delivery">Delivery?</label>
                        <input type="radio" id="delivery" name="type" value="delivery">


                        <button class="btn btn-info">Confirmar Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="row">
        <?php
            foreach ($products as $item) {
                $data = json_encode([
                    'name' => $item->getName(),
                    'id' => $item->getId(),
                    'price' => $item->getPrice(),
                ]);
                echo "
                    <div class='col-md-3 col-sm-12 mt-3'>
                        <div class='card'>
                            <img style='border-radius: 10px; object-fit: cover; height: 250px;' src='{$item->getImages()[0]}' alt=''>
                
                            <div class='d-flex align-items-center justify-content-between p-3 pb-0'>
                                <span>
                                    {$item->getName()}
                                    |
                
                                    <strong>R$ {$item->getPrice()}</strong>
                                </span>    
                            
                                <button data-item='{$data}' data-action='add-item' class='btn btn-primary'>+ 1</button>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>
    </section>
</div>

<script>
    function confirmOrder(event) {
        event.preventDefault();

        let retirada = document.getElementById('retirada').checked;
        let tipo = retirada === true ? 'Retirada' : 'Delivery';
        let items = JSON.parse(
            localStorage.getItem('items') || '[]'
        );

        fetch('http://localhost:8080/api/pedidos/novo', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                items: items,
                type: tipo
            })
        })
            .then(res => res.json())
            .then(dados => {
                console.log(dados);
            });
    }

    function loadDataItems() {
        let cart = JSON.parse(
            localStorage.getItem('items') || '[]'
        );


        let totalPrice = 0;

        document.getElementById('cart-items').innerHTML = cart.map((item, key) => {
            totalPrice += item.price;

            return `<tr>
                <td>${item.name}</td>
                <td>${item.price}</td>
                <td>
                    <button onclick='remove(${key})' class="btn btn-sm btn-primary">X</button>
                </td>
            </tr>`;
        }).join('');

        document.getElementById('total-price').innerHTML = `R$ ${totalPrice}`;
    }

    document.querySelector('[data-bs-target="#modalCart"]').addEventListener('click', () => {
        loadDataItems();
    });

    function remove(key) {
        let cart = JSON.parse(
            localStorage.getItem('items') || '[]'
        );

        cart.splice(key, 1);

        localStorage.setItem('items', JSON.stringify(cart));

        loadDataItems();
        updateQuantity();
    }


    document.querySelectorAll('[data-action="add-item"]').forEach(btn => {
        btn.addEventListener('click', () => {
            let product = JSON.parse(
                btn.getAttribute('data-item')
            );
            
            let cart = JSON.parse(
                localStorage.getItem('items') || '[]'
            ); //string que na verdade eh um array

            cart.push(product);

            localStorage.setItem('items', JSON.stringify(cart));

            updateQuantity();
        });
    });

    function updateQuantity() {
        let cart = JSON.parse(
            localStorage.getItem('items') || '[]'
        );

        document.getElementById('quantity-items').innerHTML = cart.length;
    }
    
    updateQuantity();
</script>
    