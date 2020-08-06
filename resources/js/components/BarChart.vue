<script>
    // Import the base chart
    import {Bar} from 'vue-chartjs'

    // Extend it
    export default {
        extends: Bar,
        props: {
            chartdata: {
                type: Object,
                default: null
            }
        },
        mounted () {
            // Overwriting base render method with actual data and options
            this.renderChart(this.chartdata, {
                scales: {
                    yAxes: [{
                        ticks: {
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + value;
                            }
                        }
                    }]
                },
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    callbacks: {
                        label:function(tooltipItem, data){
                            var label = data.datasets[tooltipItem.datasetIndex].label || '';

                            if (label) {
                                label += ': ';
                            }
                            label += '$' + tooltipItem.yLabel;
                            return label;
                        }
                    }
                }
            })
        }
    }
</script>