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
                    title: 'CLIENTES E INGRESOS',
                    subtitle: '',
                }
            },
            chartData2: [],
            chartOptions2: {
                chart: {
                    title: 'CLIENTES Y COBROS',
                    subtitle: '',
                }
            },
        }
    },
    props:[
    ],
    created() {
        this.getGrafs1();
        this.getGrafs2();
    },
    methods:{
        getGrafs1(){
                axios.get("facturas/grafs1").then((response)=>{
                this.chartData1 = response.data;
            });
        },
        getGrafs2(){
                axios.get("facturas/grafs2").then((response)=>{
                this.chartData2 = response.data;
            });
        }
    }
}
</script>