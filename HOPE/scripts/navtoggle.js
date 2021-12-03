// classList - shows/gets all classes
// contains - checks classList for specific class
// add - add class
// remove - remove class
// toggle - toggles class

const navToggle = document.querySelector('#icon');
const links = document.querySelector('.nav-links');

const currentLocation = location.href;
const menuItem = document.querySelectorAll('a');
const menuLength = menuItem.length;
console.log(currentLocation);
for (let i = 0; i<menuLength; i++){
   console.log(menuItem[i])
   if (menuItem[i].href === currentLocation){
      menuItem[i].className = "active"
   }
};

navToggle.addEventListener('click', function(){
   links.classList.toggle('show');
});

