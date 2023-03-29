<template>
  
   <div class="main-header">   
        <div class="col-md-2" align="center"> 
            <router-link class="btn btn-success m-2"  :to="{name: 'MGKmenu'}">Главная</router-link>
        </div>
        <div class="col-md-10" > 
            <h2 align="center" class="mt-2">Режимный лист сырьевого насоса МГК 111-Н1А</h2>
            <h3>Id: {{$route.params.id }}</h3>
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
                <DK_A_table/> 
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_pi')}" id="trend_pi">
                <DK_A_Pressure/>
            </div> 
            <div class="tab-pane fade" :class="{'active show': isActive('trend_ti')}" id="trend_ti">
                <DK_A_TI/>
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_xvi')}" id="trend_xvi">
                <DK_A_XVI/>
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_zvi')}" id="trend_zvi">
                <DK_A_ZVI/>
            </div>    
        </div>
    </div>
</div>

</template>

<script>

import DK_A_table from "/resources/js/components/MGK/H1/A/tableDisplay.vue"
import DK_A_Pressure from '/resources/js/components/MGK/H1/A/chartPressure.vue'
import DK_A_TI from '/resources/js/components/MGK/H1/A/chartTI.vue'
import DK_A_XVI from '/resources/js/components/MGK/H1/A/chartXVI.vue' 
import DK_A_ZVI from  '/resources/js/components/MGK/H1/A/chartZVI.vue'

export default {
    name: "H1",
    components: {DK_A_table, DK_A_Pressure, DK_A_TI, DK_A_XVI, DK_A_ZVI},

    props:[
            'id'
    ],

  data(){
    return {
        activeItem: 'table' // Переменная вкладка по умолчанию
    }
  },

  methods: {
    isActive(menuItem){ // Возвращает текущую активную вкладку
        return this.activeItem === menuItem
    },
    setActive(menuItem) { // Устанавливает новую активную вкладку
        this.activeItem = menuItem
    }
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
