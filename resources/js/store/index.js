import Vue from 'vue'
import Vuex from 'vuex'

import post from './post'
import auth from './auth'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        post, auth
    }
})

export default store