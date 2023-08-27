<template>
    <div>
        <h2  class="head"> Получение данных TestData.vue </h2>
        
        <!-- <svg></svg> -->
        <div id="my_dataviz"></div>

    </div>
</template>

<script>

import * as d3 from "d3";
export default {

  data(){
    return{

      margin: {top: 10, right: 30, bottom: 30, left: 60},

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
      ],

      OneCat:[
        { "year": "1880", "sex": "F", "name": "Helen", "n": 636, "prop": 0.00651612638826278 },
        { "year": "1880", "sex": "F", "name": "Amanda", "n": 241, "prop": 0.00246916109995492 },
        { "year": "1880", "sex": "F", "name": "Betty", "n": 117, "prop": 0.00119872136387853 },
        { "year": "1880", "sex": "F", "name": "Dorothy", "n": 112, "prop": 0.00114749395516577 },
        { "year": "1880", "sex": "F", "name": "Linda", "n": 27, "prop": 0.000276628007048891 },
        { "year": "1880", "sex": "F", "name": "Deborah", "n": 12, "prop": 0.000122945780910618 },
        { "year": "1880", "sex": "F", "name": "Jessica", "n": 7, "prop": 7.17183721978607E-05 },
        { "year": "1881", "sex": "F", "name": "Helen", "n": 612, "prop": 0.00619088564058469 },
        { "year": "1881", "sex": "F", "name": "Amanda", "n": 263, "prop": 0.0026604622932578 },
        { "year": "1881", "sex": "F", "name": "Betty", "n": 112, "prop": 0.00113297253553184 },
        { "year": "1881", "sex": "F", "name": "Dorothy", "n": 109, "prop": 0.00110262505690152 },
        { "year": "1881", "sex": "F", "name": "Linda", "n": 38, "prop": 0.000384401395984017 },
        { "year": "1881", "sex": "F", "name": "Deborah", "n": 14, "prop": 0.00014162156694148 },
        { "year": "1881", "sex": "F", "name": "Jessica", "n": 7, "prop": 7.081078347074E-05 },
        { "year": "1882", "sex": "F", "name": "Helen", "n": 838, "prop": 0.00724311990042871 },
        { "year": "1882", "sex": "F", "name": "Amanda", "n": 288, "prop": 0.00248928225694925 },
        { "year": "1882", "sex": "F", "name": "Betty", "n": 123, "prop": 0.00106313096390541 },
        { "year": "1882", "sex": "F", "name": "Dorothy", "n": 115, "prop": 0.000993984234545706 },
        { "year": "1882", "sex": "F", "name": "Linda", "n": 36, "prop": 0.000311160282118656 },
        { "year": "1882", "sex": "F", "name": "Deborah", "n": 15, "prop": 0.00012965011754944 },
        { "year": "1882", "sex": "F", "name": "Jessica", "n": 8, "prop": 6.91467293597013E-05 },
        { "year": "1883", "sex": "F", "name": "Helen", "n": 862, "prop": 0.0071798032633955 },
        { "year": "1883", "sex": "F", "name": "Amanda", "n": 287, "prop": 0.00239049134175697 },
        { "year": "1883", "sex": "F", "name": "Dorothy", "n": 141, "prop": 0.00117442257556701 },
        { "year": "1883", "sex": "F", "name": "Betty", "n": 120, "prop": 0.000999508574950649 },
        { "year": "1883", "sex": "F", "name": "Linda", "n": 49, "prop": 0.000408132668104848 },
        { "year": "1883", "sex": "F", "name": "Deborah", "n": 16, "prop": 0.00013326780999342 },
        { "year": "1883", "sex": "F", "name": "Jessica", "n": 6, "prop": 4.99754287475325E-05 },
      ],

      TestDate: "2022-11-29 17:59:59.610",


    }
  },

 mounted() {


    // const fileName = "example.csv";
    // console.log(fileName);
 
    // d3.csv( "//EVENT-SERVER/Data/MOCK_DATA.csv")
    //   .then(function(d){
    //     console.log("Load CSV file")
    //     console.log(d);
    //     })
    //   .catch(function(error){
    //     console.log(error)
    //     })


    // const sumstat = d3.group(this.OneCat, d => d.name); // nest function allows to group the calculation per level of a factor
          // console.log(this.OneCat);
          // console.log(sumstat);



    this.loadPointData()

    // this.convertData()
  },


  methods: {

    convertData: function () {

       axios.get('/api/load')

                .then((response) => {
                  const data = response.data;
                 
                  const Result = [];

                  data.forEach(element => {
                    element.forEach(item => {
                      Result.push(item);
                    })
                  });

                  const parsDate = d3.timeParse("%Y-%m-%d %H:%M:%S.%L"); 
                  
                  Result.forEach(element => {
                    element.LocalTime = parsDate(element.LocalTime)
                    // console.log(element.LocalTime)
                  })

                  console.log(Result)

                  const sumstat = d3.group(Result, d => d.name);
                  // console.log(sumstat);  
                  
                  const DateMark = d3.extent(Result, function(d) { return d.LocalTime; });
                  console.log(DateMark);
                })
    },

    loadPointData: function () {
      // Пример брался  из источника https://d3-graph-gallery.com/graph/line_several_group.html
      //                             https://d3-graph-gallery.com/graph/line_brushZoom.html

      const margin = {top: 70, right: 30, bottom: 40, left: 80};
      const width = 1800 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;

      // append the svg object to the body of the page
      const svg = d3.select("#my_dataviz")
        .append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
        .append("g")
          .attr("transform", `translate(${margin.left},${margin.top})`);

          // Функция в переменной для преобразоания строки с датой и временем  в формат даты и времеи
                  const parsDate = d3.timeParse("%Y-%m-%d %H:%M:%S.%L"); 


          axios.get('/api/load')

                .then((response) => {
                  const data = response.data;
                  
                  const Result = []; // Массив для хранения последовательности данных

                  data.forEach(element => {
                    element.forEach(item => {
                        item.LocalTime = parsDate(item.LocalTime) // Преобразование Даты и времени
                      Result.push(item);
                    })
                  });
                  
                  // Result.forEach(element => {
                  //   element.LocalTime = parsDate(element.LocalTime)
                  // })
                    // Выполняем агрегация данных по графе name, необходимо для вывода на график
                  const sumstat = d3.group(Result, d => d.name);

                    // Добавление оси Х
                  const x = d3.scaleTime()
                    .domain(d3.extent(Result, function(d) { return d.LocalTime; }))
                    .range([ 0, width ]);
                  const xAxis = svg.append("g")
                    .attr("transform", `translate(0, ${height})`)
                    .style("font-size", "12px")
                    .attr("stroke-width", 1.5)
                    .call(d3.axisBottom(x)
                      // .ticks(d3.timeMonth.every(1))
                      // .tickFormat(d3.timeFormat("%d %m %Y"))
                      );
                  //   .call(g => g.select(".domain").remove())
                  //   .selectAll(".tick line")
                  //   .style("stroke-opacity", 0)
                  // svg.selectAll(".tick text")
                  //   .attr("fill", "#777");

                    // Добавление оси У
                  const y = d3.scaleLinear() 
                    .domain([0, d3.max(Result, function(d) { return d.value; })])
                    .range([ height, 0 ]);
                  const yAxis = svg.append("g")
                    .attr("stroke-width", 1.5)  
                    .call(d3.axisLeft(y)
                      .ticks()
                    );

                  // Функция рисования решотки по Х
                    const DrawXGrid = function () {
                        linexGrid.selectAll("line")
                        .data(x.ticks().slice(0))
                        .join("line")
                          .transition()
                          .duration(1000)
                          .attr("x1", d => x(d))
                          .attr("x2", d => x(d))
                          .attr("y1", 0)
                          .attr("y2", height)
                          .attr("stroke", '#9a9a9a')
                          .attr("stroke-width", .5);
                      };
                      // Функция рисования решотки по У
                    const DrawYGrid = function () {
                      lineYGrid.selectAll("yGrid")
                      .data(y.ticks().slice(0))
                      .join("line")
                        .attr("x1", 0)
                        .attr("x2", width)
                        .attr("y1", d => y(d))
                        .attr("y2", d => y(d))
                        .attr("stroke", "#9a9a9a")
                        .attr("stroke-width", .5)
                    };

                    // Добавление вертикальных линий решотки гафика
                    const linexGrid = svg.append('g')
                       .attr("class", "xGrid" );  
                       DrawXGrid();
                    
                    const lineYGrid = svg.append('g')
                      .attr("class", "yGrid");
                      DrawYGrid();

                        // Добавьте clipPath: все, что находится за пределами этой области, не будет отображаться.
                      const clip = svg.append("defs").append("clipPath")
                          .attr("id", "clip")
                          .append("rect")
                          .attr("id", "clip2")
                          .attr("width", width )
                          .attr("height", height )
                          .attr("x", 0)
                          .attr("y", 0);

                      // // Add brushing
                      const brush = d3.brushX()                 // Добавьте функцию кисти, используя функцию d3.brush.
                          .extent( [ [0,0], [width,height] ] )  // инициализируйте область кисти: начните с 0,0 и закончите шириной, высотой: это означает, что я выбираю всю область графика
                          .on("end", updateChart)     
                // цветовая палитра
                  const color = d3.scaleOrdinal()
                    .range(['#e41a1c','#377eb8','#4daf4a','#984ea3','#ff7f00','#ffff33','#a65628','#f781bf','#999999'])

                   // create a listening rectangle

                  const listeningRect = svg.append("rect")
                    .attr("id", "Tooltips")
                    .attr("width", width)
                    .attr("height", height);

                  // create the mouse move function

                  listeningRect.on("mousemove", function (event) {
                    const [xCoord, yCoord] = d3.pointer(event, this);   //Возвращает двухэлементный массив чисел [x, y] представляющие координаты указанного событие относительно указанного цель.
                    console.log("xAxis: " + xCoord + "  yAxis: " + yCoord) 
                    
                    // const bisectDate = d3.bisector(d => d.date).left;
                    // const x0 = x.invert(xCoord);
                    // const i = bisectDate(data, x0, 1);
                    // const d0 = data[i - 1];
                    // const d1 = data[i];
                    // const d = x0 - d0.date > d1.date - x0 ? d1 : d0;
                    // const xPos = x(d.date);
                    // const yPos = y(d.population);

                    
                  // Update the circle position

                  // circle.attr("cx", xPos)
                  //   .attr("cy", yPos);

                  //   console.log(xPos)
                    
                  });


                      // Делаем групп в которой будем отображать линии диаграммы
                    const line = svg.append('g')
                      .attr("clip-path", "url(#clip)")
            // debugger 
                  // Рисование линий
                  line.selectAll(".line") // добавлен при модификации масштабирования
                      .data(sumstat)
                      .join("path")
                        .attr("class", "line")  // Я добавляю строку класса, чтобы иметь возможность изменить эту строку позже
                        .attr("fill", "none")
                        .attr("stroke", function(d){ return color(d[0]) })
                        .attr("stroke-width", 1.5)
                        .attr("d", function(d){
                          return d3.line()
                            .x(function(d) { return x(d.LocalTime); })
                            .y(function(d) { return y(d.value); })
                            (d[1])
                        })                        

                  // Добавить Кисть
                      line.append("g")
                          .attr("class", "brush")
                          .call(brush);

                  // Функция, которая устанавливает для idleTimeOut значение nulll
                  let idleTimeout
                  function idled() { idleTimeout = null; }

                  // Функция, которая обновляет график для заданных границ
                  function updateChart(event,d) {

                    // Каковы выбранные границы?
                    let extent = event.selection
                    // Если нет выбора, вернуться к исходной координате. В противном случае обновите домен оси X.
                    if(!extent){
                      if (!idleTimeout) return idleTimeout = setTimeout(idled, 350) //Таймер для ожидания (двойное нажатие)
                      x.domain([ 4,8])
                    }else{
                      x.domain([ x.invert(extent[0]), x.invert(extent[1]) ])
                      linexGrid.selectAll("line").remove() 
                      DrawXGrid();

                      line.select(".brush").call(brush.move, null) // Это удалит область серой кисти, как только выделение будет сделано.
                    }

                    // Обновить положение оси
                    xAxis.transition().duration(1000).call(d3.axisBottom(x))
                    
                    // Обновить положение линии
                    line.selectAll('.line')                    
                        .transition()
                        .duration(1000)
                        .attr("d", function(d){
                          return d3.line()
                            .x(function(d) { return x(d.LocalTime); })
                            .y(function(d) { return y(d.value); })
                            (d[1])
                        })
                  }

                  // Если пользователь дважды щелкнет, повторно инициализирует диаграмму
                  svg.on("dblclick",function(){
                    x.domain(d3.extent(Result, function(d) { return d.LocalTime; }))
                    xAxis.transition().call(d3.axisBottom(x))
                    line
                      .selectAll('.line')
                      .transition()
                      .attr("d", function(d){
                          return d3.line()
                          .x(function(d) { return x(d.LocalTime); })
                          .y(function(d) { return y(d.value); })
                          (d[1])
                        })
                    linexGrid.selectAll("line").remove() 
                    DrawXGrid();                              
                  });

                 
                  
                    
                        // // Добавляет подпись оси У
                    svg.append("text")
                    .attr("transform", "rotate(-90)")
                    .attr("y", 0 - margin.left)
                    .attr("x", 0 - (height / 2))
                    .attr("dy", "2em")
                    .style("text-anchor", "middle")
                    .style("font-size", "14px")
                    .style("fill", "#777")
                    .style("font-family", "sans-serif")
                    .text("Подпись оси У");

                    // // Добвляет надпись названия графика Add the chart title
                    svg.append("text")
                    .attr("class", "chart-title")
                    .attr("x", margin.left - 50)
                    .attr("y", margin.top  - 100 )
                    .style("font-size", "18px")
                    .style("font-weight", "bold")
                    .style("font-family", "sans-serif")
                    .text("Надпись названия графика");
                 
  
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(() => (this.loaded = true))

                
        },
 },

};

</script>

<style>

/* svg {
  border: 1px solid red;
} */
    .head {
         text-align: center;
        margin: 20px;
    }

    rect {
      pointer-events: all;
      fill-opacity: 0;
      stroke-opacity: 0;
      z-index: 1;
    }

    .tooltip {
    position: absolute;
    padding: 10px;
    background-color: steelblue;
    color: white;
    border: 1px solid white;
    border-radius: 10px;
    display: none;
    opacity: .75;
  }

</style>