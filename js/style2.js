 class submit{
     static savedetails(){
         let fname = document.getElementById("materialRegisterFormFirstName").value;
         let lname = document.getElementById("materialRegisterFormLastName").value;
         let email  = document.getElementById("materialRegisterFormEmail").value;
         let password = document.getElementById("materialRegisterFormPassword").value;
         
         let data={
             fname :fname,
             lname :lname,
             email :email,
             password:password
     }
     
     console.log(lname);
     
     var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("materialRegisterFormPasswordHelpBlock").innerHTML = this.responseText;
    }
  };  
  xhttp.open("POST", "reg.jsp", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
 }     
 }



let btn = document.getElementById("submit");
let form = document.getElementById("form");
form.addEventListener("submit",(e)=>{
     e.preventDefault();
    submit.savedetails();
})
    


