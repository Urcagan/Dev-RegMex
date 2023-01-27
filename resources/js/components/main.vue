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

</template>

<script>

import MenuBar from "/resources/js/components/MGK/menuBar.vue"
import MGKmenu from "../components/MGK/index.vue"

export default {
    name: "Main",
    components: { MenuBar, MGKmenu },

  data(){
    return {

    }
  },

  methods: {
    
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
</style>
