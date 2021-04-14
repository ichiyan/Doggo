require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
window.Vue = Vue;

import CardPost from './components/CardPost.vue'
import SearchPost from './components/SearchPost.vue'
import FilterPost from './components/FilterPost.vue'
Vue.component('card-post', CardPost);
Vue.component('search-post', SearchPost);
Vue.component('filter-post', FilterPost);

const app = new Vue({
    el: '#App',
});

