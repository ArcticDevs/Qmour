import 'bootstrap-css-only/css/bootstrap.min.css'
import 'mdbvue/lib/css/mdb.min.css'
import Vue from 'vue'
import App from './App.vue'
import router from './router'
// import VueAnalytics from 'vue-analytics'
import VueGtag from "vue-gtag";

Vue.use(VueGtag, {
  config: { id: "UA-179395921-1" },
  params: {
    send_page_view: true
  }
});

import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'

const store = new Vuex.Store(
  storeData
)
global.jQuery = require('jquery');
var $ = global.jQuery;
window.$ = $;
import { DropDownButtonPlugin } from '@syncfusion/ej2-vue-splitbuttons'
import { enableRipple } from '@syncfusion/ej2-base'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
Vue.component('font-awesome-icon', FontAwesomeIcon)

import VueDarkMode from "@growthbunker/vuedarkmode";


// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

enableRipple(true)
Vue.use(DropDownButtonPlugin)

Vue.config.productionTip = false

import DropdownMenu from 'v-dropdown-menu'
import 'v-dropdown-menu/dist/v-dropdown-menu.css' // Base style, required.

Vue.use(DropdownMenu)  

Vue.use(VueDarkMode, {
  // Specify the theme to use: dark or light (dark by default).
  theme: "dark",

  // Specify the components to declare globally in your project
  // When undefined, null or given an empty array, all components will be imported
  components: [
    // Base components
    "alert", "avatar", "badge", "button", "divider", "heading", "icon",  "progress-bar",  "spinner",

    // Field components
    "checkbox", "file", "image-uploader", "input", "input-numeric", "label", "message", "radios", "select", "tabs", "textarea", "toggle"
  ]
});

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')

