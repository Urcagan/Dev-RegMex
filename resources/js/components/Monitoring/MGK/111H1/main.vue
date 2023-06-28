<template>
   <menu-bar></menu-bar>
    <IndexMGK/>
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
                <DK_table/> 
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_pi')}" id="trend_pi">
                <DK_Pressure/>
            </div> 
            <div class="tab-pane fade" :class="{'active show': isActive('trend_ti')}" id="trend_ti">
                <DK_TI/>
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_xvi')}" id="trend_xvi">
                <DK_XVI/>
            </div>
            <div class="tab-pane fade" :class="{'active show': isActive('trend_zvi')}" id="trend_zvi">
                <DK_ZVI/>
            </div>    
        </div>
    </div>
</div>

</template>

<script>
import IndexMGK from "../components/Monitoring/MGK/index.vue"
import MenuBar from "/resources/js/components/Monitoring/MGK/menuBar.vue"
import DK_table from "../components/Monitoring/MGK/111H1/tableDisplay.vue"
import DK_Pressure from '../components/Monitoring/MGK/111H1/chartPressure.vue'
import DK_TI from '../components/Monitoring/MGK/111H1/chartTI.vue'
import DK_XVI from '../components/Monitoring/MGK/111H1/chartXVI.vue' 
import DK_ZVI from  '../components/Monitoring/MGK/111H1/chartZVI.vue'

export default {
    name: "Main",
    components: {IndexMGK, MenuBar, DK_table, DK_Pressure, DK_TI, DK_XVI, DK_ZVI},

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

</style>
