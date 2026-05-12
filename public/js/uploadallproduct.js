function createProductElement(product) {
    const article = document.createElement('article');
    const dataProductDiv = document.createElement('div');
    dataProductDiv.classList.add('dataProduct');
    
    const link = document.createElement('a');
    link.href = BASE_URL + 'product/' + product.id;

    const img = document.createElement('img');
    img.src = product.image_url;
    img.alt = product.name;

    const productDescriptionDiv = document.createElement('div');
    productDescriptionDiv.classList.add('productDescription');
    
    const h4 = document.createElement('h4');
    h4.classList.add('nameProduct');
    
    const nameLink = document.createElement('a');
    nameLink.href = BASE_URL + 'product/' + product.id;
    nameLink.textContent = product.name;

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
    const productList = document.getElementById('all-product-list');
    productList.innerHTML = ''; 
    
    data.forEach(product => {
        const productItem = createProductElement(product);
        productList.appendChild(productItem);
    });
}

function onListAllProductsData(data) {
    viewProducts(data);
}

function onListAllProductsResponse(response) {
    return response.json();
}


fetch(BASE_URL + 'getAllProducts').then(onListAllProductsResponse).then(onListAllProductsData).catch(error => console.error('Errore durante il recupero dei dati:', error));

