<template>
<h3 class="title">Установка гидрокрекенга</h3>
<div class="container" >
    <div class="desktop ">
        <!-- <div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">111-H1-A/B</h5>
                        <p>Сырьевые насосы</p>
                        <router-link class="btn btn-primary" :to="{name: this.namePage}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->

        <!-- <div div class="row"> -->
            <div class="col-md-4 child-item">
                <div class="card text-center">
                    <div class="card-body">
                    <h5 class="card-title">111-ДК1 А/В</h5>
                    <p>Компрессора подпиточного газа</p>
                    <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">111-ЦК1</h5>
                <p>Компрессор циркулирующего газа</p>
                <router-link class="btn btn-primary" :to="{name: 'MainPage'}">Детально</router-link>
                </div>
            </div>
        </div>
        <div class="col-md-4 child-item">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">113-ДК1</h5>
                <p>Компрессор сжатия остаточного газа</p>
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
            namePage: 'MGK.H1'
        }
    },

    data(){
        return{

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
