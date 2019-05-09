import axios from 'axios'

const resource = 'http://tests-laravel-acl.local/api/users'

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
            return axios.get(resource, { params })
                        .then(response => context.commit('LOAD_USERS', response.data))
        },

        storeUser (context, data) {            
            return axios.post(resource, data)
                    // .then(response => context.commit('ADD_NEW_USER', response.data))
        }

    },

    mutations: {

        LOAD_USERS (state, users) {
            state.items = users
        },

        ADD_NEW_USER (state, user) {
            state.items.data.push(user)
        }

    },

    getters: {},
}