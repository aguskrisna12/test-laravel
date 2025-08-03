<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background-color: #34495e;
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        
        .header h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        
        .nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .nav a:hover {
            background-color: #2c3e50;
        }
        
        .nav a.active {
            background-color: #3498db;
        }
        
        .content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .filters {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .filters .form-group {
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 0;
        }
        
        .filters .form-group label {
            display: inline-block;
            margin-right: 10px;
        }
        
        .filters .form-group select,
        .filters .form-group input {
            width: auto;
        }
        
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        
        .pagination a {
            color: #3498db;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 4px;
        }
        
        .pagination a.active {
            background-color: #3498db;
            color: white;
            border: 1px solid #3498db;
        }
        
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>Test Bookstore Management System</h1>
            <nav class="nav">
                <a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.index') ? 'active' : '' }}">Books List</a>
                <a href="{{ route('authors.top') }}" class="{{ request()->routeIs('authors.top') ? 'active' : '' }}">Top Authors</a>
                <a href="{{ route('ratings.create') }}" class="{{ request()->routeIs('ratings.create') ? 'active' : '' }}">Rate Books</a>
            </nav>
        </div>
    </div>
    
    <div class="container">
        <div class="content">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>
</body>
</html> 