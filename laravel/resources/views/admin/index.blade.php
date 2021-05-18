@extends('admin.layout.schema')

@section('title','Admin page')

@section('admin_content')
    @if(isset($data))
        <table border="2" class="w-100">
            <thead>
            <tr>
                <th>Ім'я відвідувача</th>
                <th>Тип курсу</th>
                <th>Назва курсу</th>
                <th>Дата початку</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->c_name}}</td>
                    <td>{{$row->course_name}}</td>
                    <td>{{$row->date}}</td>
                    <td>
                        <a href="{{route('course.edit',['id' => $row->id]) }}" class="btn btn-warning" style="width: 125px">Редагувати</a>
                        <form action="{{ route('course.destroy' , $row->id)}}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" style="width: 125px">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
