<option selected disabled hidden>Select a Category..</option>
@foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
@endforeach