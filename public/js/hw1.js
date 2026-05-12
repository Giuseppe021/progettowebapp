

const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const carouselInner = document.querySelector('.carousel-inner');

let currentIndex = 0;
const numItems = document.querySelectorAll('.carousel-item').length;
const intervalTime = 5000;
let slideInterval;

nextBtn.addEventListener('click', function() {
  currentIndex = (currentIndex + 1) % numItems;
  updateCarousel();
  resetInterval();
});

function updateCarousel() {
  const offset = -currentIndex * 100;
  carouselInner.style.transform = `translateX(${offset}%)`;
}

function startSlide() {
  slideInterval = setInterval(function() {
    currentIndex = (currentIndex + 1) % numItems;
    updateCarousel();
  }, intervalTime);
}

function resetInterval() {
  clearInterval(slideInterval);
  startSlide();
}
  
startSlide();


prevBtn.addEventListener('click', function() {
  currentIndex = (currentIndex - 1 + numItems) % numItems;
  updateCarousel();
  resetInterval();
});

function onSearchData(data) {
  
  const library = document.querySelector('#album-view');
  library.innerHTML = '';

  const results = data;
  let num_results = results.length;

  if (num_results === 0) {
      library.textContent = 'Nessun brano trovato';
      return;
  }

  
  num_results = Math.min(num_results, 20);

  for (let i = 0; i < num_results; i++) {
      const song_data = results[i];

     
      const album = document.createElement('div');
      album.classList.add('album');

      
      const img = document.createElement('img');
      img.src = song_data.image;

      
      const caption = document.createElement('span');
      caption.textContent = song_data.artist + ' - ' + song_data.title;

      album.appendChild(img);
      album.appendChild(caption);

      library.appendChild(album);
  }
}

function onSearchResponse(response) {
  console.log('Risposta ricevuta');
  if (!response.ok) {
      if (response.status === 401) {
          window.location.href = BASE_URL + 'login';
      } else {
          throw new Error('Errore nella risposta del server');
      }
  }
  return response.json();
}

function search(event) {
  
  event.preventDefault();

  const search_text = document.querySelector('#search-text').value;
  console.log('Eseguo ricerca: ' + search_text);

  fetch(BASE_URL + 'home/search/' + search_text)
      .then(onSearchResponse)
      .then(onSearchData)
      .catch(error => {
          console.error('Errore nella richiesta:', error);
          const library = document.querySelector('#album-view');
          library.textContent = 'Errore nella richiesta';
      });
}



function onNotizieJson(json) {
  console.log(json);
  const notizie = document.querySelector('#news-container');
  notizie.innerHTML = '';

  json.response.results.forEach(result => {
      const div = document.createElement('div');
      div.classList.add('not');

      const h3 = document.createElement('h3');
      h3.textContent = result.webTitle;

      const p = document.createElement('p');
      p.textContent = result.fields && result.fields.trailText ? result.fields.trailText : '';

      const a = document.createElement('a');
      a.href = result.webUrl;
      a.target = '_blank';
      a.textContent = 'Leggi di più';

      div.appendChild(h3);
      div.appendChild(p);
      div.appendChild(a);
      notizie.appendChild(div);
  });
}

function onNotizieResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
}

function notizie() {
    const rest_url = 'https://content.guardianapis.com/search?api-key=a5a405d8-9b2f-45e6-9f62-f2412d6dba01';
    console.log('URL: ' + rest_url);
    fetch(rest_url).then(onNotizieResponse).then(onNotizieJson);
}


  document.querySelector('#search-btn').addEventListener('click', search);

notizie();


