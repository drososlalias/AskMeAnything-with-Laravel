<template>
<div class="main-content flex-1 rounded-2xl bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <div class="bg-gray-800 pt-3 rounded-2xl">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2 text-center">Profile Info</h1>
        </div>
    </div>
    <div class="flex flex-wrap my-5 justify-evenly">
        <MetricsCard title="Registered at" :value="registered_at"/> 
        <MetricsCard title="Total Posts" :value="totalPosts"/> 
        <MetricsCard title="Total Comments" :value="totalComments"/> 
        <MetricsCard title="Today's Posts" :value="todaysPosts"/> 
        <MetricsCard title="Today's Comments" :value="todaysComments"/> 
    </div>
</div>
</template>

<script>
import {mapGetters , mapActions} from 'vuex'
import MetricsCard from './MetricsCard.vue'

export default {
    name: 'Dashboard',
    components:{
        MetricsCard
    },
    data() {
        return {
            loaded: false,
            registered_at: '',
            total_posts: '',
            total_comments: '',
            todays_posts: '',
            todays_comments: ''
        }
    },
    computed: {...mapGetters(['getUser','totalPosts','todaysPosts','totalComments','todaysComments'])},
    created() {
        this.registered_at = JSON.parse(this.getUser).registered_at.split('T')[0]
        this.getDashboardStats()
    },
    methods:{
        ...mapActions(['getDashboardStats'])
    }
}
</script>

<style>

</style>