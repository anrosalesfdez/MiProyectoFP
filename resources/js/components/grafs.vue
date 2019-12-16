<template>
    
    <div>
        <div>
            <GChart
                type="ColumnChart"
                :data="chartData1"
                :options="chartOptions1"
            />
        </div>

        <div>
            <GChart
                type="PieChart"
                :data="chartData2"
                :options="chartOptions2"
            />
        </div>
    </div>

    



</template>


<script>
import { GChart } from 'vue-google-charts'
 
export default {
    components: {
        GChart
    },
    data () {
        return {
            // Array will be automatically processed with visualization.arrayToDataTable function
            //   chartData: [
            //     ['Year', 'Sales', 'Expenses', 'Profit'],
            //     ['2014', 1000, 400, 200],
            //     ['2015', 1170, 460, 250],
            //     ['2016', 660, 1120, 300],
            //     ['2017', 1030, 540, 350]
            //   ],
            chartData1: [],
            chartOptions1: {
                chart: {
                    title: 'VENTAS E INGRESOS',
                    subtitle: '',
                }
            },
        }
    },
    props:[
    ],
    created() {
        this.getGrafs();
    },
    methods:{
        getGrafs(){
                axios.get("facturas/grafs").then((response)=>{
                this.chartData1 = response.data;
            });
        }
    }
}
</script>