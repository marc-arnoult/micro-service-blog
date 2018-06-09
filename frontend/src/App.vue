<template>
  <div id="app">
    <img src="./assets/logo.png" class="img">
    <router-link to="/">Home</router-link>
    <router-link to="/articles">Articles</router-link>

    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import VueRouter from 'vue-router';
import Home from './pages/Home';
import Articles from './pages/Articles';

const router = new VueRouter({
  routes: [
    { path: '/', component: Home },
    { path: '/articles', component: Articles }
  ]
})

export default {
  name: 'app',
  router,
  created() {
    fetch('http://localhost:9300/login', {
      headers: new Headers({
        'Authorization': 'Bearer ' + localStorage.getItem('token')
      })
    })
    .then(res => res.json())
    .then(({ token }) => localStorage.setItem('token', token));
  }
};
</script>

<style>
@import '../node_modules/bulma/css/bulma.min.css';

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
