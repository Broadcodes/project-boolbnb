require('./bootstrap');
window.Vue = require('vue');

import homeGuest from './view/homeGuest';
const app = new Vue({
    el: '#homeGuest',
    render: (h) => h(homeGuest),
});



import homeUra from './view/homeUra'
const app2 = new Vue({
    el: '#homeUra',
    render: (h) => h(homeUra),
});
