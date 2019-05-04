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
        </base-header>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <projects-table title="Listagem"></projects-table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
  import ProjectsTable from './Tables/ProjectsTable'
  export default {
    name: 'users',
    components: {
      ProjectsTable
    }
  };
</script>
<style></style>