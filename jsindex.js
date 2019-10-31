let jaquette= document.getElementsByClassName('soupan');

function afficherFilm(nombre,url,id,i){
    var content=document.getElementById(id);
    page=1;
    id="";
    nombre=6;
    genre="";
    url1=url+page;


    function movie(page,i){
        let i;
        fetch(url)
        .then(reponse =>reponse.json())
        .then (data => {
        for(i=0;i<nombre;i++){
        var test  =data.results[i].poster_path;
        var id = data.results[i].id;
        content.innerHTML+= `<div class='col-md-2 pochette' onmouseover='pocket(${i})' onmouseout='outPocket(${i})' ><a href="pageVideo.php?id=${id}"><span class='soupan' style="display:none"> texte for test</span><img width= 100%  class=''src="http://image.tmdb.org/t/p/w185//${test}"></img> </a></div>`
    }
        })

        }
movie(page,i);
}

function pocket(i){
    jaquette[i].style.display="block"
    console.log('yes')
}




function outPocket(i){
jaquette[i].style.display='none'
}

