/**
 * Loading global dependencies and
 */

require('./vendor');


/**
 * Here is setup our Vue application
 * Don't know Vue ? Look for https://vuejs.org/v2/guide/
 */

import Vue from 'vue';

import App from './App.vue';
import router from './router';
import store from './store';

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
