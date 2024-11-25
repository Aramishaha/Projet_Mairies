const cubes = [
    { name: "Rubik's Cube", image: "path/to/image1.jpg" },
    { name: "CUBE 2", image: "path/to/image2.jpg" },
    // Ajoute d'autres cubes ici...
];

let startTime;
let interval;
const bestTimes = [];

document.addEventListener('DOMContentLoaded', () => {
    const cubesContainer = document.getElementById('cubes-container');

    cubes.forEach(cube => {
        const cubeElement = document.createElement('div');
        cubeElement.className = 'cube';
        cubeElement.innerHTML = `
            <img src="${cube.image}" alt="${cube.name}" style="width: 80px; height: 80px;">
            <h3>${cube.name}</h3>
        `;
        cubeElement.addEventListener('click', () => openTimer(cube.name));
        cubesContainer.appendChild(cubeElement);
    });

    document.getElementById('start-btn').addEventListener('click', startTimer);
    document.getElementById('stop-btn').addEventListener('click', stopTimer);
});

function openTimer(cubeName) {
    document.getElementById('cube-name').innerText = cubeName;
    document.getElementById('timer-container').style.display = 'block';
    document.getElementById('chrono').innerText = '00:00:00';
    document.getElementById('best-times').innerHTML = '';
}

function startTimer() {
    startTime = Date.now();
    interval = setInterval(updateChrono, 100);
    document.getElementById('start-btn').disabled = true;
    document.getElementById('stop-btn').disabled = false;
}

function stopTimer() {
    clearInterval(interval);
    document.getElementById('start-btn').disabled = false;
    document.getElementById('stop-btn').disabled = true;

    const timeTaken = Date.now() - startTime;
    bestTimes.push(timeTaken);
    bestTimes.sort((a, b) => a - b);
    displayBestTimes();
}

function updateChrono() {
    const elapsedTime = Date.now() - startTime;
    const totalSeconds = Math.floor(elapsedTime / 1000);
    const hours = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
    const minutes = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
    const seconds = String(totalSeconds % 60).padStart(2, '0');
    document.getElementById('chrono').innerText = `${hours}:${minutes}:${seconds}`;
}

function displayBestTimes() {
    const bestTimesList = document.getElementById('best-times');
    bestTimesList.innerHTML = ' ';
    bestTimes.slice(0, 10).forEach(time => {
        const totalSeconds = Math.floor(time / 1000);
        const hours = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
        const minutes = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
        const seconds = String(totalSeconds % 60).padStart(2, '0');
        const listItem = document.createElement('li');
        listItem.innerText = `${hours}:${minutes}:${seconds}`;
        bestTimesList.appendChild(listItem);
    });
}