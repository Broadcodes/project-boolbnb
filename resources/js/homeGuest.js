require('./bootstrap');
window.Vue = require('vue');
import router from "./router";
import homeGuest from './view/homeGuest';
const app = new Vue({
    el: '#homeGuest',
    render: (h) => h(homeGuest),
    router
});
