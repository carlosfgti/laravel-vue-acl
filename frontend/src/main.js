import Vue from 'vue'
import './plugins/vuetify'
import App from './layouts/App'

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')
