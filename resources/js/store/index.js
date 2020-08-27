import Vue from 'vue'
import Vuex from 'vuex'

import post from './post'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        post,
    }
})

export default store