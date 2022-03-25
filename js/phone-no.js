function phonenumber(inputtxt) {
    var phoneno = /^\d{10}$/;
    if (inputtxt.value.match(phoneno)) {
        return true;
    } else {
        alert('Not a valid  phone no');
        return false;
    }
}