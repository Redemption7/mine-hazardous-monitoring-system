<div wire:poll.3000ms>
    <div id="pieContainer">
        <div id="chartdiv" ></div>
    </div>

    <style>
        #chartdiv {
            width: 100%;
            height: 250px;
        }
    </style>


    <!-- Chart code -->
    <script>

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {
            })
        });

        window.addEventListener('update-pie', event => {

            am5.ready(function() {
            am5.array.each(am5.registry.rootElements, function (root) {
                if (root.dom.id === 'chartdiv') {
                    root.dispose();
                }
            });

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    endAngle: 270
                })
            );

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "value",
                    categoryField: "category",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                 series.data.setAll([{
                     category: "< 1000 [Clean]",
                     value:  @this.clean
                 }, {
                     category: "1000 - 4000 [Good]",
                     value:  @this.good
                 }, {
                     category: "4001 - 10000 [Acceptable]",
                     value:  @this.acceptable
                 }, {
                     category: "10001 - 20 000 [Heavy]",
                     value:  @this.heavy
                 }, {
                     category: " > 20000 [Hazardous]",
                     value:  @this.harzadous
                 }]);


            // series.appear(1000, 100);

        }); // end am5.ready()

        })
    </script>

    <!-- HTML -->

</div>
