<template>
<h3 class="title">Установка производства водорода</h3>
<div class="container" >
    <div class="desktop ">
        <!-- <div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">140-B2B TB2A</h5>
                        <p>Воздуходувки</p>
                        <router-link class="btn btn-primary" :to="{name: 'MGK.H1'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->

        <!-- <div div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">114-B3B TB3A</h5>
                    <p>Дымососы</p>
                    <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">140-ЦК1</h5>
                <p>Сырьевой компрессор</p>
                <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                </div>
            </div>
        </div>
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">140-ДК5-A/B</h5>
                <p>Компрессор циркулирующего водорода</p>
                <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                </div>
            </div>
        </div>
    </div>   
</div> 

</template>

<script>

export default {
    name: "Index",

    setup() {
        return {

        }
    },
}
</script>

<style scoped>
    .desktop {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    .title {
        text-align: center;
        margin: 20px;
        margin-bottom: 30px;
    }
    .child-item{
        margin: 30px;
    }
</style>
