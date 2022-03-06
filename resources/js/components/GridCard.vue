<template>
  <div>
      <div class="flex w-100 h-40 bg-gray-300 rounded-xl">
          <img class="rounded-md" :src="img" :alt="img">
          <div class="p-4">
              <h3 class="mb-2 font-bold">{{title}}</h3>
              <p>{{description}}</p>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'GridCard',
    props:{
        img: String,
        title: String,
        description: String
    }
}
</script>
