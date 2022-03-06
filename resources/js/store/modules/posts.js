import axios from "axios";

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

}

const mutations = {
    setPosts: (state,posts) => state.posts = posts,
    setPost: (state,post) => state.post = {...post}
}

export default {
    state,
    getters,
    actions,
    mutations
}