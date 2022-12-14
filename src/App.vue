<template>
  <div id="app">
    <Pokedex />
  </div>
</template>

<script>
import Pokedex from "./components/Pokedex.vue";

export default {
  name: "app",
  components: {
    Pokedex,
  },
};
</script>

<style>
@import url("https://use.fontawesome.com/releases/v5.8.2/css/all.css");

body {
  margin: 0;
  padding: 0;
}
#app {
  background: radial-gradient(#ffbf0b, #e20000);
}
</style>
