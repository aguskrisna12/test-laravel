@extends('layouts.app')

@section('content')
    <h2>List of top 10 most famous author, order by vote</h2>
    <p style="color: red; margin-bottom: 20px;"><strong>Notes:</strong> just for voter with rating greater than 5</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $index => $author)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ number_format($author->voter_count) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">No authors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection 