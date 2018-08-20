import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

/**
 * Our application routes
 * Front-end pages routes are managed here, instead of in Laravel
 */
const routes = [
    { path: '/', component: require('./views/Home.vue') }
];

export default new Router({
    mode: 'history',
    routes
});

