<template>
   <footer class="flex flex-col gap-3 border-t-2 shadow-2xl  py-3 mt-12 rounded-2xl">
            <div class="flex justify-center">
                <ul class="flex justify-between gap-5">
                    <li class="text-white text-lg">
                        <router-link to="about">About</router-link>
                    </li>
                    <li class="text-white text-lg">
                        <router-link to="contact-us">Contact us</router-link>
                    </li>
                    <li class="text-white text-lg">
                        <a href="#">Documentation</a>
                    </li>
                    <li class="text-white text-lg">
                        <a href="#">Github</a>
                    </li>
                    <li class="text-white text-lg">
                        <router-link to="course-materials">Course Materials</router-link>
                    </li>
                </ul>
            </div>
            <p class="self-center text-gray-300">#AskMeAnything Copyright@2022</p>
        </footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>
