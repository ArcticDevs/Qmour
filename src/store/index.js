import Vue from 'vue'
import Vuex from 'vuex'
import TrendingPosts from '../data/TrendingPosts'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    TrendingPosts,
    posts: [...TrendingPosts]
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
