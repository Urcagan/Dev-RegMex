<template>
    <h1>component\MGK\111H1\H1.vue</h1>
  
   <div class="main-header">   
        <div class="col-md-2" align="center"> 
            <router-link class="btn btn-success m-2"  :to="{name: 'MainPage'}">Главная</router-link>
        </div>    
        <div class="col-md-10" > 
            <h2 align="center" class="mt-2"> Режимный лист {{ prefName }}</h2>
            <!-- <h2>{{prefPath}}</h2> -->
        </div>    
   </div>
  
<div class="card text-center">
    <div class="card-header">
        <!-- <ul class="nav nav-tabs card-header-tabs"> -->
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('table')" :class="{active: isActive('table')}" href="#table">Таблица</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('trend_pi')" :class="{active: isActive('trend_pi')}" href="#trend_pi">Тренд PI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('trend_ti')" :class="{active: isActive('trend_ti')}" href="#trend_ti">Тренд TI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('trend_xvi')" :class="{active: isActive('trend_xvi')}" href="#trend_xvi">Тренд XVI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click.prevent="setActive('trend_zvi')" :class="{active: isActive('trend_zvi')}" href="#trend_zvi">Тренд ZVI</a>
            </li>
        </ul>
        <div class="tab-content"> 
            <div class="tab-pane fade" :class="{'active show': isActive('table')}" id="table">
                <!-- <DK_A_table :apiPath="'/api/H1a/table'"/>  -->
                <DK_table :apiPath="prefPath"/> 
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_pi')}" id="trend_pi">
                <DK_Pressure :apiPath="prefPath"/>
            </div> 
            <div class="tab-pane fade" :class="{'active show': isActive('trend_ti')}" id="trend_ti">
                <DK_TI :apiPath="prefPath"/>
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_xvi')}" id="trend_xvi">
                <DK_XVI :apiPath="prefPath" />
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_zvi')}" id="trend_zvi">
                <DK_ZVI :apiPath="prefPath" />
            </div>    
        </div>
    </div>
</div>

</template>

<script>

// import DK_A_table from "/resources/js/components/MGK/H1/A/tableDisplay.vue"
// import DK_A_Pressure from '/resources/js/components/MGK/H1/A/chartPressure.vue'
// import DK_A_TI from '/resources/js/components/MGK/H1/A/chartTI.vue'
// import DK_A_XVI from '/resources/js/components/MGK/H1/A/chartXVI.vue' 
// import DK_A_ZVI from  '/resources/js/components/MGK/H1/A/chartZVI.vue'

import DK_table from "/resources/js/components/MGK/111H1/tableDisplay.vue"
import DK_Pressure from '/resources/js/components/MGK/111H1/chartPressure.vue'
import DK_TI from '/resources/js/components/MGK/111H1/chartTI.vue'
import DK_XVI from '/resources/js/components/MGK/111H1/chartXVI.vue' 
import DK_ZVI from  '/resources/js/components/MGK/111H1/chartZVI.vue'

export default {
    name: "H1",
    components: {DK_table, DK_Pressure, DK_TI, DK_XVI, DK_ZVI},
props:true,
    props: [
        'prefPath',
        'prefName'
        ],

  data(){
    return {
        activeItem: 'table', // Переменная вкладка по умолчанию
        apiPath: '',
    }
  },

  methods: {
    isActive(menuItem){ // Возвращает текущую активную вкладку
        return this.activeItem === menuItem
    },
    setActive(menuItem) { // Устанавливает новую активную вкладку
        this.activeItem = menuItem
    },
  }
}

</script>

<style scoped>
    .main-header {
        display: flex;
        /* flex-direction: row; */
        /* flex-wrap: wrap; */
        align-items: center;
        /* justify-content: center; */
        /* justify-content: space-around; */
    }
</style>
