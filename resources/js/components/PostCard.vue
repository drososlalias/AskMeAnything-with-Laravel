<template>
<div>
  <div class="bg-sky-100 border-4 border-white rounded-xl mt-6">
      <div class="flex h-auto min-h-44 w-full border-4 border-gray-900 rounded-md">
          <div class="max-w-xs  w-full flex flex-col justify-evenly pl-4 border-r-4 border-dotted border-gray-400">
            <img class="w-24 self-center rounded-full" :src="link" alt="User Icon">
            <strong class="self-center">{{post.user.name}}</strong>
          </div>
          <div class="p-8 flex flex-col justify-between">
              <h3 class="font-bold text-xl">{{post.title}}</h3>
              <p>{{post.text}}</p>
              <div>
                <small>Published at: {{post.published_at | moment("from","now")}}</small>
              </div>
              <button @click="$router.push({name: 'post' , params: {postId: post.id}})" v-if="$router.currentRoute.path === '/posts'" class="mt-5 self-start rounded-lg bg-cyan-500 py-1 text-white px-2">Discussion</button>
              <button @click="$router.push({name: 'posts'})" v-else class="mt-5 self-start rounded-lg bg-cyan-500 py-1 text-white px-2">Go Back</button>
          </div>
      </div>
  </div>
    <div v-if="$router.currentRoute.path !== '/posts'">
        <div class="comment mt-8 mb-4">
            <textarea class="bg-inherit pt-1 text-white" placeholder="Leave a comment..." name="comment" id="comment" cols="62" rows="4"></textarea>
        </div>
        <div class="text-white text-center mt-6" v-if="!post.comments">No comments yet. Start a discussion!!</div>
        <div v-else v-for="comment in post.comments" :key="comment.id">
            <CommentCard :comment="comment" />
        </div>
    </div>
</div>
</template>

<script>
import CommentCard from './CommentCard.vue'

export default {
    name: 'PostCard',
    components: {
        CommentCard
    },
    props: {
       post: Object
    },
    data() {
        return{
            user: "",
            link: "",
        }
    },
    created() {
        this.user = this.post.user.name
        this.link = "https://eu.ui-avatars.com/api/?name=" + this.user.split(" ")[0] + '+' + this.user.split(" ")[1]
    }
}
</script>