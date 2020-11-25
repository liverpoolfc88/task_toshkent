import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
  // {
  //   path: '/anfild',
  //   name: 'Anfild',
  //   component: () => import( '@/views/anfild.vue')
  // },
  {
    path: '/signin',
    name: 'Login',
    component: () => import( '@/views/signin.vue')
  },
  // {
  //   path: '/excel',
  //   name: 'Excel',
  //   component: () => import( '@/views/excel.vue')
  // },
  {
    path: '/signup',
    name: 'Regstratsiya',
    component: () => import( '@/views/signup.vue')
  },
    {
      path: '/logout',
      name: 'Logout',
      // component: () => import( '@/views/signup.vue')
    },
  {
    path: '/profile',
    name: 'Profil',
    component: () => import( '@/views/profile.vue')
  },
  // {
  //   path: '/fans',
  //   name: 'Fanat',
  //   component: () => import( '@/views/fans.vue')
  // },
  // {
  //   path: '/coach',
  //   name: 'Murabbiy',
  //   component: () => import( '@/views/coach.vue')
  // },
  // {
  //   path: '/players',
  //   name: 'O\'yinchilar',
  //   component: () => import( '@/views/players.vue')
  // },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
