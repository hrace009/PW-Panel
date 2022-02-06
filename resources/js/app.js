//require('./bootstrap');
import 'remixicon/fonts/remixicon.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

queueMicrotask(() => {
    Alpine.start()
})
