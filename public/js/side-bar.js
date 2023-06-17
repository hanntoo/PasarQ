const toggleBtn = document.getElementById('toggle-btn');
const nav = document.querySelector('nav');
const section = document.querySelector('section');
const sidebarKey = 'sidebarStatus';

toggleBtn.onclick = function() {
  nav.classList.toggle('hide');
  section.classList.toggle('expand');
};