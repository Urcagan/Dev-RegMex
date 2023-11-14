<template>
<h1> Панель администрирования базы данных </h1>
<div> Здесь должно быть меню</div>
<div class="menu">
    <router-link class="text" :to="{name: 'ComplexDB'}">Перечень комплексов</router-link>
  <!--  <router-link class="text" :to="{name: 'Chart'}"> Line Chart D3.vue </router-link>
    <router-link class="text" :to="{name: 'D3Line'}"> D3Line.vue Альтернатива </router-link>
    <router-link class="text" :to="{name: 'D3MultiLine'}"> D3 Multi Line.vue Альтернатива </router-link>
    <router-link class="text" :to="{name: 'TestData'}"> Тестирование получения данных </router-link> -->
</div>

</template>

<script >
// import Complex from "../UI_DB/complex.vue"

export default {
    name: "AdminPanel",
    components: {  },

  data(){
    return {
        
    }
  },

    mounted() {
        
    },

  methods: {
        
  }
}

</script>

<style scoped>
.headline {
        text-align: center;
        margin: 20px;
        margin-bottom: 30px;
}

.desktop {
    display: flex;
    justify-content: space-between;
    /* padding-top: 50px; */
    margin-top: 20px;
}

._cards {
    width: 30%;
    text-align: center;    
    /* border: 1px solid red; */
}

._card {
    border: 1px solid darkblue;
    border-radius: 5px;
    background: white;
    height: 120px;
    /* width: 80%; */
}

._card-body {
    /* border: 1px solid red; */
    margin-top: 5px;
    height: 100%;
    
    /* position: relative; */
}

._card-body p {
     /* border: 1px solid red; */
     height: 3rem;
     overflow:hidden;
     margin: auto;
}

._card-title {
    /* border: 1px solid red; */
    margin: auto;
}

._card-btn {
    /* border: 1px solid red; */
    /* margin: auto; */
    /* абсолютное позиционирование */
    /* position: absolute; */
    /* прижимаем блок к нижней границе относительно блока с position: relative*/
    /* bottom: 30px; */
}




</style>
