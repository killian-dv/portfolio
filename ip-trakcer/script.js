import { API_KEY } from './config.js';
const form = document.querySelector('form');
const input = document.querySelector('input[type="text"]');

// réglage par déaut de la carte
var map = L.map('map').setView([48.866667, 2.333333], 13);

      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

form.addEventListener('submit', (event) => {
  event.preventDefault();
  const IP_ADRESS = input.value;
  fetch(`https://geo.ipify.org/api/v2/country,city?apiKey=${API_KEY}&ipAddress=${IP_ADRESS}`)
    .then(response => response.json())
    .then(data => {
      // Traitement des données récupérées
      // console.log(data);
      const lat = data.location.lat;
      const lng = data.location.lng;
      const ip = data.ip;
      const location = data.location.city + ', ' + data.location.postalCode;
      const timezone = 'UTC ' + data.location.timezone;
      const isp = data.isp;
      console.log (lat, lng, ip, location, timezone, isp);


      // Affichage des données récupérées
      map.setView([lat, lng], 13);

      L.marker([lat, lng]).addTo(map)

      const ip_text = document.querySelector('#ip');
      const location_text = document.querySelector('#location');
      const timezone_text = document.querySelector('#timezone');
      const isp_text = document.querySelector('#isp');

      // Injecte les données dans l'élément HTML sélectionné
      ip_text.innerHTML = ip;
      location_text.innerHTML = location;
      timezone_text.innerHTML = timezone;
      isp_text.innerHTML = isp;

      //Changer la couleur du texte
      ip_text.style.color = 'hsl(0, 0%, 17%)';
      location_text.style.color = 'hsl(0, 0%, 17%)';
      timezone_text.style.color = 'hsl(0, 0%, 17%)';
      isp_text.style.color = 'hsl(0, 0%, 17%)';
    })
    .catch(error => {
      console.error('Erreur lors de la requête', error);
    });
});