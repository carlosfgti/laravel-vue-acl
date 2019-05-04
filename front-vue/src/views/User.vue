<template>
    <div>
        <base-header type="gradient-primary" class="pb-6 pb-8 pt-5 pt-md-8">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <stats-card title="Total"
                                type="gradient-red"
                                sub-title="50"
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
                                    addon-right-icon="fas fa-search">
                        </base-input>
                    </div>
                </form>
            </div>
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <projects-table
                        title="Listagem"
                        :table-data="users"></projects-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
  import ProjectsTable from './Tables/ProjectsTable'
  export default {
    name: 'users',
    created() {
      this.loadUsers()
    },
    computed: {
      users () {
        return this.$store.state.users.items.data
      }
    },
    data() {
      return {
        tableData: []
      }
    },
    methods: {
      loadUsers () {
        this.$store.dispatch('loadUsers')
      }
    },
    components: {
      ProjectsTable
    }
  };
</script>
<style></style>