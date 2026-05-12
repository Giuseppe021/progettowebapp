let userName='';
let userSurname='';


function onUserResponse(response) {
    return response.json();
}

function addRepair(event) {
    event.preventDefault();
    
    const form = document.getElementById('add-repair-form');
    const formData = new FormData(form);
    formData.append('_token', csrf_token);

    fetch(BASE_URL + 'addrepair',  {method: 'POST', body: formData}).then(response => response.json()).then(data => {
        if (data.success) {
            console.log('Riparazione aggiunta con successo:', data);              
            document.getElementById('add-repair').classList.add('hidden');          
            fetchRepairs();
            form.reset();
        } else {
            console.error('Errore durante l\'aggiunta della riparazione:', data.error);
        }
    })
    .catch(error => console.error('Errore durante l\'aggiunta della riparazione:', error));
}

function fetchRepairs() {
    fetch(BASE_URL + 'listrepairs')
        .then(onRepairResponse)
        .then(onRepairData)
        .catch(onRepairError);
}

function deleteRepair(event) {
    const repairId = event.currentTarget.dataset.repair_id;    
    fetch(BASE_URL + 'remove-repair/' + repairId).then(onRepairResponse).then(onRepairData).then(fetchRepairs).catch(onRepairError);

}

function createRepairElement(repair, isSuperadmin) {
    const repairItem = document.createElement('div');
    repairItem.classList.add('repair-item'); 

    if(isSuperadmin){
        const repairOptions = document.createElement('div');
        repairOptions.classList.add('optionAdmin');
        
        const linkModRepair = document.createElement('a');
        linkModRepair.dataset.repair_id = repair.id;
        linkModRepair.href = BASE_URL + 'modrepair/' + repair.id;
        linkModRepair.textContent = 'Modifica /';

        const linkDelRepair = document.createElement('a');
        linkDelRepair.textContent = 'Elimina ';
        linkDelRepair.dataset.repair_id = repair.id;
        linkDelRepair.addEventListener('click', deleteRepair);

        repairOptions.appendChild(linkModRepair);
        repairOptions.appendChild(linkDelRepair);
        repairItem.appendChild(repairOptions);
    }

    const title = document.createElement('h2');
    if(isSuperadmin){
        title.textContent = 'Codice riparazione: # ' + repair.id + ' - Cliente: Caricamento nome in corso...';  
    }else{
        title.textContent = 'Codice riparazione: # ' + repair.id; 
    }

     

    const description = document.createElement('p');
    description.textContent = 'Descrizione: ' + repair.description;

    const status = document.createElement('p');
    status.textContent = 'Stato: ' + repair.status;

    const startDate = document.createElement('p');
    startDate.textContent = 'Data di inizio: ' + repair.start_date;

    const endDate = document.createElement('p');
    endDate.textContent = 'Data fine prevista: ' + repair.estimated_completion;

    repairItem.appendChild(title);
    repairItem.appendChild(description);
    repairItem.appendChild(status);
    repairItem.appendChild(startDate);
    repairItem.appendChild(endDate);

    fetch(BASE_URL + 'getNameUser/' + repair.user_id)
    .then(onUserResponse).then(data => {
        if (data.error) {
            console.error('Errore durante il recupero dei dati utente:', data.error);
            if(isSuperadmin){
                title.textContent = 'Codice riparazione: # ' + repair.id + ' - Cliente: Errore durante il recupero del nome' + '  ID: ' + repair.user_id;
            }
            else{
                title.textContent = 'Codice riparazione: # ' + repair.id ;
            }
        } else {
            if(isSuperadmin){
                title.textContent = 'Codice riparazione: # ' + repair.id + ' - Cliente: ' + data.name + ' ' + data.surname + '  ID: ' + repair.user_id;
            }
            else{
                title.textContent = 'Codice riparazione: # ' + repair.id ;
            }
        }
    })
    .catch(error => {
        console.error('Errore durante il recupero dei dati:', error);
        title.textContent = 'Codice riparazione: # ' + repair.id + ' - Cliente: Errore durante il recupero del nome' + '  ID: ' + repair.user_id;
    });

    return repairItem;
}

function viewRepairs(data, isSuperadmin) {
    const repairStatusDiv = document.getElementById('repair-status');
    repairStatusDiv.innerHTML = ''; 

    if (!data || !Array.isArray(data) || data.length === 0) {
        const emptyMessage = document.createElement('p');
        emptyMessage.textContent = 'Non ci sono riparazioni in corso.';
        repairStatusDiv.appendChild(emptyMessage);
        return;
    }

    for(repairs of data) {
        const repairItem = createRepairElement(repairs, isSuperadmin);
        repairStatusDiv.appendChild(repairItem);
    }
}
function onRepairError(error) {
    console.error('Errore durante il recupero delle riparazioni:', error);
    const repairStatusDiv = document.getElementById('repair-status');
    repairStatusDiv.textContent = 'Errore durante il recupero delle riparazioni.';
}


function onRepairData(data) {
    console.log('Dati riparazione ricevuti:', data); // Log dei dati ricevuti
    if (data && data.repairs) { 
        viewRepairs(data.repairs, data.isSuperadmin);
    } else {
        onRepairError('Dati riparazione non validi'); 
    }
}

function onRepairResponse(response) {
    if (!response.ok) { 
        throw new Error('Network response was not ok');
    }
    return response.json();
}

fetch(BASE_URL + 'listrepairs').then(onRepairResponse).then(onRepairData).catch(onRepairError);

document.getElementById('add-btn').addEventListener('click', () => {
    document.getElementById('add-repair').classList.toggle('hidden');
});

document.getElementById('add-repair-button').addEventListener('click', addRepair);
