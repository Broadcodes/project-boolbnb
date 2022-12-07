require('./bootstrap');
window.Vue = require('vue');

import homeGuest from './view/homeGuest';
const app = new Vue({
    el: '#homeGuest',
    render: (h) => h(homeGuest),
});
