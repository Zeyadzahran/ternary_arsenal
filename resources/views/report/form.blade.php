@extends('layouts.app')

@section('content')
<style>
    .report-form {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background-color: #637f7f;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .report-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .report-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #444;
    }

    .report-form input[type="text"],
    .report-form input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #bfaeae;
        border-radius: 8px;
    }

    .report-form button {
        width: 100%;
        padding: 10px;
        background-color: #004aad;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .report-form button:hover {
        background-color: #003080;
    }
</style>
<form action="{{ route('report.send') }}" method="POST" class="report-form">
        @csrf
        <h2>Request Report</h2>

        <label for="name">My Name</label>
        <input type="text" name="name" placeholder="e.g. Sarah Connor" required>

        <label for="email">Sender Email</label>
        <input type="email" name="email" placeholder="e.g. sarah@example.com" required>

        <button type="submit">Send Report</button>
</form>

@endsection
