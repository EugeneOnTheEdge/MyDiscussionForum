window.onload = function (){
    var form = document.getElementById('login');
    var uname = document.getElementsByName("Uname");
    var password= document.getElementsByName("Pass");
    form.addEventListener('submit', validateForm);
    form.addEventListener('input', removeStyling);

    password[0].placeholder = "Enter password";
    uname[0].placeholder = "Enter username";

    function removeStyling(){
        if(uname[0].value != ""){
            uname[0].style.border = "";
        }
        if(password[0].value != ""){
            password[0].style.border = "";
        }
    }

    function validateForm(e){        
        if(uname[0].value != "abc"){
            e.preventDefault();
            uname[0].value = "";
            uname[0].placeholder = "Incorrect username";
            uname[0].style.border = '1px solid red';
        }
        if(password[0].value !="ABC"){
            password[0].value = "";
            password[0].placeholder = "Incorrect password";
            password[0].style.border = '1px solid red';
            e.preventDefault();
        }
    }


 }