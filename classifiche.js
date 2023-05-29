function window_loginOn(){
    const div=document.querySelector(".div_userOff");
    const a=document.querySelector("#user").textContent.trim();
    if(a!="Accedi"){
        div.classList.add("div_userOn");
    }
}

function window_loginOff(){
    const div=document.querySelector(".div_userOff");
    div.classList.remove("div_userOn");
}



function getTopArtist(event){
        event.preventDefault();
        const data_form = new FormData(document.querySelector("#brani form"));
        fetch("postTopTracks.php?country="+encodeURIComponent(data_form.get('search_country')))
        .then(OnResponse)
        .then(TopArtistOnJson);
}

function OnResponse(response){
    return response.json();
}

function TopArtistOnJson(json){
    console.log(json);
    const lista=document.querySelector("#lista_brani");
    lista.innerHTML='';
    let sort_list=[];
    if(json.error===undefined && json.tracks.track.length>25) json.tracks.track.length=25;
    else return;
    for(let i=0;i<json.tracks.track.length;i++){
        sort_list.push(parseInt(json.tracks.track[i].listeners));
    }
    sort_list.sort(function(a, b){
        return b-a;
    });
    console.log(sort_list);
    for(let i=0;i<sort_list.length;i++){
        for(let j=0;j<json.tracks.track.length;j++){
            if(sort_list[i]===parseInt(json.tracks.track[j].listeners)){
                const block=document.createElement("div");
                block.className="block_brani";
                const block_img=document.createElement("div");
                block_img.className="block_img";
                const img=document.createElement("img");
                img.src="music.png";
                const block_num=document.createElement("div");
                block_num.className="block_num";
                const num=document.createElement("p");
                num.className="number";
                num.innerHTML=i+1;
                const name=document.createElement("p");
                name.className="track_name"
                name.innerHTML=json.tracks.track[j].name;
                const artist=document.createElement("p");
                artist.className="artist_name";
                artist.innerHTML=json.tracks.track[j].artist.name;
                block_num.appendChild(num);
                block.appendChild(block_num);
                block_img.appendChild(img);
                block.appendChild(block_img);
                block.appendChild(name);
                block.appendChild(artist);
                lista.appendChild(block);

            }
        }
    }

}

const form=document.querySelector("#brani form");
form.addEventListener("submit", getTopArtist);
const login_navOn=document.querySelector('.login_nav');
login_navOn.addEventListener("mouseover", window_loginOn);
const login_navOff=document.querySelector('.login_nav');
login_navOff.addEventListener("mouseout", window_loginOff);