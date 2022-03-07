const { default: axios } = require("axios")

const state = {
    total_posts: '',
    total_comments: '',
    todays_posts: '',
    todays_comments: ''
}

const getters = {
    totalPosts: state => state.total_posts, 
    totalComments: state => state.todays_comments, 
    todaysPosts: state => state.todays_posts,
    todaysComments: state => state.todays_comments
}

const actions = {
    async getDashboardStats({commit}) {
        try {
            const {data} = await axios.get('/user-statistics')
            commit('getDashboardStats' , data)
        } catch (err) {
            console.log(err)
        }
    }
}

const mutations = {
    getDashboardStats(state,data) {
        state.total_posts = data.total_posts
        state.total_comments = data.total_comments
        state.todays_posts = data.total_posts_today
        state.todays_comments = data.total_comments_today
    }
}

export default {
    state,
    getters,
    actions,
    mutations,
}