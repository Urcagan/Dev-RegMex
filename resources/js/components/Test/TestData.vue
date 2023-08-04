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


    // this.PlotChart_2()

    this.loadPointData()

    // this.convertData()
  },


  methods: {

    PlotChart_2(){
        
      // set the dimensions and margins of the graph
      // const margin = {top: 10, right: 30, bottom: 30, left: 60},
      const width = 460 - this.margin.left - this.margin.right,
            height = 400 - this.margin.top - this.margin.bottom;

      // append the svg object to the body of the page
      const svg = d3.select("#my_dataviz")
        .append("svg")
          .attr("width", width + this.margin.left + this.margin.right)
          .attr("height", height + this.margin.top + this.margin.bottom)
        .append("g")
          .attr("transform", `translate(${this.margin.left},${this.margin.top})`);

        //Read the data
      // d3.csv("https://raw.githubusercontent.com/holtzy/data_to_viz/master/Example_dataset/5_OneCatSevNumOrdered.csv")
        // .then( function(OneCat) {
          // console.log(this.OneCat);
          // group the data: I want to draw one line per group
          
          
          const sumstat = d3.group(this.OneCat, d => d.name); // nest function allows to group the calculation per level of a factor
    // console.log(sumstat)
            // Add X axis --> it is a date format
          const x = d3.scaleLinear()
            .domain(d3.extent(this.OneCat, function(d) { return d.year; }))
            .range([ 0, width ]);
          svg.append("g")
            .attr("transform", `translate(0, ${height})`)
            .call(d3.axisBottom(x).ticks(5));

            // Add Y axis
          const y = d3.scaleLinear()
            .domain([0, d3.max(this.OneCat, function(d) { return +d.n; })])
            .range([ height, 0 ]);
          svg.append("g")
            .call(d3.axisLeft(y));

            // color palette
          const color = d3.scaleOrdinal()
            .range(['#e41a1c','#377eb8','#4daf4a','#984ea3','#ff7f00','#ffff33','#a65628','#f781bf','#999999'])

          // Draw the line
          svg.selectAll(".line")
              .data(sumstat)
              .join("path")
                .attr("fill", "none")
                .attr("stroke", function(d){ return color(d[0]) })
                .attr("stroke-width", 1.5)
                .attr("d", function(d){
                  return d3.line()
                    .x(function(d) { return x(d.year); })
                    .y(function(d) { return y(+d.n); })
                    (d[1])
                })

        // })
    },

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


      const width = 1680 - this.margin.left - this.margin.right,
            height = 400 - this.margin.top - this.margin.bottom;

      // append the svg object to the body of the page
      const svg = d3.select("#my_dataviz")
        .append("svg")
          .attr("width", width + this.margin.left + this.margin.right)
          .attr("height", height + this.margin.top + this.margin.bottom)
        .append("g")
          .attr("transform", `translate(${this.margin.left},${this.margin.top})`);

             axios.get('/api/load')

                .then((response) => {
                  const data = response.data;
console.log(data)
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
                  // function(Result){
                  //   return { name: Result.name , LocalTime: d3.timeParse("%Y-%m-%d")(Result.LocalTime:), value : Result.value }
                  // }

                  const sumstat = d3.group(Result, d => d.name);
                  console.log(sumstat);

                  const x = d3.scaleTime()
                    .domain(d3.extent(Result, function(d) { return d.LocalTime; }))
                    .range([ 0, width ]);
                  svg.append("g")
                    .attr("transform", `translate(0, ${height})`)
                    .call(d3.axisBottom(x).ticks());

                    // Add Y axis
                  const y = d3.scaleLinear()
                    .domain([0, d3.max(Result, function(d) { return +d.value; })])
                    .range([ height, 0 ]);
                  svg.append("g")
                    .call(d3.axisLeft(y));

                    // color palette
                  const color = d3.scaleOrdinal()
                    .range(['#e41a1c','#377eb8','#4daf4a','#984ea3','#ff7f00','#ffff33','#a65628','#f781bf','#999999'])

                  // Draw the line
                  svg.selectAll(".line")
                      .data(sumstat)
                      .join("path")
                        .attr("fill", "none")
                        .attr("stroke", function(d){ return color(d[0]) })
                        .attr("stroke-width", 1.5)
                        .attr("d", function(d){
                          return d3.line()
                            .x(function(d) { return x(d.LocalTime); })
                            .y(function(d) { return y(+d.value); })
                            (d[1])
                        })
                  
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

</style>