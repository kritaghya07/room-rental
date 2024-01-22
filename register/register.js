function validateForm(){
    var fname = document.getElementById("fullname").value;
    var uname = document.getElementById("username").value;
    var add = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var cpass = document.getElementById("confirmPassword").value;
    var phone = document.getElementById("phone").value;

    if(email =="" || pass ==""){
        document.getElementById('emailerr').innerHTML= "NO blank values";
    
        return false;
    }else{
        true;
    }
    if(email.length<6 || pass.length<6){
        document.getElementById('emailerr').innerHTML= "provide valid email";
        document.getElementById('passerr').innerHTML= "Password must be 6 character long"; 
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