let recupInfo= document.getElementById('information')
let recupCom= document.getElementById('commentaire')
let recupVideo= document.getElementById('video')


function info(){
    console.log('je rentre dans la fonction')
    if(recupInfo.style.display=='none'){
        recupInfo.style.display='block';
        recupVideo.style.display='none';
        recupCom.style.display='none';
        console.log('je rentre dans le if')
    }else{
        recupInfo.style.display='none'
        recupCom.style.display='block'
        console.log('je rentre dans le else')
    }
}

function com(){
    console.log('je rentre dans la fonction')
    if(recupCom.style.display=='none'){
        recupInfo.style.display='none';
        recupVideo.style.display='none';
        recupCom.style.display='block';
        console.log('je rentre dans le if')
    }
}

function vid(){
    console.log('je rentre dans la fonction')
    if(recupVideo.style.display=='none'){
        recupInfo.style.display='none';
        recupVideo.style.display='block';
        recupCom.style.display='none';
        console.log('je rentre dans le if')
    }else{
        recupVideo.style.display='none'
        recupCom.style.display='block'
        console.log('je rentre dans le else')
    }
}