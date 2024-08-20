<div class="page-wrapper" style="margin-top:30px;">

    <h1>Thống kê đơn hàng</h1>
    <?php $total_don = 0; foreach($list_tk as $row){
        echo "Trạng thái: " . $row['trang_thai'] . " - Tổng số đơn: " . $row['total'] . "<br>";
        $total_don += $row['total'];
    }
    echo "Tổng số đơn của cửa hàng: " . $total_don . "<br>";
    
    ?>
     <!-- echo "<pre>";
     print_r($list_tk);
     echo "</pre>";  -->
    

    <?php  
    $total_tien = 0; foreach($tien as $item){
        
            $total_tien += $item['total'];
        
        $labels[] = $item['trang_thai'];
        $data[] = $item['total'];
    };
        echo "Tổng số tiền dự kiến  : " . number_format($total_tien,'0','','.') . " VND <br>";
    

    // echo "<pre>";
    // print_r($tien);
    // echo "</pre>";
    ?>
     <canvas id="myChart" width="400" height="200"></canvas>
    
</div>
<script>
        // Lấy dữ liệu từ PHP
        var labels = <?php echo json_encode($labels); ?>;
        var data = <?php echo json_encode($data); ?>;

        // Cấu hình biểu đồ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Lợi nhuận (VND)',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    </script>