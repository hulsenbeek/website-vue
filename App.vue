<template>
  <div id="app">
    <img src="./assets/hulsenbeek.png" height="140" width="700">
    <HelloWorld msg="Hello Zhopa!"/>

  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'

export default {
  name: 'app',
  components: {
    HelloWorld
  }
}


</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #1b6ec0;
  margin-top: 60px;
}
</style>
