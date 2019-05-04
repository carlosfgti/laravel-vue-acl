import axios from 'axios'

export default {
    state: {
        items: {
            data: []
        }
    },

    actions: {

        loadUsers (context) {
            return axios.get('http://tests-laravel-acl.local/api/users')
                        .then(response => context.commit('LOAD_USERS', response.data))
        }

    },

    mutations: {

        LOAD_USERS (state, users) {
            state.items = users
        }

    },

    getters: {},
}