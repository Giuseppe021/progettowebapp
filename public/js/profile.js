function toggleEditMode(editMode) {
    const inputs = document.querySelectorAll('.profile-data input');
    inputs.forEach(input => {
        input.disabled = !editMode;
    });
    document.getElementById('edit-profile').classList.toggle('hidden', editMode);
    document.getElementById('save-profile').classList.toggle('hidden', !editMode);
}

function setUserProfile(user) {
    document.getElementById('user-image').src = user.image_url ? user.image_url : 'https://scontent.fmxp7-1.fna.fbcdn.net/v/t39.30808-6/291442037_460023682789740_5781431089213316632_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=GiKIT1lMzSQQ7kNvgHNANZL&_nc_ht=scontent.fmxp7-1.fna&oh=00_AYD9CQ9TrgtYDObs91_Q2A7aGYT9E1TGAInlo-mBWM0tsQ&oe=6699A4BC';
    document.getElementById('user-name').textContent = user.name;
    document.getElementById('user-id').textContent = user.id;
    document.getElementById('user-role').textContent = user.role;
    document.getElementById('user-name1').value = user.name;
    document.getElementById('user-surname').value = user.surname;
    document.getElementById('user-username').value = user.username;
    document.getElementById('user-email').value = user.email;
}



function onSaveUserProfileData(data) {
    if (data.success) {
        setUserProfile(data.user);
        toggleEditMode(false);
    } else {
        alert('Errore durante l\'aggiornamento del profilo: ' + data.message);
    }
}

function onSaveUserProfileResponse(response) {
    return response.json();
}

function saveUserProfile() {
    const userProfile = {
        name: document.getElementById('user-name1').value,
        surname: document.getElementById('user-surname').value,
        username: document.getElementById('user-username').value,
        email: document.getElementById('user-email').value,
    };
    const form_data = new FormData();
    form_data.append('name', userProfile.name);
    form_data.append('surname', userProfile.surname);
    form_data.append('username', userProfile.username);
    form_data.append('email', userProfile.email);

    form_data.append('_token', csrf_token);


    fetch(BASE_URL + 'updateUserProfile', {method: 'POST', body: form_data}).then(onSaveUserProfileResponse).then(onSaveUserProfileData).catch(error => console.error('Errore durante l\'aggiornamento del profilo:', error));
}

function onGetUserProfileData(data) {
    setUserProfile(data);
}

function onGetUserProfileResponse(response) {
    return response.json();
}

fetch(BASE_URL + 'getUserProfile').then(onGetUserProfileResponse).then(onGetUserProfileData).catch(error => console.error('Errore durante il recupero dei dati:', error));


document.getElementById('edit-profile').addEventListener('click', function() {
    toggleEditMode(true);
});

document.getElementById('save-profile').addEventListener('click', function() {
    saveUserProfile();
});