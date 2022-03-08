<template>
<div>
  <div class="bg-sky-100 border-4 border-white rounded-xl mt-6">
      <div class="flex h-auto min-h-44 w-full border-4 border-gray-900 rounded-md">
          <div class="max-w-xs  w-full flex flex-col justify-evenly pl-4 border-r-4 border-dotted border-gray-400">
              <i class="fa-solid fa-user fa-2xl w-24 self-center rounded-full border-"></i>
            <strong class="self-center" v-if="post.user">{{post.user.name}}</strong>
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
            <textarea class="bg-inherit pt-1 px-2 text-white outline-none" v-model="text" placeholder="Leave a comment..." name="comment" id="comment" cols="62" rows="4"></textarea>
            <button @click='submit' class=" ml-2 text-black text-lg  p-1 rounded-xl bg-white ">Submit</button>
        </div>
        <div v-for="comment in allComments" :key="comment.id">
            <CommentCard :comment="comment" />
        </div>
    </div>
</div>
</template>

<script>
import CommentCard from './CommentCard.vue'
import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'PostCard',
    components: {
        CommentCard
    },
    props: {
       post: Object
    },
    computed:{...mapGetters(['allComments'])},
    data() {
        return{
            loaded: false,
            text: "",
        }
    },
    mounted(){
        if(this.$route.name == 'post'){
            this.fetchComments({postId: this.$route.params.postId})
        }
    }, 
    methods:{
        ...mapActions(['fetchComments']),
        submit(){
            this.$store.dispatch('createComment' ,{
                text: this.text,
                postId: this.post.id
            })
        }
    }
}
</script>