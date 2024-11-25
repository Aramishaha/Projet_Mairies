"use strict";

/* global data */

// Les variables dont on a besoin
var sp, btn_start, btn_stop, t, ms, s, mn, h;
var bestTimes = [];

// Fonction pour initialiser les variables quand la page se charge
window.onload = function() {
    sp = document.getElementsByTagName('span');
    btn_start = document.getElementById('start'); // Utiliser getElementById
    btn_stop = document.getElementById('stop'); // Utiliser getElementById
    t = null;
    ms = 0; s = 0; mn = 0; h = 0;
}

// Mettre en place le compteur   
function update_chrono() {
    ms += 1;
    if (ms == 100) {
        ms = 0;
        s += 1;
    }
    if (s == 60) {
        s = 0;
        mn += 1;
    }
    if (mn == 60) {
        mn = 0;
        h += 1;
    }

    // Insertion des valeurs dans les spans
    sp[0].innerHTML = h + "h";
    sp[1].innerHTML = mn + "min";
    sp[2].innerHTML = s + "s";
    sp[3].innerHTML = ms + "ms";
}

// Mettre en place la fonction button start
const start = () => {
    t = setInterval(update_chrono, 10);
    btn_start.disabled = true;
}

// Fonction pour arrêter le chronomètre
const stop = () => {
    clearInterval(t); // Suppression de l'intervalle t que nous avions créés
    btn_start.disabled = false;

    // Enregistrer le temps
    let recordedTime = {
        hours: h,
        minutes: mn,
        seconds: s,
        milliseconds: ms
    };
    bestTimes.push(recordedTime);
    saveBestTimes(); // Sauvegarder dans la base de données
    displayBestTimes();
}

// Initialiser les valeurs du compteur
const reset = () => {
    clearInterval(t);
    btn_start.disabled = false;
    ms = 0; s = 0; mn = 0; h = 0;
    // Insérer ces nouvelles valeurs dans les spans
    sp[0].innerHTML = h + "h";
    sp[1].innerHTML = mn + "min";
    sp[2].innerHTML = s + "s";
    sp[3].innerHTML = ms + "ms";
}

// Fonction pour afficher les meilleurs temps
const displayBestTimes = () => {
    const bestTimesList = document.getElementById('best-times');
    bestTimesList.innerHTML = ''; // Vider la liste avant de la remplir

    // Tri des meilleurs temps en fonction de la durée totale en millisecondes
    bestTimes.sort((a, b) => {
        const timeA = (a.hours * 3600000) + (a.minutes * 60000) + (a.seconds * 1000) + a.milliseconds;
        const timeB = (b.hours * 3600000) + (b.minutes * 60000) + (b.seconds * 1000) + b.milliseconds;
        return timeA - timeB;
    });

    // Afficher les 10 meilleurs temps
    bestTimes.slice(0, 10).forEach(time => {
        const listItem = document.createElement('li');
        listItem.innerText = `${time.hours}h ${time.minutes}min ${time.seconds}s ${time.milliseconds}ms`;
        bestTimesList.appendChild(listItem);
    });
}






const saveBestTimes = () => {
    fetch('', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(bestTimes)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Temps sauvegardés avec succès:', data);
    })
    .catch(error => {
        console.error('Erreur lors de la sauvegarde:', error);
    });
}

// Fonction pour charger les meilleurs temps depuis la base de données
const loadBestTimes = () => {
    fetch('/api/getBestTimes')
        .then(response => response.json())
        .then(data => {
            bestTimes = data;
            displayBestTimes(); // Afficher les temps chargés
        })
        .catch(error => {
            console.error('Erreur lors du chargement des temps:', error);
        });
}