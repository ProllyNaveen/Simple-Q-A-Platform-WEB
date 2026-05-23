function validateReport() {
    var reason = document.forms["reportForm"]["reason"].value;

    if(reason == "") {
        alert("Please enter a reason for reporting!");
        return false;
    }

    return true;
}