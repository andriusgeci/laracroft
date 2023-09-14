import axios from "axios";

export default {
    state: {
        departments: {}
    },
    getters: {
        departments(state) {
            return state.departments
        }
    },
    mutations: {
        set_departments: (state, data) => {
            state.departments = data
        }
    },
    actions: {
        getDepartments: (context) => {
            axios.get('/department/getDepartments').then((response) => {
                context.commit('set_departments', response.data)
            });

        },
        saveDepartment: (context, departmentData) => {
            departmentData.post('/department/saveDepartment')
                .then(() => {
                    $('#exampleModal').modal('hide')
                    context.dispatch('getDepartments')
                });
        },
        updateDepartment: (context, departmentData) => {
            departmentData.post('/department/updateDepartment/' + departmentData.id)
                .then(() => {
                    $('#exampleModal').modal('hide')
                    context.dispatch('getDepartments')
                });
        },
        deleteDepartment: (context, departmentData) => {
            if (confirm('Are you sure you want to delete department!')) {
                axios.post('/department/deleteDepartment/' + departmentData.id)
                    .then(() => {
                        $('#exampleModal').modal('hide')
                        context.dispatch('getDepartments')
                    });
            }
        }
    }
}
