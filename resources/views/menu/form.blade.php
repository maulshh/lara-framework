<form id="{{$form_id or "form-menu"}}" method="POST" action="{{url(isset($form_action) ? $form_action : 'menu')}}">

    {{csrf_field()}}
    {{method_field(isset($form_method) ? $form_method : 'POST')}}

    <div class="form-group">
        <label for="name">Nama</label>
        <input class="form-control" id="name" required="required" name="name" type="text"
               placeholder="Isi nama sesuai naming-convention pada route laravel"
               value="{{$menu->name or old('name')}}">
    </div>
    <div class="form-group">
        <label for="module_target">Module Target</label>
        <input class="form-control" id="module_target" required="required" name="module_target" type="text"
               value="{{$menu->module_target or old('module_target')}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <input class="form-control" id="body" name="body" type="text" required="required"
               value="{{$menu->body or old('body')}}">
    </div>
    <div class="form-group">
        <label for="uri">Uri</label>
        <input class="form-control" id="uri" name="uri" type="text" value="{{$menu->uri or old('uri')}}">
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" id="title" name="title" type="text" value="{{$menu->title or old('title')}}">
    </div>
    <div class="form-group">
        <label for="icon">Icon
            <small class="help">
                <a target="_blank" href="https://almsaeedstudio.com/themes/AdminLTE/pages/UI/icons.html">list of
                    icons</a>
            </small>
        </label>
        <input class="form-control" id="icon" name="icon" type="text" value="{{$menu->icon or old('icon')}}">
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" id="type" class="form-control" required="required" value="{{$menu->type or old('type')}}">
            <option value="default" selected="selected">Default</option>
            <option value="parent">Parent</option>
            <option value="separator">Separator</option>
        </select>
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input class="form-control" id="position" name="position" type="text" required="required"
               value="{{$menu->position or old('position')}}">
    </div>

    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit Menu</button>
    </div>
</form>

@include('layouts.errors')

{{--Javascript TODO
    ketika type diubah, position harus berubah juga.
    position untuk yg bertipe parent harus mengandung "-", contoh: 2-4, 3.4-4, dll
--}}

