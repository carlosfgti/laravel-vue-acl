<template>
  <div>
    <v-navigation-drawer v-model="drawer" fixed app>
      <v-list dense>
        <v-list-tile>
          <v-list-tile-action>
            <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <router-link :to="{name: 'admin'}">Dashboard</router-link>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile>
          <v-list-tile-action>
            <v-icon>account_box</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <router-link :to="{name: 'admin.users'}">Usuários</router-link>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile>
          <v-list-tile-action>
            <v-icon>contacts</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <router-link :to="{name: 'admin.profiles'}">Perfis</router-link>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile>
          <v-list-tile-action>
            <v-icon>person_add_disabled</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <router-link :to="{name: 'admin.permissions'}">Permissões</router-link>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Admin Vue</v-toolbar-title>
    </v-toolbar>
  </div>
</template>

<script>
export default {
    data () {
        return {
            drawer: null,
        }
    }
}
</script>
