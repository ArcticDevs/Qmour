import Vue from 'vue'
import VueRouter from 'vue-router'
import Indian from '../views/Indian.vue'
import Dank from '../views/Dank.vue'
import Funny from '../views/Funny.vue'  

Vue.use(VueRouter)

const routes = [
  {
     path: '*', redirect: '/Indian' 
  },
  {
    path: '/Indian',
    name: 'Indian',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Indian.vue")
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
  },
  {
    path:'/science-memes',
    name:'Science',
    component:() => import(/*webpackChunkName: "science"*/"../views/Science.vue")
  }
]

const router = new VueRouter({
  routes,
 

})

export default router
