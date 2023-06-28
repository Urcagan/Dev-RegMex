<template>
    <div class="container">
        <router-link class="btn btn-success m-2" :to="{name: 'MainPage'}">Главная</router-link>

        <router-link class="btn btn-primary m-2" :to="{name: 'DK_A_table'}">Таблица Н1А</router-link>
        <router-link class="btn btn-primary m-2" to="/DK_A/home">Общий Тренд</router-link>
        <router-link class="btn btn-primary m-2" :to="{name: 'DK_A_pressure'}">Тренд PI</router-link>
        <router-link class="btn btn-primary m-2" :to="{name: 'DK_A_ti'}">Тренд TI</router-link>
        <router-link class="btn btn-primary m-2" :to="{name: 'DK_A_xvi'}">Тренд XVI</router-link>
        <router-link class="btn btn-primary m-2" :to="{name: 'DK_A_zvi'}">Тренд ZVI</router-link>

        <router-link class="btn btn-primary m-2" :to="{name: 'DK_B_table'}">Таблица Н1B</router-link>

    </div>
</template>

<script>
export default {
    name: "menuBar"
}
</script>

<style scoped>

</style>
