import Vue from 'vue'

import '@/plugins/vuetify'
import Admin from '@/layouts/Admin'
import router from '@/routes/routes'

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(Admin),
}).$mount('#app')
