<template>
   <menu-bar></menu-bar>

    <div class="container" >
    <div class="desktop">
        <!-- <div class="row"> -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">МГК</h5>
                        <p>Гидрокрекинг</p>
                        <router-link class="btn btn-primary" :to="{name: 'MGKmenu'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->

        <!-- <div div class="row"> -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">УПВ</h5>
                    <p>Водородка</p>
                    <router-link class="btn btn-primary" :to="{name: 'UPVmenu'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>   
</div> 

<div class="container" >
    <div class="desktop" >
            <div v-for="plant in plants" :key="plant.id" class="cards" >
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{plant.NamePlant}}</h5>
                        <p>{{plant.Description}}</p>
                        <router-link class="btn btn-primary" :to="{name: 'MGKmenu'}">Детально</router-link>
                    </div>
                </div>
            </div>
    </div>   
</div> 

</template>

<script>

import MenuBar from "/resources/js/components/MGK/menuBar.vue"
import MGKmenu from "../components/MGK/index.vue"
import axios from 'axios'

export default {
    name: "Main",
    components: { MenuBar, MGKmenu },

  data(){
    return {
        plants: [],
    }
  },

    mounted() {
        this.GetPlants();
        console.log(this.plants);
        // console.log($route.params);
    },

  methods: {
        GetPlants() {
            axios.get('/api/interface/plant')
                .then(res => {
                    this.plants = res.data
                    console.log(res.data);
                })
                .catch(err => {
                    //  console.log(err);
                })
        }
  }
}

</script>

<style scoped>
.desktop {
    display: flex;
    justify-content: space-between;
    /* padding-top: 50px; */
    margin-top: 50px;
}

.cards {
    width: 30%;
    
}
</style>
