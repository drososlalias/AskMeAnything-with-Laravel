import Vue from 'vue'
import Notifications from 'vue-notification'
import router from './router/router'
import store from './store'
import App from './App.vue'

window.axios = require('axios');
window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + (JSON.parse(localStorage.getItem('user')))?.access_token

Vue.use(require('vue-moment'));
Vue.use(Notifications)

router.beforeEach(async (to,from,next) => {
    try {
        const isAuth = await store.dispatch('checkSessionStatus')
        if(to.meta.requiresAuth){
            if(!isAuth || localStorage.getItem('user') === null) {
                store.dispatch('logoutUser')
                next({path:'/login'})
            }
            else next()
        }
        else{
            if(isAuth){
                if(to.name == 'login' || to.name == 'register') next({path:'/home'})
                else next()
            }
            else next()
        }
    } catch (error) {
        console.log(error)
        next()
    }
});


new Vue({
    store,
    router,
    render: (h) => h(App),
    components: { App },
  }).$mount("#app");
  
