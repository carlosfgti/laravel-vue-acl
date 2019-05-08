<template>
    <div>
        <base-header type="gradient-primary" class="pb-6 pb-8 pt-5 pt-md-8">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total"
                                type="gradient-red"
                                :sub-title="totalUsers"
                                class="mb-4 mb-xl-0">
                    </stats-card>
                </div>
            </div>
            <div class="row">
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <base-input placeholder="Pesquisar"
                                    class="input-group-alternative"
                                    alternative=""
                                    addon-right-icon="fas fa-search"
                                    v-model="search"
                                    v-on:blur="filter">
                        </base-input>
                    </div>
                </form>
            </div>
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                  <vue-loading
                    :active.sync="loading"
                    :can-cancel="false"
                    :is-full-page="false"></vue-loading>
                    <users-table
                        title="Listagem"
                        :users="users"
                        @changePage="loadUsers"></users-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
  import UsersTable from './Tables/UsersTable'

  export default {
    name: 'users',
    created() {
      this.loadUsers()
    },
    computed: {
      users () {
        return this.$store.state.users.items
      }
    },
    data() {
      return {
        loading: false,
        totalUsers: "0",
        page: 1,
        search: ''
      }
    },

    methods: {
      loadUsers (page = 1) {
        this.loading = true

        this.$store.dispatch(
          'loadUsers',
          { page, search: this.search }
        )
        .finally(() => this.loading = false)
      },
      filter () {
        this.loadUsers(1)
      }
    },
    components: {
      UsersTable
    },
    watch: {
      users (user) {
        this.totalUsers = user.meta.total || 0
      },
    },
  };
</script>
<style></style>