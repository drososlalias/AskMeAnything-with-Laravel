<template>
<div class="flex justify-center">
    <div class="w-2/3">
        <PostCard :post="singlePost"/>
    </div>
</div>
</template>

<script>
import PostCard from './PostCard.vue'
import {mapGetters , mapActions} from 'vuex'

export default {
    name: 'Post',
    components:{
        PostCard
    },
    computed : {...mapGetters(['singlePost'])},
    methods: {
        ...mapActions(['fetchPost'])
    },
    created() {
        this.fetchPost(this.$route.params.postId)
    }
}
</script>

<style>

</style>