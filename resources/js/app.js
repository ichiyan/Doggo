require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
window.Vue = Vue;

import CardPost from './components/CardPost.vue'
import SearchPost from './components/SearchPost.vue'
import FilterPost from './components/FilterPost.vue'
import BreadCrumb from './components/BreadCrumb.vue'
import Advertisement from './components/Advertisement.vue'
import Advertiser from './components/Advertiser.vue'
Vue.component('card-post', CardPost);
Vue.component('search-post', SearchPost);
Vue.component('filter-post', FilterPost);
Vue.component('bread-crumb', BreadCrumb);
Vue.component('advertisement', Advertisement);
Vue.component('advertiser', Advertiser);

const app = new Vue({
    el: '#App',
});

