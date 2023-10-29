// import {d3-color} from "d3";
import { scaleOrdinal, scaleTime, scaleLinear } from 'd3-scale';
import { extent, max } from 'd3-array';
// import * as d3 from 'd3';

/**
 * Функция которая преобразует некоторое значение из одного интервала,
 * который называется domain, в значение, принадлежащее другому интервалу, который называется range.
 * @param {*} data  Источник данных сопоставления
 * @param {*} domain Имя сойства интервала сопоставления (Сторковое значение)
 * @param {*} range имя принадлежащее другому интервалу
 * @returns
 */
export function XscaleTime(data, domain, range) {
    const x = scaleTime()
        .domain(
            extent(data, function (d) {
                return d[domain];
            }),
        )
        .range([0, range]);
    return x;
}

/**
 * Создает новую линейную шкалу с указанным домен и диапазон
 * @param {*} data  Источник данных сопоставления
 * @param {*} domain Имя сойства интервала сопоставления (Сторковое значение)
 * @param {*} range имя принадлежащее другому интервалу
 * @returns
 */
export function YscaleLinear(data, domain, range) {
    const y = scaleLinear()
        .domain([
            0,
            max(data, function (d) {
                return d[domain];
            }),
        ])
        .range([range, 0]);
    return y;
}

// цветовая палитра
const color = scaleOrdinal().range([
    '#e41a1c',
    '#377eb8',
    '#4daf4a',
    '#984ea3',
    '#ff7f00',
    '#ffff33',
    '#a65628',
    '#f781bf',
    '#999999',
]);

/**
 * Вывод легенды на диаграмму
 * @param SVGcomponent SVG элемент в который будет вставлен Tooltip
 * @param data источник данных
 * @param x координата размещения
 * @param y координата размещения
 * @param offset расстояние между строками легенды
 *
 * @param https://d3-graph-gallery.com/graph/custom_legend.html#cont1
 */
export function ChartTooltip(SVGcomponent, data, x = 0, y = 0, offset = 20) {
    const legend = SVGcomponent.append('g');
    legend
        .selectAll('.legend')
        .data(data)
        .enter()
        .append('text')
        .attr('x', x)
        .attr('y', function (d, i) {
            return y + i * offset;
        })
        .style('fill', d => color(d))
        .text(function (d, i) {
            return d;
        })
        .attr('text-anchor', 'left')
        .style('alignment-baseline', 'middle');

    legend
        .selectAll('.dotLegend')
        .data(data)
        .enter()
        .append('circle')
        .attr('cx', x - 10)
        .attr('cy', function (d, i) {
            return y - 2 + i * offset;
        })
        .attr('r', 7)
        .style('fill', d => color(d));
}

/**
 * Цветовые индикаторы легенды
 * @param SVGcomponent SVG элемент в который будет вставлен Tooltip
 * @param data источник данных
 * @param x координата размещения
 * @param y координата размещения
 * @param offset расстояние между строками легенды
 */
export function DotsLegend(SVGcomponent, data, x = 0, y = 0, offset = 20) {
    SVGcomponent.append('g')
        .selectAll('.dotLegend')
        .data(data)
        .enter()
        .append('circle')
        .attr('cx', x)
        .attr('cy', function (d, i) {
            return y + i * offset;
        })
        .attr('r', 7)
        .style('fill', d => color(d));
}

/**
 * Вертикальная пунктирная линия указатель курсора на графике
 * @param SVGcomponent SVG элемент в который будет вставлен Tooltip
 * @param height Высота линии
 * @returns
 */
export function DropLine(SVGcomponent, height) {
    const line = SVGcomponent.append('g')
        .attr('class', 'DropLine')
        .append('line')
        .attr('x1', 0)
        .attr('y1', 0)
        .attr('x2', 0)
        .attr('y2', height)
        .attr('stroke', 'black')
        .attr('stroke-dasharray', '5 5')
        .attr('stroke-width', '2px')
        .style('visibility', 'hidden')
        .style('pointer-events', 'none');
    return line;
}
// create a tooltip
// export const tooltip = d3.select("#my_dataviz")
//         .append("div")
//           .style("position", "absolute")
//           .style("visibility", "hidden")
//           .text("I'm a circle!");

//  module.exports = {logo};
