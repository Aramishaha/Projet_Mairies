// Les variables dont on a besoin
var sp, btn_start, btn_stop, t, ms, s, mn, h;

// Fonction pour initialiser les variables quand la page se charge
window.onload = function() {
    sp = document.getElementsByTagName('span');
    btn_start = document.getElementById('start'); // Bouton Start
    btn_stop = document.getElementById('stop');   // Bouton Stop
    t = null; // Initialisation de t à null
    ms = 0; s = 0; mn = 0; h = 0;
}

// Mettre en place le compteur   
function update_chrono() {
    ms += 1;
    if (ms === 100) {
        ms = 0; // Remettre ms à 0
        s += 1;
    }
    if (s === 60) {
        s = 0;
        mn += 1;
    }
    if (mn === 60) {
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
    if (t === null) { // Vérifie si le chronomètre est déjà en cours
        t = setInterval(update_chrono, 10); // Démarre le chronomètre
        btn_start.disabled = true; // Désactiver le bouton Start
        btn_stop.disabled = false; // Activer le bouton Stop
    }
}

// Fonction pour arrêter le chronomètre
const stop = () => {
    if (t !== null) { // Vérifie si le chronomètre est en cours
        clearInterval(t); // Suppression de l'intervalle t que nous avions créés
        t = null; // Remettre t à null
        btn_start.disabled = false; // Réactiver le bouton Start
        btn_stop.disabled = true; // Désactiver le bouton Stop
    }
}

// Initialiser les valeurs du compteur
const reset = () => {
    clearInterval(t);
    t = null; // Remettre t à null
    btn_start.disabled = false;
    btn_stop.disabled = true; // Désactiver le bouton Stop
    ms = 0; s = 0; mn = 0; h = 0;
    // Insérer ces nouvelles valeurs dans les spans
    sp[0].innerHTML = h + "h";
    sp[1].innerHTML = mn + "min";
    sp[2].innerHTML = s + "s";
    sp[3].innerHTML = ms + "ms";
}

// Fonction pour sauvegarder
function save() {
    clearInterval(t);
    stop(); // Arrêter le chronomètre avant de sauvegarder
    let hours = sp[0].innerText.split('h')[0]; // Correction de l'accès à spans
    let minutes = sp[1].innerText.split('min')[0];
    let seconds = sp[2].innerText.split('s')[0];
    let milliseconds = sp[3].innerText.split('ms')[0];

    document.getElementById('hours').value = hours;
    document.getElementById('minutes').value = minutes;
    document.getElementById('seconds').value = seconds;
    document.getElementById('milliseconds').value = milliseconds;

    document.getElementById('chronoForm').submit();
}
