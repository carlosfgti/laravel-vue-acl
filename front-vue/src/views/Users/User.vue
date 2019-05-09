<template>
  <div>
    <base-header type="gradient-primary" class="pb-6 pb-8 pt-5 pt-md-8">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-lg-6">
          <stats-card
            title="Total"
            type="gradient-red"
            :sub-title="totalUsers"
            class="mb-4 mb-xl-0"
          ></stats-card>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 mb-xl-2">
          <base-button type="default" @click="openModal = !openModal">Cadastrar</base-button>

          <modal :show.sync="openModal">
            <template slot="header">
              <h5 class="modal-title" id="exampleModalLabel">{{ titleModal }}</h5>
            </template>
            <users-form @doneAction="openModal = false"></users-form>
          </modal>
        </div>

        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <base-input
              placeholder="Pesquisar"
              class="input-group-alternative"
              alternative
              addon-right-icon="fas fa-search"
              v-model="search"
              v-on:blur="filter"
            ></base-input>
          </div>
        </form>
      </div>
    </base-header>

    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <vue-loading :active.sync="loading" :can-cancel="false" :is-full-page="false"></vue-loading>
          <users-table title="Listagem" :users="users" @changePage="loadUsers"></users-table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import UsersTable from "./_partials/UsersTable.vue";
import UsersForm from "./_partials/UsersForm.vue";

export default {
  name: "users",
  created() {
    this.loadUsers();
  },
  computed: {
    users() {
      return this.$store.state.users.items;
    }
  },
  data() {
    return {
      loading: false,
      totalUsers: "0",
      search: "",
      openModal: false,
      titleModal: 'Cadastrar Novo Usuário'
    };
  },

  methods: {
    loadUsers(page = 1) {
      this.loading = true;

      this.$store
        .dispatch("loadUsers", { page, search: this.search })
        .finally(() => (this.loading = false));
    },
    filter() {
      if (this.search.length >= 3) this.loadUsers(1);
    }
  },
  components: {
    UsersTable,
    UsersForm
  },
  watch: {
    users(user) {
      this.totalUsers = user.meta.total.toString() || 0;
    }
  }
};
</script>


<style></style>