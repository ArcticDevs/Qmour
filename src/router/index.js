import Vue from 'vue'
import VueRouter from 'vue-router'
import Trending from '../views/Trending.vue'
import Dank from '../views/Dank.vue'
import Funny from '../views/Funny.vue'

Vue.use(VueRouter)

const routes = [
  {
     path: '*', redirect: '/trending' 
  },
  {
    path: '/trending',
    name: 'Trending',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Trending.vue")
  },
  {
    path: '/dank-memes',
    name: 'Dank',
    component: () => import(/*webpackChunkName: "dank"*/ "../views/Dank.vue")
  },
  {
    path: '/funny-memes',
    name: 'Funny',
    component: () => import(/*webpackChunkName: "funny"*/ "../views/Funny.vue")
  }
]

const router = new VueRouter({
  routes,
  mode: 'history'

})

export default router
