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
            axios.get('/departments/getDepartments').then((response) => {
                context.commit('set_departments', response.data)
            });
        },
        saveDepartment: (context, departmentData) => {
            departmentData.post('/departments/saveDepartment')
                .then(() => {
                    $('#exampleModal').modal('hide')
                    context.dispatch('getDepartments')
                });
        },
        updateDepartment: (context, departmentData) => {
            departmentData.post('/departments/updateDepartment/' + departmentData.id)
                .then(() => {
                    $('#exampleModal').modal('hide')
                    context.dispatch('getDepartments')
                });
        },
        deleteDepartment: (context, departmentData) => {
            if (confirm('Are you sure you want to delete department!')) {
                axios.post('/departments/deleteDepartment/' + departmentData.id)
                    .then(() => {
                        $('#exampleModal').modal('hide')
                        context.dispatch('getDepartments')
                    });
            }
        }
    }
}
