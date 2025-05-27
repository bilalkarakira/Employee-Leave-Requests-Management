<!DOCTYPE html>
<html>
<head>
    <title>Create Leave Request</title>
</head>
<body>
    <h1>Create Leave Request</h1>

    @if(session('message'))
        <p style="color: green">{{ session('message') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leave-request.store') }}" method="POST">
        @csrf

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" required><br><br>

        <label for="reason">Reason:</label>
        <textarea name="reason" id="reason" required></textarea><br><br>

        <button type="submit">Submit Leave Request</button>
    </form>
</body>
</html>