
require('./bootstrap');

window.Vue = require('vue');

import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);
import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/en';
Vue.use(ElementUI, { locale });
import 'element-ui/lib/theme-chalk/index.css'


Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
