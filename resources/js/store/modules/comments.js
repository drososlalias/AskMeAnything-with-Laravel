import axios from "axios";
import router from "../../router/router";

const state = {
    comments : [],
}

const getters = {
    allComments: state => state.comments,
}

const actions = {
    async fetchComments({commit} , payload){
        try {
            const {data} = await axios.get(`/api/comments/${payload.postId}`)
                commit('setComments' , data)
      
        } catch (error) {
            console.log(error);            
        }
    },
    async createComment({commit} , payload){
        try {
            const {data} = await axios.post(`/api/posts/${payload.postId}/comment`,{
                text: payload.text
            })
            commit('addComment',payload.postId);
        } catch (err) {
            console.log(err);
        }
    }
}

const mutations = {
    setComments: (state,comments) => state.comments = comments,
    addComment(state,postId){
        router.go(`/posts/${postId}`)
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}