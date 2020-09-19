import Vue from 'vue'
import Vuex from 'vuex'

import post from './post'
import store from './store'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        post, auth
    }
})

export default store