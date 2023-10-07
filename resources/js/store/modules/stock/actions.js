import * as actions from '../../action-types'
import * as mutations from '../../mutation-types'
import axios from 'axios'

export default {
    [actions.SUBMIT_STOCK]({commit}, payload) {
        axios.post('/stocks', payload)
        .then((response) => {
            if (response.data.success) {
                window.location.href = '/stocks'
            }
        })
        .catch((error) => {
            commit(mutations.SET_ERRORS, error.response.data.errors)
        });
    }
}