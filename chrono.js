//Les variables dont on a besoin
var sp, btn_start, btn_stop, t, ms, mn, h;

//fonction pour initialiser les variables quand la page se charge
window.onload = function(){
    sp = document.getElementsByTagName('span');
    btn_start = document.getElementsByTagName('start');
    btn_stop = document.getElementsByTagName('stop');
    t;
    ms = 0, s=0 , mn=0, h=0;
}

//mettre en place le compteur   

function update_chrono(){
    
    ms += 1
    if(ms == 100) {
        ms=1;
        s+=1

    }
    if(s == 60){
        s=0;
        mn+=1
        
    }


    if(mn == 60){
       ms=0;
       h+=1;

    }

    //insertion des valeurs dans les spans
    // [0] permet de sélectionner le premier span
        //[1]                     le deuxième span etc...
    
    sp[0].innerHTML = h + "h" ;
    sp[1].innerHTML = mn + "min" ;
    sp[2].innerHTML = s + "s" ;
    sp[3].innerHTML = ms + "ms" ;
}

// mettre en place la fonction button start

const start = () => {
    clearInterval(t); // Suppression de l'intervalle t que nous avions créés
    t = null; // Remettre t à null pour permettre de redémarrer
    btn_start.disabled = false; // Réactiver le bouton Start
}
    


const stop = () => {
    clearInterval(t);//suppression de l'intervalle t que nous avions crée
    btn_start.disabled = false
}

//Initialiser les valeurs du compteur
const reset = () => {
    clearInterval(t);
    t = null; // Remettre t à null
    btn_start.disabled = false;
    ms = 0, s = 0, mn = 0, h = 0;
    //insère ces nouvelles valeurs dasn les spans
    sp[0].innerHTML = h + "h" ;
    sp[1].innerHTML = mn + "min" ;
    sp[2].innerHTML = s + "s" ;
    sp[3].innerHTML = ms + "ms" ;
}


function save(){
    clearInterval(t);
    btn_start.disabled = false;
    let spans = document.querySelectorAll('.time');
    let hours = span[0].innerText.split('')[0];
    let minutes = span[1].innerText.split('')[0];
    let seconds = span[2].innerText.split('')[0];
    let milliseconds = span[3].innerText.split('')[0];

    document.getElementById('hours').value = hours;
    document.getElementById('minutes').value = minutes;
    document.getElementById('seconds').value = seconds;
    document.getElementById('milliseconds').value = milliseconds;

    document.getElementById('chronoForm').submit();




}

// Fonction pour afficher les meilleurs temps
//const displayBestTimes = () => {
   // const bestTimesList = document.getElementById('best-times');
    //bestTimesList.innerHTML = ''; // Vider la liste avant de la remplir

    // Tri des meilleurs temps en fonction de la durée totale en millisecondes
    //bestTimes.sort((a, b) => {
      //  const timeA = (a.hours * 3600000) + (a.minutes * 60000) + (a.seconds * 1000) + a.milliseconds;
        //const timeB = (b.hours * 3600000) + (b.minutes * 60000) + (b.seconds * 1000) + b.milliseconds;
        //return timeA - timeB;
    //});

    // Afficher les 10 meilleurs temps
   // bestTimes.slice(0, 10).forEach(time => {
     //   const listItem = document.createElement('li');
       // listItem.innerText = `${time.hours}h ${time.minutes}min ${time.seconds}s ${time.milliseconds}ms`;
        //bestTimesList.appendChild(listItem);
   // });
//}