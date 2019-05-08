import axios from 'axios'

export default {
    state: {
        items: {
            data: []
        }
    },

    actions: {

        loadUsers (context, page) {
            const params = { page }

            return axios.get('http://tests-laravel-acl.local/api/users', { params })
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