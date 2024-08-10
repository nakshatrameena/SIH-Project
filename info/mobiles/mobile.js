const modalpre = document.querySelector('.modalpre');
const overlay1 = document.querySelector('.overlay');
const btnsOpenModal1 = document.querySelector('.btn1');

const modalhar = document.querySelector('.modalhar');
const overlay2 = document.querySelector('.overlay');
const btnsOpenModal2 = document.querySelector('.btn2');

const openModalpre= function () {
  modalpre.classList.remove("hidden");
  overlay1.classList.remove("hidden");
}

const closeModalpre = function () {
  modalpre.classList.add('hidden');
  overlay1.classList.add('hidden');
};

btnsOpenModal1.addEventListener('click', openModalpre);
overlay1.addEventListener('click', closeModalpre);

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape' && !modalpre.classList.contains('hidden')) {
    closeModalpre();
  }
});

const openModalhar= function () {
  modalhar.classList.remove("hidden");
  overlay2.classList.remove("hidden");
}

const closeModalhar = function () {
  modalhar.classList.add('hidden');
  overlay2.classList.add('hidden');
};

btnsOpenModal2.addEventListener('click', openModalhar);
overlay2.addEventListener('click', closeModalhar);

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape' && !modalhar.classList.contains('hidden')) {
    closeModalhar();
  }
});

//Linking the map to the information page
document.addEventListener("DOMContentLoaded", function () {
  const openServerButton = document.getElementById("openServerButton");

  openServerButton.addEventListener("click", function () {
      // Set the location to the server URL, opening it in the same window
      const serverURL = "http://localhost:3000"; // Replace with your server URL
      window.location.href = serverURL;
  });
});


const card = document.querySelector(".card");

// function flipCard() {
//   card.style.transform = "rotateY(180deg)";
//   setTimeout(function() {
//     resetCard();
//   }, 2000);
// }

// function resetCard() {
//   card.style.transform = "rotateY(0deg)";
//   setTimeout(function() {
//     flipCard();
//   }, 2000);
// }
// setTimeout(function() {
//   flipCard();
// }, 2000);

//------------------flipping randomly------------------
// function flipCard(i) {
//   card[i].style.transform = "rotateY(180deg)";
//   setTimeout(function() {
//     resetCard(i);
//   }, 2000);
// }

// function resetCard(i) {
//   card[i].style.transform = "rotateY(0deg)";
//   var x = i;
//   while (x == i) {
//     x = Math.floor(Math.random() * 4);
//   }
//   setTimeout(function() {
//     flipCard(x);
//   }, 2000);
// }

// setTimeout(function() {
//   flipCard(0);
// }, 2000);
