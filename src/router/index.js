import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const routes = [
  {
     path: '*', redirect: '/indian-memes' 
  },
  {
    path: '/indian-memes',
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
  },
  {
    path: '/sarcasm',
    name: 'Sarcasm',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Sarcasm.vue")
  },
  {
    path: '/hindi',
    name: 'Hindi',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Hindi.vue")
  },
  {
    path: '/coding',
    name: 'Coding',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Coding.vue")
  },
  {
    path: '/quotes',
    name: 'Quotes',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Quotes.vue")
  },
  {
    path: '/facts',
    name: 'Fact',
    component: () => import(/*webpackChunkName: "trending"*/ "../views/Fact.vue")
  },
]

const router = new VueRouter({
  routes,
 

})

export default router
