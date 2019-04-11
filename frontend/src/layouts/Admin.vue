<template>
  <v-app id="inspire">
    
    <header-admin/>

    <v-content>
      <v-container fluid fill-height>
        <v-layout>
          
          <router-view></router-view>

        </v-layout>
      </v-container>
    </v-content>
    
    <footer-admin/>

  </v-app>
</template>

<script>
import HeaderAdmin from '@/layouts/_partials/header'
import FooterAdmin from '@/layouts/_partials/footer'

export default {
  components: {
    HeaderAdmin,
    FooterAdmin,
  }
}
</script>