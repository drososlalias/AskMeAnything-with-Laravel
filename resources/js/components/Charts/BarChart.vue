<script>
import { Bar } from 'vue-chartjs'

export default {
  extends: Bar,
  props: {
    label:{
        type: String
    },
    chartData: {
      type: Array,
      default: []
    },
    options: {
      type: Object,
    }
  },
  data(){
      return{
          gradient: ''
      }
  },
  mounted () {
        this.gradient = this.$refs.canvas.getContext('2d').createLinearGradient(0, 0, 0, 450)
        this.gradient.addColorStop(0, 'rgba(0, 0,255, 1)')
        this.gradient.addColorStop(0.5, 'rgba(0, 0, 255, 0.75)');
        this.gradient.addColorStop(1, 'rgba(0, 0, 255, 0.5)');

        const keywords = this.chartData.map(d => d.keyword)
        const totalAppearances = this.chartData.map(d => d.total)

        this.renderChart({
            labels: keywords,
            datasets: [{
                label: this.label,
                data: totalAppearances,
                backgroundColor: this.gradient
                }],
            },
            this.options
        )

  }
}
</script>
