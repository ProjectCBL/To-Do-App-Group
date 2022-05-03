function login(){
    let username = document.getElementById("username").value;
    let password = document.getElementById("pass").value;

    if(username.length == 0 || password == 0){
        document.getElementById("invalid").innerHTML = "Missing field, please correct...";
    }
    else{

        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("body").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","../Services/login.php?username=" + username + "&password=" + password, true);
        xmlhttp.send();

    }
}