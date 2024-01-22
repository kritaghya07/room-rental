

function validateForm(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("Pass").value;
    if(email =="" || password==""){
        document.getElementById("emailerr").innerHTML= "NO blank values";
        document.getElementById("passerr").innerHTML= "NO blank values";
        return false;
    }else{
        true;
    }
    if(email.length<6 || password.length<6){
        document.getElementById("emailerr").innerHTML= "provide valid email";
        document.getElementById("passerr").innerHTML= "Password must be 6 character long"; 
        return false;
    }else{
        true;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailerr').innerText = "Invalid email address";
                return false;
            }
            else{
                true;
            }
}