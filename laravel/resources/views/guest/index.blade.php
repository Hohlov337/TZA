@extends('guest.layout.schema')

@section('title','Main page');

@section('content')
    <div class="mb-2">
        <form action="{{route('post_index')}}" method="POST">
            @csrf
            <select name="sort" id="sort" style="height: 30px">
                <option value="1">За ім'ям студента</option>
                <option value="2">За назвою курсу</option>
                <option value="3">За датою</option>
            </select>
            <button style="height: 30px">сортувати</button>
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


