import Vue from 'vue'
import Vuex from 'vuex'

import post from './post'
import auth from './auth'
import test from './test'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        post, auth, test
    }
})

export default store