import axios from "axios";
import router from "../../router/router";

const state = {
    posts : [],
    post : {}
}

const getters = {
    allPosts: state => state.posts,
    singlePost: state => state.post
}

const actions = {
    async fetchPosts({commit}){
        const {data} = await axios.get('/api/posts')
        commit('setPosts' , data)
    },
    async fetchPost({commit} , id){
        const {data} = await axios.get(`/api/posts/${id}`)
        commit('setPost' , data)
    },
    async addPost({commit} , payload){
        try {
            const {data} = await axios.post('/api/posts',payload)
            commit('newPostAdded')
        } catch (err) {
            console.log(err);
        }
    }
}

const mutations = {
    setPosts: (state,posts) => state.posts = posts,
    setPost: (state,post) => state.post = {...post},
    newPostAdded() {
        router.push('/posts')
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}