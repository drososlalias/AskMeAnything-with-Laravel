<template>
 <div class="w-full md:w-1/2 xl:w-1/3 p-6">
    <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
    <div class="flex flex-row items-center">
        <div class="flex-shrink pr-4">
            <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
            </div>
            <div class="flex-1 text-right md:text-center">
                <h2 class="font-bold uppercase text-gray-600">{{title}}</h2>
                <p class="font-bold text-3xl">{{value}}<span><i class="fas fa-caret-up"></i></span></p>
            </div>
        </div>
    </div>
 </div>
</template>

<script>
export default {
    name: 'MetricsCard',
    props:{
        title: String,
        value: String | Number
    }
}
</script>

<style>

</style>