function checkAddress() {
    var chkBox = document.getElementById('flexCheckDefault');
    if (chkBox.checked) {
        document.getElementById('permanantaddress').style.display = "none";
    } else {
        document.getElementById('pAddress1').value = "";
        document.getElementById('pAddress2').value = "";
        document.getElementById('pAddress3').value = "";
        document.getElementById('pCountry').value = "";
        document.getElementById('pState').value = "";
        document.getElementById('pCity').value = "";
        document.getElementById('pZip').value = "";
        document.getElementById('permanantaddress').style.display = "block";
    }
}