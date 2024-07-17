@extends('layouts.main')

@section('header-title')
{{ $header }}
@endsection

@push('styles')
<style>
    .dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .dot-green {
        background-color: green;
    }

    .dot-red {
        background-color: red;
    }
</style>
@endpush

@section('contents')
<div class="container-fluid">
    <div class="row text-center p-3">
        <h4 id="status" class="col-md-12"></h4>
    </div>

    <div class="row">
        <!-- Kartu untuk Device 1 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-0">Device 1</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Kartu untuk Device 2 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-1">Device 2</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Ulangi struktur kartu untuk Device 3 hingga 15 -->
        <!-- Device 3 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-2">Device 3</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 4 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-3">Device 4</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 5 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-4">Device 5</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 6 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-5">Device 6</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 7 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-6">Device 7</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 8 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-7">Device 8</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 9 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-8">Device 9</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 10 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-9">Device 10</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 11 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-10">Device 11</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 12 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-11">Device 12</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 13 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-12">Device 13</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 14 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-13">Device 14</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
        <!-- Device 15 -->
        <div class="col-sm-1 col-md-3 bg-transparent">
            <div class="card">
                <div class="card-header text-center" id="card-14">Device 15</div>
                <div class="card-body text-center">
                    <h3 class="p-0 m-0">-</h3>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    var broker = "broker.emqx.io";
        var topics = ["vibrate1", "vibrate2", "vibrate3", "vibrate4", "vibrate5", "vibrate6", "vibrate7", "vibrate8", "vibrate9", "vibrate10", "vibrate11", "vibrate12", "vibrate13", "vibrate14", "vibrate15"];
        var clients = [];
        let alertSw = false;

        // Create MQTT clients for each topic
        topics.forEach(function (topic, index) {
            var client = new Paho.MQTT.Client(broker, 8083, "web-client-" + index);

            client.onConnectionLost = function (responseObject) {
                if (responseObject.errorCode !== 0) {
                    document.getElementById("status").innerHTML = '<span class="dot dot-red"></span>Connection lost: ' + responseObject.errorMessage;
                }
            };

            client.onMessageArrived = function (message) {
                var { sensorValue, Status } = JSON.parse(message.payloadString);
                var cardId = "card-" + index;
                var deviceName = "Device " + (index + 1);
                var card = document.getElementById(cardId);
                
                if (sensorValue === true && sensorValue !== alertSw ) {
                    showDeviceMissingAlert(`${deviceName} ${Status}!`)
                    alertSw = true;
                } else if (sensorValue === false) {
                    alertSw = false;
                }

                // Update card background color based on received value
                card.className = "card-header text-center"+ (sensorValue === false ? " bg-info" : " bg-red");

                // Update card body text based on received value
                card.nextElementSibling.querySelector("h3").innerHTML = Status;
            };

            client.connect({
                onSuccess: function () {
                    document.getElementById("status").innerHTML = '<span class="dot dot-green"></span>Connected to MQTT broker';
                    client.subscribe(topic);
                },
                onFailure: function (message) {
                    document.getElementById("status").innerHTML = '<span class="dot dot-red"></span>Connection failed: ' + message.errorMessage;
                }
            });

            clients.push(client);
        });

        function showDeviceMissingAlert(title) {
            // Swal.fire({
            //     icon: "warning",
            //     showConfirmButton: false,
            //     timer: 1500
            // });
            Swal.fire({
                position: "top-end",
                title: title,
                icon: "warning"
            });
        }

</script>
@endpush