const input = document.querySelector('countryMap');

input.addEventListener('click', event => {
  countryMap.innerHTML = `Nombre de clics : ${event.detail}`;
});