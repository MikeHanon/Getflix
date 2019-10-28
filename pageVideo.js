let recupInfo= document.getElementById('information');
let recupCom= document.getElementById('commentaire');
let recupVideo= document.getElementById('video');
let recupInfo2=document.getElementById('information2');
let recupCom2 =document.getElementById('commentaire2');
let recupVideo2 =document.getElementById('video2');


function info(){
    console.log('je rentre dans la fonction')
    if(recupInfo.style.display =='none'){
        recupInfo.style.display='block';
        recupVideo.style.display='none';
        recupCom.style.display='none';
        recupInfo2.className='active'
        recupCom2.className="disabled"
        recupVideo2.className="disabled";
        console.log('je rentre dans le if')
    }else{
        recupInfo.style.display='none'
        recupCom.style.display='block'
        recupInfo2.className='disabled'
        recupCom2.className="active"
        recupVideo2.className="disabled";
        console.log('je rentre dans le else')
    }
}

function com(){
    console.log('je rentre dans la fonction')
    if(recupCom.style.display=='none'){
        recupInfo.style.display='none';
        recupVideo.style.display='none';
        recupCom.style.display='block';
        recupInfo2.className='disabled'
        recupCom2.className="active"
        recupVideo2.className="disabled";
        console.log('je rentre dans le if')
    }
}

function vid(){
    console.log('je rentre dans la fonction')
    if(recupVideo.style.display=='none'){
        recupInfo.style.display='none';
        recupVideo.style.display='block';
        recupCom.style.display='none';
        recupInfo2.className='disabled'
        recupCom2.className="disabled"
        recupVideo2.className="active";
        console.log('je rentre dans le if')
    }else{
        recupVideo.style.display='none'
        recupCom.style.display='block'
        recupInfo2.className='disabled'
        recupCom2.className="active"
        recupVideo2.className="disabled";
        console.log('je rentre dans le else')
    }
}
