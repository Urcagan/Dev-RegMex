<template>
  <div>
    <h3>Main Select test page</h3>
  </div>
  <div id="main"> 
    <v-select
      :options="options"
      @select="optionSelest"
      :selected="selected"
    />
    <p>Selected options: {{selected}}</p>
  </div>

</template>

<script>

import vSelect from './v-select.vue'

export default {
    name: "MainSelect",
    components: {  
      vSelect,
    },

  data(){
    return {
        //Опции для компонента select
        options: [
          {name: 'Option 1', value: 1},
          {name: 'Option 2', value: 2},
          {name: 'Option 3', value: 3},
          {name: 'Option 4', value: 4},
          {name: 'Option 5', value: 5},
        ],
        selected: 'Select',
    }
  },

methods: {
  optionSelest(option) {
    this.selected = option.name
  }
  },
}

</script>

<style>
#main {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>
