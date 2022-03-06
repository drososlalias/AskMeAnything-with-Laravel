<template>
  <div>
    <div class="container w-2/5 mt-16 text-center text-xl">
      <h1 class="font-bold text-white">Most Used Keywords</h1>
      <bar-chart v-if="loaded" class="bg-white mt-4 rounded-2xl border-8 border-blue-300 shadow-lg" :chartData="chartData" :options="chartOptions" label="Top keywords"></bar-chart>
    </div>
  </div>
</template>

<script>
import BarChart from './Charts/BarChart.vue'
import chartOptions from './Charts/chart-options'

export default {
    name: 'KeywordStats',
    data(){
        return {
            loaded: false,
            chartData: [],
            chartOptions: chartOptions
        }
    },
    components: {
        BarChart
    },
    async created(){
        try {
            const { data } = await axios.get('/api/keywords')
            data.forEach(el => {
                this.chartData.push({keyword:el.keyword , total: el.keyword_appearances })
            })
            this.loaded = true
        } catch (err) {
            console.log(err)
        }
    }
}
</script>