function displayDashBoard() {
    document.getElementById('dashboard').style.display = "block";
    document.getElementById('allusers').style.display = "none";
    document.getElementById('activeusers').style.display = "none";
    document.getElementById('deavtivatedusers').style.display = "none";
    document.getElementById('addusers').style.display = "none";
}

function displayAllUsers() {
    document.getElementById('dashboard').style.display = "none";
    document.getElementById('allusers').style.display = "block";
    document.getElementById('activeusers').style.display = "none";
    document.getElementById('deavtivatedusers').style.display = "none";
    document.getElementById('addusers').style.display = "none";
}

function displayActiveUsers() {
    document.getElementById('dashboard').style.display = "none";
    document.getElementById('allusers').style.display = "none";
    document.getElementById('activeusers').style.display = "block";
    document.getElementById('deavtivatedusers').style.display = "none";
    document.getElementById('addusers').style.display = "none";
    document.getElementById('changepassword').style.display = "none";
}

function displayDeactivatedUsers() {
    document.getElementById('dashboard').style.display = "none";
    document.getElementById('allusers').style.display = "none";
    document.getElementById('activeusers').style.display = "none";
    document.getElementById('deavtivatedusers').style.display = "block";
    document.getElementById('addusers').style.display = "none";
    document.getElementById('changepassword').style.display = "none";
}

function displayAddUsers() {
    document.getElementById('dashboard').style.display = "none";
    document.getElementById('allusers').style.display = "none";
    document.getElementById('activeusers').style.display = "none";
    document.getElementById('deavtivatedusers').style.display = "none";
    document.getElementById('addusers').style.display = "block";
    document.getElementById('changepassword').style.display = "none";
}

function displayChangePassword() {
    document.getElementById('dashboard').style.display = "none";
    document.getElementById('allusers').style.display = "none";
    document.getElementById('activeusers').style.display = "none";
    document.getElementById('deavtivatedusers').style.display = "none";
    document.getElementById('addusers').style.display = "none";
    document.getElementById('changepassword').style.display = "block";
}