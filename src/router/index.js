import Vue from 'vue'
import VueRouter from 'vue-router'


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
    path: '/dark-memes',
    name: 'Dark',
    component: () => import(/*webpackChunkName: "dank"*/ "../views/Dark.vue")
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
