<template>
    <div>
        <div class="container border-gray-4">
            <Banner />
            <section>
                <div class="grid grid-cols-2 grid-rows-2  gap-y-4 justify-items-center">
                    <router-link to="/keywords"><GridCard :img="img" title="Questions per Keyword" description="test description"/></router-link>
                    <router-link to="/stats"><GridCard :img="img" title="Questions per Day" description="test description"/></router-link>
                    <router-link to="/addpost"><GridCard :img="img" title="Create a Post" description="test description"/></router-link>
                    <router-link to="/posts"><GridCard :img="img" title="Browse Posts" description="test description"/></router-link>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import GridCard from './GridCard.vue'
import Banner from './Banner.vue'

export default {
    name: 'Home',
    components:{
        GridCard,
        Banner
    },
    data() {
        return {
            img: "https://picsum.photos/id/237/300/200"
        }
    }
}
</script>

<style>

</style>