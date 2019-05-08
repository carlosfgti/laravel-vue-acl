<template>
  <div class="card shadow"
       :class="type === 'dark' ? 'bg-default': ''">
    <div class="card-header border-0"
         :class="type === 'dark' ? 'bg-transparent': ''">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0" :class="type === 'dark' ? 'text-white': ''">
            {{title}}
          </h3>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <base-table class="table align-items-center table-flush"
                  :class="type === 'dark' ? 'table-dark': ''"
                  :thead-classes="type === 'dark' ? 'thead-dark': 'thead-light'"
                  tbody-classes="list"
                  :data="users.data">
        <template slot="columns">
          <th>#id</th>
          <th>Name</th>
          <th>E-mail</th>
          <th></th>
        </template>

        <template slot-scope="{row}">
          <th scope="row">{{ row.id }}</th>
          <td>{{ row.name }}</td>
          <td>{{ row.email }}</td>
          <td class="text-right">
            <base-dropdown class="dropdown"
                           position="right">
              <a slot="title" class="btn btn-sm btn-icon-only text-light" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
              </a>

              <template>
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item" href="#">Deletar</a>
              </template>
            </base-dropdown>
          </td>

        </template>

      </base-table>
    </div>

    <div class="card-footer d-flex justify-content-end"
         :class="type === 'dark' ? 'bg-transparent': ''">
      <base-pagination
        :total="meta.total"
        :per-page="meta.per_page"
        :value="meta.current_page"
        v-model="pagination.default">
      </base-pagination>
    </div>

  </div>
</template>
<script>
  export default {
    name: 'users-table',
    props: {
      type: {
        type: String
      },
      title: String,
      users: {
        type: Object,
        required: true,
      }
    },
    data () {
      return {
        pagination: {
          default: 1
        }
      }
    },
    computed: {
      meta () {
        return this.users.meta
      }
    },
    watch: {
      pagination: {
        handler (pagination) {
          this.$emit('changePage', pagination.default)
        },
        deep: true
      }
    },
  }
</script>

<style>
</style>
