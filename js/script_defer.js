// CLOSE NAVBAR IF CLICK ON LINK

const linksContainer = document.querySelector('.wrapper');

linksContainer.addEventListener('click', (e) => {
  if (e.target.matches('.wrapper a')) {
    // disable default behavior
    e.preventDefault();

    // close the side-bar menu
    closeSideMenu();

    // change the location
   window.location.href = e.target.href;
  }
});

function  closeSideMenu() {
  const sideMenuToggle = document.querySelector('#active');
  sideMenuToggle.click();
}

// const menuBtn = document.querySelector('.menu-btn');
// const closeBtn = document.querySelector('.close');
// const body = document.querySelector('body');

// menuBtn.addEventListener('click', () => {
//   body.style.overflow = 'hidden';
// });

// closeBtn.addEventListener('click', () => {
//   body.style.overflow = 'auto';
// });


const items = document.querySelectorAll('.card-item');

const expand = (item, i) => {
  // On vérifie la largeur de l'écran
  const screenWidth = window.innerWidth;
  const isMobile = screenWidth < 992;

  // Si l'écran est mobile, on affiche toujours le contenu de la carte
  if (isMobile) {
    const content = item.querySelector('.card-item-content');
    content.style.display = 'flex';

    // On retourne pour éviter l'exécution du reste du code
    return;
  }

  // Si l'écran est large, on gère l'expansion de la carte
  items.forEach((it, ind) => {
    if (i === ind) return;
    it.clicked = false;
    const content = it.querySelector('.card-item-content');
    content.style.display = 'none';
  });

  gsap.to(items, {
    width: item.clicked ? '20vw' : '10vw',
    duration: 2,
    ease: 'elastic(1, .6)'
  });
  item.clicked = !item.clicked;
  gsap.to(item, {
    width: item.clicked ? '50vw' : '20vw',
    duration: 2.5,
    ease: 'elastic(1, .3)'
  });
  const content = item.querySelector('.card-item-content');
  content.style.display = item.clicked ? 'flex' : 'none';
};

items.forEach((item, i) => {
  item.clicked = false;

  // Si l'écran est mobile, on affiche toujours le contenu de la carte
  const screenWidth = window.innerWidth;
  const isMobile = screenWidth < 992;
  if (isMobile) {
    const content = item.querySelector('.card-item-content');
    content.style.display = 'flex';
  } else {
    item.addEventListener('click', () => expand(item, i));
  }
});
