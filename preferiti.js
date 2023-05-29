function getalbum(){
    fetch("like.php")
    .then(OnResponse)
    .then(OnJson)
}

function OnResponse(response){
    return response.json();
}

function OnJson(json){
    console.log(json);
    const user=document.querySelector("#user").textContent.trim();
    const header=document.querySelector("header");
    const p=document.createElement("p");
    let j=0;
    for(let i=0;i<json.length;i++){
        if(json[i].username===user)j++;
    }
    p.innerHTML=j+" album";
    p.className="count";
    header.appendChild(p);
    const div_album=document.querySelector(".lista");
    for(let i=0;i<json.length;i++){
        if(json[i].username===user){
        const block=document.createElement("div");
        block.className="div_image_album";
        const number=document.createElement("p");
        number.innerHTML=i+1;
        number.id="numb";
        const img=document.createElement("img");
        img.src=json[i].img;
        const album=document.createElement("p");
        album.innerHTML=json[i].album
        album.id="nome_alb";
        const artist=document.createElement("p");
        artist.id="nome_art";
        artist.innerHTML=json[i].artist;
        const playcount=document.createElement("p");
        playcount.id="pcount";
        playcount.innerHTML=json[i].playcount;
        block.appendChild(number);
        block.appendChild(img);
        block.appendChild(album);
        block.appendChild(artist);
        block.appendChild(playcount); 
        div_album.appendChild(block);
        }
    }
}


getalbum();