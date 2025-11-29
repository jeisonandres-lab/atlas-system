document.addEventListener('DOMContentLoaded', function () {
    // Datos estáticos (migrados de PHP)
    const months = [
        'Enero', 'Febrero', 'Marzo', 'Abril',
        'Mayo', 'Junio', 'Julio', 'Agosto',
        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];
    const filesByMonth = [120, 110, 150, 200, 300, 250, 180, 160, 170, 190, 210, 1000];
    const filesThisMonth = 128;
    const filesThisYear = 3520;
    const maxFiles = 1000; // Valor máximo para el cálculo de porcentaje

    // --- CHART YEAR (BAR) - Enhanced Aesthetics ---
    var optionsYear = {
        chart: { type: 'bar', height: 320, toolbar: { show: false }, fontFamily: 'inherit' },
        series: [{ name: 'Archivos', data: filesByMonth }],
        colors: ['#1929bb', '#2563eb'], // Gradient colors
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#2563eb'], // End color
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 8, // Rounded bars
                columnWidth: '35%', // Thinner bars
                distributed: false,
            }
        },
        xaxis: {
            categories: months,
            labels: { style: { colors: '#9ca3af', fontSize: '12px' } },
            axisBorder: { show: false },
            axisTicks: { show: false }
        },
        yaxis: {
            labels: { style: { colors: '#9ca3af', fontSize: '12px' } }
        },
        dataLabels: { enabled: false },
        grid: {
            borderColor: '#f3f4f6',
            strokeDashArray: 4,
            yaxis: { lines: { show: true } }
        },
        tooltip: {
            theme: 'light',
            y: { formatter: function (val) { return val.toLocaleString() + " archivos"; } }
        }
    };

    if (document.querySelector("#chart-year")) {
        var chartYear = new ApexCharts(document.querySelector("#chart-year"), optionsYear);
        chartYear.render();
    }

    // --- CHART MONTH (RADIAL) - Enhanced Aesthetics ---
    var optionsMonth = {
        chart: { type: 'radialBar', height: 280, fontFamily: 'inherit' },
        series: [(filesThisMonth / maxFiles) * 100], // Porcentaje basado en maxFiles
        labels: ['Crecimiento'],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                hollow: {
                    size: '65%',
                    image: undefined,
                    imageWidth: 150,
                    imageHeight: 150,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    imageClipped: true,
                    position: 'front',
                    dropShadow: { enabled: false, top: 0, left: 0, blur: 3, opacity: 0.5 }
                },
                track: {
                    background: '#f3f4f6',
                    strokeWidth: '100%',
                    margin: 0, // margin is in pixels
                    dropShadow: { enabled: false, top: -3, left: 0, blur: 4, opacity: 0.35 }
                },
                dataLabels: {
                    show: true,
                    name: { offsetY: 20, show: true, color: '#6b7280', fontSize: '13px' },
                    value: {
                        offsetY: -10,
                        color: '#111827',
                        fontSize: '30px',
                        fontWeight: 700,
                        show: true,
                        formatter: function (val) {
                            return Math.round((val / 100) * maxFiles);
                        }
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: ['#7c3aed'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        stroke: { lineCap: 'round' },
        colors: ['#2563eb']
    };

    if (document.querySelector("#chart-month")) {
        var chartMonth = new ApexCharts(document.querySelector("#chart-month"), optionsMonth);
        chartMonth.render();
    }

    // --- INITIAL VALUES ---
    const yearTitle = document.getElementById('year-summary-title');
    const monthValue = document.getElementById('month-summary-value');

    if (yearTitle) yearTitle.textContent = filesThisYear.toLocaleString();
    if (monthValue) monthValue.textContent = filesThisMonth.toLocaleString();

    // --- INTERACTIONS ---

    // 1. Date Range Update
    const btnUpdateRange = document.getElementById('btn-update-range');
    const inputStart = document.getElementById('date-start');
    const inputEnd = document.getElementById('date-end');

    if (btnUpdateRange && inputStart && inputEnd) {
        btnUpdateRange.addEventListener('click', function () {
            const startVal = inputStart.value;
            const endVal = inputEnd.value;

            if (!startVal || !endVal) { alert('Seleccione ambas fechas'); return; }
            if (startVal > endVal) { alert('La fecha de inicio debe ser anterior a la fecha fin'); return; }

            // Simular datos para el rango
            const seed = new Date(startVal).getDate() + new Date(endVal).getDate();
            const newData = filesByMonth.map(v => Math.round(v * (0.8 + (Math.random() * 0.4))));
            const total = newData.reduce((a, b) => a + b, 0);

            // Actualizar Chart
            if (chartYear) {
                chartYear.updateOptions({
                    series: [{ name: 'Archivos (Rango)', data: newData }]
                });
            }

            // Actualizar Texto
            if (yearTitle) yearTitle.textContent = total.toLocaleString();
        });
    }

    // 2. Month Update (Select)
    const selectMonth = document.getElementById('month-select-radial');
    if (selectMonth) {
        selectMonth.addEventListener('change', function () {
            const val = this.value;
            let newValue = 0;
            let label = "Crecimiento";

            if (val === 'current') {
                newValue = filesThisMonth;
            } else {
                const idx = parseInt(val) - 1;
                newValue = filesByMonth[idx] || 0;
                label = months[idx];
            }

            // Actualizar Chart
            if (chartMonth) {
                const percent = (newValue / maxFiles) * 100;
                chartMonth.updateOptions({
                    series: [percent],
                    labels: [label]
                });
            }

            // Actualizar Texto
            if (monthValue) monthValue.textContent = newValue.toLocaleString();
        });
    }
});
