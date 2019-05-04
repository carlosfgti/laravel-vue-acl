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
                        :table-data="tableData"></projects-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
  import ProjectsTable from './Tables/ProjectsTable'
  export default {
    name: 'users',
    data() {
      return {
        tableData: [
          {
            img: 'img/theme/bootstrap.jpg',
            title: 'Argon Design System',
            budget: '$2500 USD',
            status: 'pending',
            statusType: 'warning',
            completion: 60
          },
          {
            img: 'img/theme/angular.jpg',
            title: 'Angular Now UI Kit PRO',
            budget: '$1800 USD',
            status: 'completed',
            statusType: 'success',
            completion: 100
          },
          {
            img: 'img/theme/sketch.jpg',
            title: 'Black Dashboard',
            budget: '$3150 USD',
            status: 'delayed',
            statusType: 'danger',
            completion: 72
          },
          {
            img: 'img/theme/react.jpg',
            title: 'React Material Dashboard',
            budget: '$4400 USD',
            status: 'on schedule',
            statusType: 'info',
            completion: 90
          },
          {
            img: 'img/theme/vue.jpg',
            title: 'Vue Paper UI Kit PRO',
            budget: '$2200 USD',
            status: 'completed',
            statusType: 'success',
            completion: 100
          }
        ]
      }
    },
    components: {
      ProjectsTable
    }
  };
</script>
<style></style>