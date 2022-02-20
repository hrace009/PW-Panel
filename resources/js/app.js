require('./bootstrap');
//import 'remixicon/fonts/remixicon.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Swal = require('sweetalert2/dist/sweetalert2.all');

queueMicrotask(() => {
    Alpine.start()
})
