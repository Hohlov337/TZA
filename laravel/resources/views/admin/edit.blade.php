@extends('admin.layout.schema')
@foreach($result as $el)

    @section('title','Edit '.$el->name);

@section('admin_content')
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Додавання студента</h4>
        <form action="{{route('course.update',['id'=>$el->id])}}" method="post">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Ім'я студента</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$el->name}}"
                           required="">
                    <div class="invalid-feedback">
                        Valid student name is required.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="course_type" class="form-label">Тип курсу</label>
                    <select name="course_type" id="course_type" class="form-control" required>
                        @foreach($courses as $course)
                            <option value='{{ $course->id }}'>{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid course type required.
                    </div>
                </div>
                <div class="col-12">
                    <label for="course_name" class="form-label">Назва курсу</label>
                    <input type="text" class="form-control" id="course_name" name="course_name"
                           value="{{$el->course_name}}" required>
                    <div class="invalid-feedback">
                        Valid course name required.
                    </div>
                </div>
                <div class="col-12">
                    <label for="date" class="form-label">Дата початку</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$el->date}}" required>
                    <div class="invalid-feedback">
                        Valid course date required.
                    </div>
                </div>

                <button class=" btn btn-primary" type="submit">Редагувати</button>
                <a href="{{route('course.index')}}" class="btn btn-secondary">На головну</a>
            </div>
        </form>
    </div>
    </form>
@endsection
@endforeach

