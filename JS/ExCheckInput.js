function checkInput(id) {
    var user, pass;
    if (id == 'user') {
        user = document.getElementById(id);
        user.style.color = (/^[a-zA-Z]+[\w]*$/.test(user.value)) ? "black" : "red";
    }
    if (id == "pass") {
        pass = document.getElementById(id);
        pass.style.color = (/^.{8,}$/.test(pass.value)) ? "black" : "red";
    }
}