/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

require('./bootstrap');
//import 'remixicon/fonts/remixicon.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Swal = require('sweetalert2/dist/sweetalert2.all');

queueMicrotask(() => {
    Alpine.start()
})
