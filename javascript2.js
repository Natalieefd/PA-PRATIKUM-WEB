
if(localStorage.getItem('preferredTheme') == 'gelap'){
    setDarkMode(true)
}

const id = document.getElementById("tulisan")
id.addEventListener('mouseenter', function(){
    tulisan.style.color = 'red';
});
id.addEventListener('mouseleave', function(){
    tulisan.style.color = 'white';
});


function setDarkMode(Gelap){

    var darkButton = document.getElementById('darkButton')
    var lightButton = document.getElementById('lightButton')

    if(Gelap){
        lightButton.style.display = "block"
        darkButton.style.display = "none" 
        localStorage.setItem('preferredTheme', 'gelap');
        
    }else{
        alert('Ingin mengubah warna tampilan');
        lightButton.style.display = "none"
        darkButton.style.display = "block"
        localStorage.removeItem('preferredTheme');
    }
    document.body.classList.toggle("darkmode");
}