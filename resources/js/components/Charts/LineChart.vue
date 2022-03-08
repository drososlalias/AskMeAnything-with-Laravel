<script>
import { Line } from 'vue-chartjs'

export default {
  extends: Line,
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
        this.gradient.addColorStop(0, 'rgba(0, 0,255, 0.5)')
        this.gradient.addColorStop(0.5, 'rgba(0, 0, 255, 0.25)');
        this.gradient.addColorStop(1, 'rgba(0, 0, 255, 0)');
  
        const dates = this.chartData.map(d => d.date).reverse()
        const totalPosts = this.chartData.map(d => d.total).reverse()

        this.renderChart({
            labels: dates,
            datasets: [{
                label: this.label,
                data: totalPosts,
                backgroundColor: this.gradient
                }],
            },
            this.options
        )

  }
}
</script>
