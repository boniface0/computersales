 
// book class: represents a book
class book{
    constructor(title,auther,isnb){
     this.title = title;
     this.auther = auther;
     this.isnb = isnb;
    }
}
class store{
    static addbook(book){

    }
    static display(book){

    }
    static removebook(isbn){
        
    }
}

// ui class: handle ui task
 class UI{
     static dispalybook(){
         const storebook =[{
             title: 'book one',
             auther: 'mainge',
             isnb:'345566'
         },
         {
             title:'book two',
             auther:'bony',
             isnb:'67972'
         }
        ];
        const books = storebook;
        books.forEach((bok)=>UI.addbooktolist(bok));
     }

     static addbooktolist(book){
         const list = document.querySelector('#booklist');
         const row = document.createElement('tr');
         row.innerHTML = `
           <td>${book.title}</td>
           <td>${book.auther}</td>
           <td>${book.isnb}</td>
           <td><a herf="#" class="btn btn-danger btn-sm delete">X</a></td>
         `;
         list.appendChild(row);
     }
     static clearfields(){
          document.querySelector('#title').value='';
          document.querySelector('#Auther').value='';
          document.querySelector('#Isbn').value='';
     }
     static showAlert(massage,classname){
         const div = document.createElement('div');
         div.className=`alert alert-${classname}`;
         div.appendChild(document.createTextNode(massage));
         const container = document.querySelector('.container');
         const form =document.querySelect;or('#formbook');
         container.insertBefore(div,form);
         setTimeout(()=>document.querySelector('.alert').remove(),2000)
     }
     static deletebook(el){
         if(el.classList.contains('delete')){
             el.parentElement.parentElement.remove();
             UI.showAlert("book deleted",'danger')
         };
     }
 }

 //events dispalybook
document.addEventListener('DOMContentLoaded',UI.dispalybook);
//Event s : add book
document.querySelector('#formbook').addEventListener('submit', (e)=>{
    // prevent default submit
    e.preventDefault();
   //get form values

   const title = document.querySelector('#title').value;
   const auther = document.querySelector('#Auther').value;
   const isbn = document.querySelector('#Isbn').value;
if(title == '' || auther == '' || isbn == ''){
    UI.showAlert('please insert all fields', 'primary');
}else{
    const book1 = new book(title,auther,isbn);
    UI.addbooktolist(book1);
    UI.showAlert('book inserted to list', 'success');
//clear fields
    UI.clearfields();
}
});

// EVENTS : rmove book
document.querySelector("#booklist").addEventListener('click',(e)=>{
    UI.deletebook(e.target);
})
function callbacback() {
     document.querySelector("#toto").innerHTML = "i love you";
}
setTimeout(callbacback,3000);

function display(some) {
    document.querySelector("#demo").innerHTML = some;
}

function getfile(myCallback) {
    let req = new XMLHttpRequest();
    req.open('GET' , "index.html");
    req.onload = function(){
        if(req.status == 200){
           myCallback(this.responseText);
    }else{
        myCallback("error", req.status);
    }

    }
    req.send();
}

getfile(display);

// using promises
let mypromise = new Promise(function(myresove,myrject){
    let req = new XMLHttpRequest();
    req.open('GET',"index2.html");
    req.onload = function(){
        if(req.status == 200){
            myresove(req.response)
        }else{
            myrject("error");
        }
    }
});
mypromise.then(
    function(value){
         display(value)
    },
    function(error){
        display(error)
    }
)

//document DOM

let  v = document.getElementById("#main");
v.onclick = function(){
    alert("good")
}

function data(){
    document.getElementById("#main2").innerHTML = document.write(Date());
}
data();