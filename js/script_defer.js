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