<template>
    <div class="container h-full min-h-screen bg-gray-900  border border-gray-700 rounded-2xl">
        <Header />
        <router-view></router-view>
        <Footer />
        <notifications group="auth"/>
    </div>
</template>

<script>
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'

export default {
    name : 'App',
    components: {
        Header,
        Footer
    }
}
</script>