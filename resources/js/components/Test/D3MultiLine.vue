<template>
  <div>
    <h2 class="head">Файл D3 Multi Line.vue</h2>

    <!-- Create a div where the graph will take place -->
    <div id="my_dataviz"></div>
  </div>
</template>

<script>
import * as d3 from 'd3';
export default {
  data() {
    return {
      margin: { top: 10, right: 30, bottom: 30, left: 60 },
    };
  },

  mounted() {
    this.PlotChart();
  },

  methods: {
    PlotChart() {
      // set the dimensions and margins of the graph
      // const margin = {top: 10, right: 30, bottom: 30, left: 60},
      const width = 460 - this.margin.left - this.margin.right,
        height = 400 - this.margin.top - this.margin.bottom;

      // append the svg object to the body of the page
      const svg = d3
        .select('#my_dataviz')
        .append('svg')
        .attr('width', width + this.margin.left + this.margin.right)
        .attr('height', height + this.margin.top + this.margin.bottom)
        .append('g')
        .attr('transform', `translate(${this.margin.left},${this.margin.top})`);

      //Read the data
      d3.csv(
        'https://raw.githubusercontent.com/holtzy/data_to_viz/master/Example_dataset/5_OneCatSevNumOrdered.csv',
      ).then(function (data) {
        // group the data: I want to draw one line per group
        const sumstat = d3.group(data, d => d.name); // nest function allows to group the calculation per level of a factor
        console.log(data);
        console.log(sumstat);

        // Add X axis --> it is a date format
        const x = d3
          .scaleLinear()
          .domain(
            d3.extent(data, function (d) {
              return d.year;
            }),
          )
          .range([0, width]);
        svg.append('g').attr('transform', `translate(0, ${height})`).call(d3.axisBottom(x).ticks(5));

        // Add Y axis
        const y = d3
          .scaleLinear()
          .domain([
            0,
            d3.max(data, function (d) {
              return +d.n;
            }),
          ])
          .range([height, 0]);
        svg.append('g').call(d3.axisLeft(y));

        // color palette
        const color = d3
          .scaleOrdinal()
          .range(['#e41a1c', '#377eb8', '#4daf4a', '#984ea3', '#ff7f00', '#ffff33', '#a65628', '#f781bf', '#999999']);

        // Draw the line
        svg
          .selectAll('.line')
          .data(sumstat)
          .join('path')
          .attr('fill', 'none')
          .attr('stroke', function (d) {
            return color(d[0]);
          })
          .attr('stroke-width', 1.5)
          .attr('d', function (d) {
            return d3
              .line()
              .x(function (d) {
                return x(d.year);
              })
              .y(function (d) {
                return y(+d.n);
              })(d[1]);
          });
      });
    },
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
