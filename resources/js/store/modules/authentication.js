import router from '../../router/router'
import Vue from 'vue'
import axios from 'axios'

const state = {
    user: localStorage.getItem('user')
}

const getters = {
    getUser: state => state.user,
}

const actions = {
    async login({commit} , payload) {
        try {
            const {data} = await axios.post("/login" ,payload)
            data.api_status && commit('loginSuccess',data)
        } catch (err) {
            commit('loginFail')            
        }
    },
    async register({commit} , payload){
        try {
            const {data} = await axios.post('/register' , payload)
            data.api_status && commit('registerSuccess',data)
        } catch (err) {
            commit('registerFail')
        }
    },
    async checkSessionStatus({commit}){
        try {
            const {data} = await axios.get('/sessionStatus')
            if(data){
                return true
            }
            return false
        } catch (err) {
            return false
        }
    },
    async logoutUser({commit}){
        try {
            await axios.post('/logout')
            commit('logoutUser')
        } catch (err) {}
    }
}

const mutations = {
    loginSuccess(state,user){
        state.user = JSON.stringify(user)
        localStorage.setItem('user',JSON.stringify(user))
        router.go('/home')
        // setTimeout(function () {
        //     Vue.notify({
        //       group: "auth",
        //       type: "success",
        //       text: "User Logged In Success!",
        //     });
        //   }, 1500);
    },
    loginFail(){
        Vue.notify({
            group: 'auth',
            type: 'error',
            text: 'User login failure'
        })
    },
    registerSuccess(){
        router.push('login')
        setTimeout(function () {
            Vue.notify({
              group: "auth",
              type: "success",
              text: "Successful Registration. Please Login!",
            });
          }, 1500);
    },
    registerFail(){
            Vue.notify({
              group: "auth",
              type: "error",
              text: "User register failure!",
            });       
    },
    logoutUser(state) {
        state.user = null;
        localStorage.removeItem("user");
      },
    }

export default {
    state,
    getters,
    actions,
    mutations
}