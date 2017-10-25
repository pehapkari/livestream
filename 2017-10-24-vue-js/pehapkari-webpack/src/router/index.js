import Vue from 'vue'
import Router from 'vue-router'
// import PageHome from '@/components/PageHome'
// import PageAdd from '@/components/PageAdd'

const PageHome = () => import(/* webpackChunkName: "home" */ '@/components/PageHome')
const PageAdd = () => import(/* webpackChunkName: "add" */ '@/components/PageAdd')

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: PageHome
    },
    {
      path: '/add',
      name: 'Add',
      component: PageAdd
    }
  ]
})
