<nav class="main-header navbar navbar-expand navbar-white navbar-light bg-teal">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <div class="mt-2 px-2 text-dark">@yield('header-title')</div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge" id="notification-count">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header" id="notification-header">0 Notifications</span>
                <div style="max-height: 200px; overflow-y: scroll">
                    <div class="dropdown-divider"></div>
                    <div id="notification-list"></div>
                    <div class="dropdown-divider"></div>
                </div>
                <a href="{{ Request::is('history') ? '#' : route('history') }}"
                    class="dropdown-item dropdown-footer">See
                    All Notifications</a>
            </div>
        </li>
        @endauth
        <li class="nav-item">
            @auth
            <form action="/logout" method="post" class="action">
                @csrf
                <button class="btn" type="submit">
                    <i class="fas fa-sign-out-alt mr-1"></i>
                    Sign Out
                </button>
            </form>
            @else
            <button class="btn" type="submit"><a href="/login" class="text-dark">
                    <i class="fas fa-sign-in-alt mr-1"></i>
                    Sign In
                </a>
            </button>

            @endauth
        </li>
    </ul>
</nav>

@push('scripts')
<script>
    $(document).ready(function() {
        function fetchNotifications() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/alerts',
                method: 'GET',
                success: function(response) {
                    var alerts = response.data.filter(alert => alert.id); // Filter out empty objects
                    var notificationCount = alerts.length;
                    $('#notification-count').text(notificationCount);
                    $('#notification-header').text(notificationCount + ' Notifications');
                    var notificationList = $('#notification-list');
                    notificationList.empty();
                    
                    alerts.forEach(function(alert) {
                        var notificationItem = `
                            <div class="dropdown-item">
                                Device ${alert.device} is missing!
                                <span class="float-right text-muted text-sm">${new Date(alert.created_at).toLocaleTimeString()}</span>
                            </div>
                            <div class="dropdown-divider"></div>
                        `;
                        notificationList.append(notificationItem);
                    });
                }
            });
        }

        // Fetch notifications on page load
        fetchNotifications();

        // Optionally, you can set an interval to fetch notifications periodically
        setInterval(fetchNotifications, 1000); // Fetch every 60 seconds
    });
</script>
@endpush