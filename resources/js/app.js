/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

//require('./bootstrap');
import 'remixicon/fonts/remixicon.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

queueMicrotask(() => {
    Alpine.start()
})
