import 'bootstrap-css-only/css/bootstrap.min.css'
import 'mdbvue/lib/css/mdb.min.css'
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueAnalytics from 'vue-analytics'

Vue.use(VueAnalytics, {
  id: 'UA-179395921-1'
})
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'

const store = new Vuex.Store(
  storeData
)

import { DropDownButtonPlugin } from '@syncfusion/ej2-vue-splitbuttons'
import { enableRipple } from '@syncfusion/ej2-base'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


import { library } from '@fortawesome/fontawesome-svg-core'
import { faEllipsisV, faHeart, faShare, faDownload } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import vuetify from './plugins/vuetify';

import Vuetify from 'vuetify/lib'

import VueDarkMode from "@growthbunker/vuedarkmode";

library.add(faEllipsisV, faHeart, faShare, faDownload)

Vue.component('font-awesome-icon', FontAwesomeIcon)
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

enableRipple(true)
Vue.use(DropDownButtonPlugin)

Vue.config.productionTip = false

Vue.use(Vuetify)

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
  vuetify,
  render: h => h(App)
}).$mount('#app')

export default new Vuetify({
  theme: {
    dark: true,
  },
})