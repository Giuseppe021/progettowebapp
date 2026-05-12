function onAddResponse(response) {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
}

function onAddJson(json) {
    if (json.success) {
        alert('Prodotto aggiunto al carrello');
    } else {
        alert('Errore: ' + json.error);
    }
}

function addtocart(){
    fetch(BASE_URL + 'addtocart/' + productId)
        .then(onAddResponse)
        .then(onAddJson)
        .catch(error => {
            alert('Errore nella richiesta: ' + error.message);
        });
}

const addToCartButton = document.getElementById('add-to-cart-btn');
addToCartButton.addEventListener('click', addtocart);
