<template>
  <header class="flex justify-between items-center  border-b-2 border-dashed border-gray-500  h-14 px-8 mt-4 text-slate-800">
            <div class="text-xl font-bold text-slate-200">
                <router-link to="/home">AskMeAnything</router-link>
            </div>
            <div v-if="getUser">
                <router-link class="mr-2 text-white" to="/dashboard">Dashboard</router-link>
                <button @click="logout" class="bg-gray-600 px-2 py-1 rounded-2xl text-white">Logout</button>
            </div>
            <div v-else>
                <router-link class="mr-2 text-white" to="/login">Login</router-link>
                <router-link class="mt-4 bg-gray-600 p-2 rounded-2xl text-white" to="/register">Sign up</router-link>
            </div>
        </header>
</template>

<script>
import {mapGetters,mapActions} from 'vuex'

export default {
    name: "Header",
    computed: {...mapGetters(['getUser'])},
    methods:{
        ...mapActions(['logoutUser']),
        logout(){
            this.logoutUser()
            this.$router.go('/home')
        }
    }
}
</script>
