import Vue from 'vue';
import Router from './router';
import Store from './store';
require('../../assets/css/app.css');

new Vue({
    el: "#app",
    router: Router,
    store: Store
});