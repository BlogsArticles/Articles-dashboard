<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/sidebar.php') ?>
<?php require('partials/banner.php') ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    <section class="content">
        <div class="container-fluid">
            <h1>Statistics</h1>
        </div>

        <div class=" container d-flex justify-content-center">

            <canvas id="myChart" class="w-75"></canvas>
    
        </div>
    </section>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  Chart.defaults.font.size = 20;
  const ctx = document.getElementById('myChart');
  function setBg() {
    let colors=[];
    let count=+<?=count($count)?>;
    for(let i =0;i<count;i++){
      colors.push("#"+Math.floor(Math.random()*16777215).toString(16))
    }
    return colors;
    
  }
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($name) ?>,
      datasets: [{
        label: '# of members',
        data: <?php echo json_encode($count) ?>,
        borderWidth: 1,
        borderColor: '#19376D',
        backgroundColor: setBg(),
      }]
    },
    options: {
      responsive:false,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>



<?php require('partials/footer.php') ?>