<template>
    <div>
        <h2  class="head"> Тестовая страница для библиотеки D3 line Chart </h2>
        
        <svg></svg>

    </div>
</template>

<script>

import * as d3 from "d3";
export default {

  data(){
    return{
      data_new: [
        { date: "24-Apr-07", amount: 93.24 },
        { date: "25-Apr-07", amount: 95.35 },
        { date: "26-Apr-07", amount: 98.84 },
        { date: "27-Apr-07", amount: 99.92 },
        { date: "30-Apr-07", amount: 99.8 },
        { date: "1-May-07", amount: 99.47 },
        { date: "2-May-07", amount: 100.39 },
        { date: "3-May-07", amount: 100.4 },
        { date: "4-May-07", amount: 100.81 },
        { date: "7-May-07", amount: 103.92 },
        { date: "8-May-07", amount: 105.06 },
        { date: "9-May-07", amount: 106.88 },
        { date: "10-May-07", amount: 107.34 },
      ]
    }
  },

  mounted() {

    console.log(this.data_new)

    const width = 800;
    const height = 400;

    const marginTop = 20;
    const marginRight = 30;
    const marginBottom = 30;
    const marginLeft = 40;

    // const data = [];

    const data = [
    { date: "24-Apr-07", amount: 93.24 },
    { date: "25-Apr-07", amount: 95.35 },
    { date: "26-Apr-07", amount: 98.84 },
    { date: "27-Apr-07", amount: 99.92 },
    { date: "30-Apr-07", amount: 99.8 },
    { date: "1-May-07", amount: 99.47 },
    { date: "2-May-07", amount: 100.39 },
    { date: "3-May-07", amount: 100.4 },
    { date: "4-May-07", amount: 100.81 },
    { date: "7-May-07", amount: 103.92 },
    { date: "8-May-07", amount: 105.06 },
    { date: "9-May-07", amount: 106.88 },
    { date: "10-May-07", amount: 107.34 },
  ];

    const svg = d3.select("svg").attr("width", width).attr("height", height);
   
    const g = svg.append("g");

    //2. Parse the dates
    const parseTime = d3.timeParse("%d-%b-%y");
    
    //3. Creating the Chart Axes
    const x = d3
      .scaleTime()
      .domain(
        d3.extent(data, function (d) {
          return parseTime(d.date);
        })
      )
      .rangeRound([marginLeft, width]);
   
    const y = d3
      .scaleLinear()
      .domain(
        d3.extent(data, function (d) {
          return d.amount;
        })
      )
      .rangeRound([height-marginBottom, 0]);

    //4. Creating a Line
    const line = d3
      .line()
      .x(function (d) {
        return x(parseTime(d.date));
      })
      .y(function (d) {
        return y(d.amount);
      });

    //5. Appending the Axes to the Chart
    g.append("g")
      // .attr("transform", "translate(0," + (height-20)+ ")")
      .attr("transform", `translate(0,${height - marginBottom})`)
      .call(d3.axisBottom(x));

    g.append("g")
      .attr("transform", `translate(${marginLeft},0)`) // полажение оси
      // .call(d3.axisLeft(y))
      .call(d3.axisLeft(y).ticks(height / 40))  // Деления на оси
      // .attr("x2", width - marginLeft - marginRight)

      .append("text")
      .attr("fill", "#000") // чвет текста названия оси
      .attr("transform", "rotate(-90)") // поварот названия оси
      .attr("y", 6) // Отступ названия оси от оси
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("Price ($)");    

    //6. Appending a path to the Chart
    g.append("path")
      .datum(data)
      .attr("fill", "none")
      .attr("stroke", "red") 
      .attr("stroke-width", 2.5) // Толщина линии
      .attr("d", line);
  },
};

</script>

<style>

svg {
  /* border: 1px solid red; */
}
    .head {
         text-align: center;
        margin: 20px;
    }

</style>