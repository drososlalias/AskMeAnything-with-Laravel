import Vue from 'vue'
import Vuex from 'vuex'
import posts from './modules/posts'
import authentication from './modules/authentication'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        posts,
        authentication
    }
})