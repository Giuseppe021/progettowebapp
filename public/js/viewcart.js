function onRemoveData(data) {
    if (data.success) {
        alert('Prodotto rimosso dal carrello');
        // Aggiorna la visualizzazione del carrello
        fetch(BASE_URL + 'getcartdata').then(onCartResponse).then(onCartData);
    } else {
        alert('Errore: ' + data.error);
    }
}

function onRemoveResponse(response) {
    return response.json();
}

function removeFromCart(productId) {
    fetch(BASE_URL + 'removefromcart/' + productId)
        .then(onRemoveResponse)
        .then(onRemoveData)
        .catch(error => {
            console.error('Errore durante la richiesta:', error);
        });
}

function createContentElement(content) {
    const tr = document.createElement('tr');

    // Colonna immagine e nome prodotto
    const tdProduct = document.createElement('td');
    const img = document.createElement('img');
    img.src = content.image_url;
    img.alt = content.name;
    img.style.width = '50px'; // Regola la dimensione dell'immagine se necessario
    const productName = document.createElement('p');
    productName.textContent = content.name;
    tdProduct.appendChild(img);
    tdProduct.appendChild(productName);

    // Colonna prezzo
    const tdPrice = document.createElement('td');
    tdPrice.textContent = parseFloat(content.price).toFixed(2) + ' €';

    // Colonna quantità
    const tdQuantity = document.createElement('td');
    tdQuantity.textContent = content.quantity;

    // Colonna totale
    const tdTotal = document.createElement('td');
    const total = content.price * content.quantity;
    tdTotal.textContent = total.toFixed(2) + ' €';

    // Colonna azioni
    const tdActions = document.createElement('td');
    const removeButton = document.createElement('button');
    removeButton.classList.add('remove-item-btn');
    removeButton.dataset.productId = content.product_id;  // Assicurati che sia il product_id corretto
    removeButton.textContent = 'Rimuovi';
    removeButton.addEventListener('click', function () {
        // Logica per rimuovere l'elemento dal carrello
        removeFromCart(content.product_id);
    });
    tdActions.appendChild(removeButton);

    // Aggiungi le colonne alla riga
    tr.appendChild(tdProduct);
    tr.appendChild(tdPrice);
    tr.appendChild(tdQuantity);
    tr.appendChild(tdTotal);
    tr.appendChild(tdActions);

    return tr;
}

function viewCart(data) {
    const cartContent = document.getElementById('cart-content');
    cartContent.innerHTML = ''; // Pulisci il contenitore prima di aggiungere nuovi elementi

    if (data.products.length === 0) {
        const emptyMessage = document.createElement('p');
        emptyMessage.textContent = 'Il carrello è vuoto.';
        cartContent.appendChild(emptyMessage);
        return;
    }

    const table = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');
    
    const headerRow = document.createElement('tr');
    const headers = ['Prodotto', 'Prezzo', 'Quantità', 'Totale', 'Azioni'];
    headers.forEach(headerText => {
        const th = document.createElement('th');
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    for (const content of data.products) {
        const contentItem = createContentElement(content);
        tbody.appendChild(contentItem);
    }

    table.appendChild(tbody);
    cartContent.appendChild(table);
}

function onCartData(data) {
    viewCart(data);
}

function onCartResponse(response) {
    return response.json();
}

fetch(BASE_URL + 'getcartdata').then(onCartResponse).then(onCartData).catch(error => console.error('Errore durante il recupero dei dati:', error));
