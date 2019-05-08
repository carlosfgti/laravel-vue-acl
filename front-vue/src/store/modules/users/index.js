import axios from 'axios'

export default {
    state: {
        items: {
            data: [],
            meta: {
                total: 0,
                per_page: 15,
                current_page: 1
            }
        }
    },

    actions: {

        loadUsers (context, params) {
            return axios
                        .get(
                            'http://tests-laravel-acl.local/api/users',
                            { params }
                        )
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