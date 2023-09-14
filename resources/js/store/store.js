import {createStore} from 'vuex';
import departmentsModule from "./modules/departments";

export const store = createStore({
    strict: true,
    modules: {
        departmentsModule
    },
    state: {
    },
    getters: {

    },
    mutations: {
    },
    actions: {
    }
})
