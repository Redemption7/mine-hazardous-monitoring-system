<div wire:poll.3000ms>
    <!-- HTML -->
    <div id="linediv"></div>

    <style>
        #linediv {
            width: 100%;
            height: 350px;
        }
    </style>

    <!-- Chart code -->
    <script>


        window.addEventListener('update-line', event => {

            am5.ready(function() {
            am5.array.each(am5.registry.rootElements, function (root) {
                if (root.dom.id === 'linediv') {
                    root.dispose();
                }
            });
// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("linediv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            var data = [
                    @foreach($sensor_data as $key => $report)
                    {
                        x: {{ $loop->iteration }},
                        value: @this.sensor_data[{{$key}}],
                    },
                    @endforeach
            ];


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX"
                })
            );

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererX.new(root, {
                        minGridDistance: 50
                    }),
                    tooltip: am5.Tooltip.new(root, {})
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {})
                })
            );

// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root, {
                    minBulletDistance: 10,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "x",
                    tooltip: am5.Tooltip.new(root, {
                        pointerOrientation: "horizontal",
                        labelText: "{valueY}"
                    })
                })
            );

            series.strokes.template.setAll({
                strokeWidth: 3
            });

            series.data.setAll(data);

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    sprite: am5.Circle.new(root, {
                        radius: 6,
                        fill: series.get("fill"),
                        stroke: root.interfaceColors.get("background"),
                        strokeWidth: 2
                    })
                });
            });

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                xAxis: xAxis
            }));
            cursor.lineY.set("visible", false);

// add scrollbar
            chart.set("scrollbarX", am5.Scrollbar.new(root, {
                orientation: "horizontal"
            }));

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
//             series.appear(1000, 100);
//             chart.appear(1000, 100);

// Function to add process control ranges
            function addLimits(lower, upper) {
                // Add range fill
                createRange(lower, upper, undefined, am5.color(0xffce00));

                // Add upper/average/lower lines
                createRange(lower, undefined, "Lower control limit", am5.color(0x4d00ff));
                createRange(upper, undefined, "Upper control limit", am5.color(0x4d00ff));
                createRange(lower + (upper - lower) / 2, undefined, "Process average", am5.color(0x4d00ff), true);

            }

            addLimits(2, 10)

            function createRange(value, endValue, label, color, dashed) {
                var rangeDataItem = yAxis.makeDataItem({
                    value: value,
                    endValue: endValue
                });

                var range = yAxis.createAxisRange(rangeDataItem);

                if (endValue) {
                    range.get("axisFill").setAll({
                        fill: color,
                        fillOpacity: 0.2,
                        visible: true
                    });
                }
                else {
                    range.get("grid").setAll({
                        stroke: color,
                        strokeOpacity: 1,
                        strokeWidth: 2,
                        location: 1
                    });

                    if (dashed) {
                        range.get("grid").set("strokeDasharray", [5, 3]);
                    }
                }

                if (label) {
                    range.get("label").setAll({
                        text: label,
                        location: 1,
                        fontSize: 19,
                        inside: true,
                        centerX: am5.p0,
                        centerY: am5.p100
                    });
                }
            }

        }); // end am5.ready()

        });
    </script>


</div>
