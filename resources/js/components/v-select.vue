// SELECT. Создание кастомного стилизуемого компонента на Vue.js

<template>
  <div class="v-select">
    <p 
      class="title"
      @click="areOptionsVisible = !areOptionsVisible"
    >{{selected}}</p>
      <div 
        class="options"
        v-if="areOptionsVisible"
      >
        <p
          v-for="option in options"
          :key="option.value"
          @click="selectOption(option)"
        >
          {{option.name}}
        </p>
      </div>
  </div>
</template>

<script>

export default {
    name: "v-select",
    props: {
      options: {
        type: Array,
        default(){
          return []
        }
      },
      selected: {
        type: String,
        default: ''
      }
    },
  
  data(){
    return { 
       areOptionsVisible: false,
    }
  }, 

  methods: {
    selectOption(option){
      this.$emit('select', option) // Передадим option в родительский метод select (@select) 
      this.areOptionsVisible = false; // После выбора опции закрыть перечень опций
    },

// Метод закрывающий выпадающие options
    hideSelect() {
      this.areOptionsVisible = false;
    }

  },

//жизненный цикл когда компонент появляется
  mounted() { 
    document.addEventListener('click', this.hideSelect.bind(this), true) // Вешаем реакцию на клик по странице (закрываем перечень )
  },

//жизненный цикл когда компонент проподает
  beforeDestroy() {
    document.removeEventListener('click', this.hideSelect) // Снимаем обработчик с листа 
  }
}
</script>

<style >
  .v-select {
    position: relative; /*Положение элемента устанавливается относительно его исходного места. 
                        Добавление свойств left, top, right и bottom изменяет позицию элемента 
                        и сдвигает его в ту или иную сторону от первоначального расположения. */
    width: 200px;       /**Ширина элемента */
    cursor: pointer;
  }

  .title {
    border: solid 1px #aeaeae;
  }

  .v-select p {
    margin: 0; /* Убираем отступы между элементами селект */
  }

  .options {
    border: solid 1px #aeaeae; /* Рамка в один пиксел серого цвета */
    position: absolute; /*Задаем положение от родителя */
    top: 30px; /**отступ сверху от родителя */
    right: 0; /**Отступ с права от родителя */
    width: 100%;  /**Ширина элемента от родителя */
  }

  .options p:hover {
    background: #e7e7e7;
  }
</style>
