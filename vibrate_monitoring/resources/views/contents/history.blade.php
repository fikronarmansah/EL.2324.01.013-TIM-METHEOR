@extends('layouts.main')

@section('header-title')
{{ $header }}
@endsection
@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center pt-2">
        <div class="col-md-6 col-sm-6">
            <div class="card">
                <div class="card-header bg-secondary">
                    <form>
                        @csrf
                        <div class="form-row">
                            <div class="col-3">
                                {{-- <label for="device">Date</label> --}}
                                <input type="date" class="form-control" name="date" placeholder="First name">
                            </div>
                            <div class="col-3">
                                {{-- <label for="device">Device</label> --}}
                                <label class="mr-sm-2 sr-only" for="device">Preference</label>
                                <select class="custom-select mr-sm-2" id="device" name="device">
                                    <option value="" selected>Choose...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div class="col">
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 400px;overflow: auto;display:inline-block;">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Device</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($dataLogs as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->device }}</td>
                                    <td>{{ $data->value === 0 ? "Off" : "On" }}</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Data Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <canvas id="myChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="card">
                <div class="card-header bg-warning ">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div>
                            <h5><strong>Notification</strong></h5>
                        </div>
                        <div>
                            <button class="btn btn-danger" id="deleteAllBtn">Delete All</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-height: 700px;overflow: auto;display:inline-block;">
                        <table class="table table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Device</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="alert-table-body" class="text-center">
                                @forelse ($dataAlerts as $data)
                                <tr id="alert-{{ $data->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->device }}</td>
                                    <td>{{ $data->active === 0 ? "Off" : "On" }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        <button class="btn btn-info update-status" data-id="{{ $data->id }}">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr id="no-data">
                                    <td colspan="5">No Data Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let dataLogs  = <?php echo json_encode($dataLogs); ?>;
    console.log("🚀 ~ dataLogs:", dataLogs)
    
    // Membuat array labels dan data
    const barPerLabels = dataLogs.map(item => {
        const date = new Date(item.created_at);
        date.setHours(date.getHours() - 7); // Mengurangkan 7 jam dari waktu
        return date.toLocaleTimeString();
    });
    const dataChart = dataLogs.map(item => item.value);

    const barPerData = {
        labels: barPerLabels,
        datasets: [{
                label: "Device 1",
                data: dataChart,
                backgroundColor: "#a14f65",
                borderColor: "#a14f65",
                borderwidth: 1,
                tension: 0,
                pointRadius: 1
            }]
    };

    const barPerConfig = {
        type: 'line',
        data: barPerData,
        options: {
            animation: true,
            maintainAspectRatio: false,
            plugins: {
                legend:{
                    display: true,
                },
                title: {
                display: true,
                    text: 'Vibrate Monitoring'
                },
                // zoom: {
                //     pan: {
                //         enabled: true,
                //     },
                //     zoom: {
                //         wheel: {
                //             enabled: true,
                //             modifierKey: 'ctrl',
                //         },
                //         pinch: {
                //             enabled: true,
                //         }
                //     }
                // }
            },
            scales: {
                x: {
                    display: true,
                    // min: setTime2HourBefore,
                    // max: setTime1HourAfter,
                    // type: 'time',
                    // time: {
                    //     unit: "minute",
                    //     displayFormats: {
                    //         hour: 'HH:mm',
                    //         minute: 'HH:mm'
                    //     }
                    // },
                },
                y: {
                    display: true,
                    max: 2,
                    ticks: {
                        stepSize: 0.1,
                    }
                },
            },
        }
    };

    const barPer = new Chart(
        document.getElementById('myChart'),
        barPerConfig
    );
</script>

<script>
    $(document).ready(function() {
        // Handler untuk klik tombol update status
        $('.update-status').on('click', function() {
            var alertId = $(this).data('id');
            
            $.ajax({
                url: '/api/alerts/' + alertId + '/update',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Laravel CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        // Remove row from table
                        $('#alert-' + alertId).remove();
                        
                        // Check if the table body is empty
                        if ($('#alert-table-body').children().length === 0) {
                            $('#alert-table-body').append(`
                                <tr id="no-data">
                                    <td colspan="5">No Data Found</td>
                                </tr>
                            `);
                        }
                    } else {
                        Swal.fire('Error', 'Failed to update the alert status', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Failed to update the alert status', 'error');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Fungsi untuk menghapus semua notifikasi
        $('#deleteAllBtn').click(function () {
            // Lakukan AJAX request
            $.ajax({
                url: '/api/deleteAllNotifications',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (data) {
                    // Jika request berhasil
                    if (data.success) {
                        // Hapus semua notifikasi dari DOM
                        $('#alert-table-body').html('<tr id="no-data"><td colspan="5">No Data Found</td></tr>');
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

@endpush