<option value="{{$event->category->category_id ?? 'null'}}" selected disabled hidden>{{$event->category->category_name ?? 'Select a Category..'}}</option>
@foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
@endforeach