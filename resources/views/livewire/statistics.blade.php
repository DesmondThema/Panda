<div
    class="mt-4"
    x-data="{
        init() {
            const ctx = this.$refs.canvas
            new Chart(ctx, {
            type: 'line',
            data: {
              labels: {{ Js::from($labels) }},
              datasets: [{
                label: '# of Sessions',
                data: {{ Js::from($sessions) }},
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        }
    }">
    <canvas id="myChart" x-ref="canvas"></canvas>
</div>

