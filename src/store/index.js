import Vue from 'vue'
import Vuex from 'vuex'
import TrendingPosts from '../data/TrendingPosts'
import Y from '../data/Y'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    TrendingPosts,
    posts: [...TrendingPosts],
    Y,
    details: [...Y]
  },
  mutations: {
  },
  actions: {
  },
  modules: {
  }
})
