function openProduct(event) {
    event.preventDefault();
    const product_id = event.currentTarget.dataset.product_id;
    if (product_id) {
        window.location.assign(BASE_URL + 'product/' + product_id);
    } else {
        console.error('Product ID is undefined');
    }
}



function createProductElement(product) {
    const article = document.createElement('article');
    const dataProductDiv = document.createElement('div');
    dataProductDiv.classList.add('dataProduct');
    
    const link = document.createElement('a');
    link.dataset.product_id = product.id; 
    link.addEventListener('click', openProduct);

    const img = document.createElement('img');
    img.src = product.image_url;
    img.alt = product.name;

    const productDescriptionDiv = document.createElement('div');
    productDescriptionDiv.classList.add('productDescription');
    
    const h4 = document.createElement('h4');
    h4.classList.add('nameProduct');
    
    const nameLink = document.createElement('a');
    nameLink.textContent = product.name;
    nameLink.dataset.product_id = product.id; 
    nameLink.addEventListener('click', openProduct);

    const priceDiv = document.createElement('div');
    priceDiv.classList.add('priceProduct');
    
    const strong = document.createElement('strong');
    const span = document.createElement('span');
    span.textContent = product.price + `€`;


    link.appendChild(img);
    h4.appendChild(nameLink);
    strong.appendChild(span);
    priceDiv.appendChild(strong);
    productDescriptionDiv.appendChild(h4);
    productDescriptionDiv.appendChild(priceDiv);
    dataProductDiv.appendChild(link);
    dataProductDiv.appendChild(productDescriptionDiv);
    article.appendChild(dataProductDiv);

    return article;
}


function viewProducts(data) {
    console.log(data);
    const productList = document.getElementById('product-list');
    productList.innerHTML = '';
    
    for(product of data) {
        const productItem = createProductElement(product);
        productList.appendChild(productItem);
    };
}

function onListPopularProductsData(data) {
    viewProducts(data);
}

function onListPopularProductsResponse(response) {
    return response.json();
}


fetch(BASE_URL + 'listPopularProducts').then(onListPopularProductsResponse).then(onListPopularProductsData).catch(error => console.error('Errore durante il recupero dei dati:', error));


