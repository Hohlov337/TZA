@extends('guest.layout.schema')

@section('title','Find');

@section('content')
    <div class="d-flex justify-content-xl-center">
        <form action="{{route('show')}}" method="POST">
            @csrf
            <label for="name">Ім'я студента, що відвідує курс:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit">Пошук</button>
        </form>
    </div>
    @if(isset($data))
        <table border="2" class="w-100">
            <thead>
            <tr>
                <th>Ім'я відвідувача</th>
                <th>Назва курсу</th>
                <th>Дата початку</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->course_name}}</td>
                    <td>{{$row->date}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
