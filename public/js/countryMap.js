const countryMap = document.getElementById('countryMap');    // On récupère l'élément sur lequel on veut détecter le clic
countryMap.addEventListener('click', function() {          // On écoute l'événement click
    console.log('gg');               // On change le contenu de notre élément pour afficher "C'est cliqué !"
});


// const radios = document.getElementById('countryMap')
// for (const radio of radios) {
//   radio.onclick = (e) => {
//     console.log(e.target.value);
//   }
// }