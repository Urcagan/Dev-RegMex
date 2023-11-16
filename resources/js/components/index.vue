<template>
    <h1>component\index.vue</h1>

    <div class="menu">
        <router-link class="text" :to="{ name: 'time' }"
            >Тестовая страница с выбором времени</router-link
        >
        <router-link class="text" :to="{ name: 'Chart' }">
            Line Chart D3.vue
        </router-link>
        <router-link class="text" :to="{ name: 'D3Line' }">
            D3Line.vue Альтернатива
        </router-link>
        <router-link class="text" :to="{ name: 'D3MultiLine' }">
            D3 Multi Line.vue Альтернатива
        </router-link>
        <router-link class="text" :to="{ name: 'TestData' }">
            Тестирование получения данных
        </router-link>
    </div>
    <div class="container">
        <!-- <router-link class="btn btn-primary" :to="{ name: 'Adminn' }">Админ панель</router-link> -->

    </div>

    <h2 class="headline">Стартовая страница</h2>

    <div class="container">
        <div class="desktop">
            <div class="col-md-4">
                <div class="_card text-center">
                    <div class="_card-body">
                        <h5 class="_card-title">
                            Мониторинг динамического обоудования
                        </h5>
                        <!-- <p>Гидрокрекинг</p> -->
                        <router-link :to="{ name: 'MainPage' }">Перейти</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="desktop">
            <div class="col-md-4">
                <div class="_card text-center">
                    <div class="_card-body">
                        <h5 class="_card-title">Работа с БД</h5>
                        <!-- <p>Гидрокрекинг</p> -->
                        <router-link :to="{ name: 'MenuDB' }"
                            >Перейти</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import MGKmenu from "../components/MGK/index.vue"

export default {
    name: 'index',
    components: {},

    data() {
        return {
            MenuCount: [],
        }
    },
}
</script>

<style scoped>
/* .body {
    background: linear-gradient(45deg, #EECFBA, #C5DDE8);
} */
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
    background: rgb(238, 240, 215);

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
    overflow: hidden;
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

.text {
    /* color: aliceblue; */
    font-size: large;
    margin-left: 20px;
}

.menu {
    display: flex;
    margin: 20px 100px;
    background: #ffffff;
    border-radius: 5px;
    /* border: 1px solid red; */
}
</style>
