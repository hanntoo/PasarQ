const toggleBtn = document.getElementById('toggle-btn');
const nav = document.querySelector('nav');
const section = document.querySelector('section');

toggleBtn.onclick = function() {
  nav.classList.toggle('hide');
  section.classList.toggle('expand');
};

const body = document.querySelector('body');
const bgModeBtn = document.getElementById('bgModeBtn');
const bgModeIcon = document.getElementById('bgModeIcon');
const sectionHeader = document.querySelector('section h1');

bgModeBtn.onclick = function(){
  body.classList.toggle("dark-mode");
  bgModeIcon.classList.toggle("fa-sun-o");
  bgModeIcon.classList.toggle("fa-moon-o");
  sectionHeader.classList.toggle("dark-mode");
};