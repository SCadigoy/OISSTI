<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md flex-shrink-0">
        <div class="p-6 text-xl font-bold border-b">Hotel Admin</div>
        <nav class="p-6">
            <ul class="space-y-2">
                <li><a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Dashboard</a></li>
                <li><a href="{{ route('users.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Users</a></li>
                <li><a href="{{ route('room_types.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Room Types</a></li>
                <li><a href="{{ route('rooms.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Rooms</a></li>
                <li><a href="{{ route('guests.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Guests</a></li>
                <li><a href="{{ route('reservations.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Reservations</a></li>
                <li><a href="{{ route('housekeeping_tasks.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Housekeeping Tasks</a></li>
                <li><a href="{{ route('maintenance_tickets.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Maintenance Tickets</a></li>
                <li><a href="{{ route('folios.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Folios</a></li>
                <li><a href="{{ route('folio_transactions.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Folio Transactions</a></li>
                <li><a href="{{ route('feedback.index') }}" class="block py-2 px-3 rounded hover:bg-gray-200">Feedback</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Top navigation -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">@yield('title', 'Dashboard')</h1>
            <div>
                <span class="mr-4">Hello, {{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-500 hover:underline">Logout</button>
                </form>
            </div>
        </header>

        <!-- Page content -->
        <main class="flex-1 p-6 overflow-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>
