import Vue from 'vue'
import VueRouter from 'vue-router'
import Trending from '../views/Trending.vue'
import Dank from '../views/Dank.vue'
import Funny from '../views/Funny.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Trending',
    component: Trending
  },
  {
    path: '/dank-memes',
    name: 'Dank',
    component: Dank
  },
  {
    path: '/funny-memes',
    name: 'Funny',
    component: Funny
  }
]

const router = new VueRouter({
  routes
})

export default router
