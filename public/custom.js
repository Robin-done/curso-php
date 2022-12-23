document.addEventListener("DOMContentLoaded",()=>{
    
    let url = window.location.pathname;

    if(url == '/'){
        url = 'home';           
    }
    else{
        url = url.split('/')[1];      
    }

    document.getElementById('body').classList.add(url);

});