<template>
  <div class="list">
    <article v-for="pokemon in pokemonFiltered" v-bind:key="pokemon.name" v-on:click="showPokemonDetail(pokemon)">
      <img :src="pokemon.image">
      <h3>{{pokemon.name}}</h3>
    </article>
  </div>
</template>

<script>
import axios from '../../node_modules/axios'
import link from '../config/config.json'

export default {
  name: "PokemonList",
  beforeMount(){
    axios.get(link['API_URL']+"/pokemon")
      .then((e)=>{
        this.pokemons = e.data.results;

        for (let i = 0; i < this.pokemons.length; i++) {
          const pokemon = this.pokemons[i];
          pokemon.image = link['IMG_URL']+pokemon.name+'.png'
        }

      })
  },
  data: function () {
    return {
      pokemons: [],
    };
  },
  props: ["recherche"],
  methods: {
    showPokemonDetail: function(pokemon){
      this.$emit('showPokemonDetailEmit',pokemon);
    }
  },
  computed: {
    pokemonFiltered: function () {
      return this.pokemons.filter((pokemon) => {
        return pokemon.name.match(this.recherche)
      })
    }
  },
  
};

</script>

<style lang="scss" scoped>
.list {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  grid-gap: 10px;
  width: 100%;
  max-width: 510px;
}
article {
  height: 150px;
  background-color: #efefef;
  text-align: center;
  text-transform: capitalize;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2), 0 10px 10px rgba(0, 0, 0, 0.2);
}
h3 {
  margin: 0;
}
#scroll-trigger {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 150px;
  font-size: 2rem;
  color: #efefef;
}

img {
  width: 96px;
  height: 96px;
}
</style>

