/**
|--------------------------------------------------------------------------
| Vendor dependencies
|--------------------------------------------------------------------------
|
| Here are setup the global front-end dependencies, currently :
|   - Axios
|
| /!\ When possible, you should use ES6 Module import syntax, ex :
| import Vue from 'vue';
*/

/**
 * Loading Axios, a powerful HTTP fetching library (replaces AJAX)
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found => Backend requests may failed');
}