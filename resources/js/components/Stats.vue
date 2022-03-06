<template>
  <div>
    <div class="container w-2/5 mt-16 text-center text-xl">
      <h1 class="font-bold text-white">Questions per Day</h1>
      <line-chart v-if="loaded" class="bg-white mt-4 rounded-2xl border-8 border-blue-300 shadow-lg" :chartData="chartData" :options="chartOptions" label="Daily Stats"></line-chart>
    </div>
  </div>
</template>

<script>
import LineChart from './Charts/LineChart.vue'
import chartOptions from './Charts/chart-options'

export default {
    name: 'Stats',
    data(){
        return {
            loaded: false,
            chartData: [],
            chartOptions: chartOptions
        }
    },
    components: {
        LineChart
    },
    async created(){
        try {
            const { data } = await axios.get('/api/stats')
            data.forEach(el => {
                this.chartData.push({date:el.posted_at , total: el.total_posts })
            })
            this.loaded = true
        } catch (err) {
            console.log(err)
        }
    }
}
</script>