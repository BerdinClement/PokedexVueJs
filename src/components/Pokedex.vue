<template>
  <div class="container">
    <PokemonSearch v-on:searchPokemonEmit="alimRecherche"/>
    <PokemonDetail v-if="this.display==true" :pokemonURL="this.pokemon.url" :ImageURL="this.pokemon.image" v-on:closeDetail="cacher"/>
    <PokemonList v-on:showPokemonDetailEmit="montrer" :recherche="this.recherche"/>
  </div>
</template>

<script>
import PokemonDetail from "../components/PokemonDetail.vue";
import PokemonList from "../components/PokemonList.vue";
import PokemonSearch from "../components/PokemonSearch.vue";

export default {
  components: {
    PokemonDetail,
    PokemonList,
    PokemonSearch,
  },
  methods: {
    cacher: function() {
      this.display=false
    },
    montrer: function (pokemon) {
      this.pokemon=pokemon
      console.log(pokemon)
      this.display=true
    },
    alimRecherche: function (recherche) {
      this.recherche = recherche
      // console.log(this.recherche)
    }
  },
  data: function () {
    return {
      pokemon: [],
      display: false,
      recherche: ""
    };
  },
};
</script>

<style lang="scss" scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 10px;
  width: calc(100% - 20px);
  min-height: calc(100vh - 20px);
  //background: radial-gradient(#ffbf0b, #e20000);

  font-family: "Acme", arial;
  font-size: 1rem;
  font-weight: normal;
}

h1 {
  color: #efefef;
}
</style>