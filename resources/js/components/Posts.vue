<template>
<div>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4" :key="post.id" v-for="post in allPosts">
            <PostCard :post="post"/>
        </div>
    </div>
</div>
</template>

<script>
import PostCard from './PostCard.vue'
import {mapGetters , mapActions} from 'vuex'

export default {
    name: 'Posts',
    components:{
        PostCard
    },
    computed: {...mapGetters(['allPosts'])},
    methods: {
        ...mapActions(['fetchPosts'])
    },
    created() {
        this.fetchPosts()
    }
}
</script>
