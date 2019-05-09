<template>
  <div>
    <form role="form" @submit.prevent="sendForm">
      <base-input
        alternative
        class="mb-3"
        placeholder="Nome"
        addon-left-icon="ni ni-circle-08"
        v-model="formData.name"
      ></base-input>
      <base-input
        alternative
        class="mb-3"
        placeholder="E-mail"
        addon-left-icon="ni ni-email-83"
        v-model="formData.email"
      ></base-input>
      <base-input
        alternative
        type="password"
        placeholder="Senha"
        addon-left-icon="ni ni-lock-circle-open"
        v-model="formData.password"
      ></base-input>
      <!-- <base-button type="secondary" @click="openModal = false">Cancelar</base-button> -->
      <base-button
        type="primary"
        @click.prevent="sendForm">
        Enviar
      </base-button>
    </form>

    <template slot="footer">
      <!-- <base-button type="secondary" @click="openModal = false">Cancelar</base-button> -->
      <base-button type="primary">Enviar</base-button>
    </template>
  </div>
</template>

<script>
export default {
  name: "users-form",
  data() {
    return {
      formData: {
        name: "",
        email: "",
        password: ""
      }
    }
  },
  methods: {
    sendForm () {
      this.$store.dispatch('storeUser', this.formData)
              .then(response => this.$emit('doneAction', response))
    }
  },
};
</script>
