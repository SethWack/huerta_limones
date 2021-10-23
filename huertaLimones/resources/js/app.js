require('./bootstrap');
require('./materialize');

M.AutoInit();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
