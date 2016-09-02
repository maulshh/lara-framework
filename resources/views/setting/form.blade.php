<form id="{{$form_id or "form-setting"}}" method="POST"
      action="{{url(isset($form_action) ? $form_action : 'setting')}}">
    
    {{csrf_field()}}
    {{method_field(isset($form_method) ? $form_method : 'POST')}}
    
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" required="required" name="name" type="text"
               placeholder="" value="{{$setting->name or old('name')}}">
    </div>
    <div class="form-group">
        <label for="body">Label</label>
        <input class="form-control" id="label" name="label" type="text" required="required"
               value="{{$setting->label or old('label')}}">
    </div>
    <div class="form-group">
        <label for="body">Type</label>
        <select class="form-control" id="type" name="type" required="required"
               value="{{$setting->type or old('type')}}">
            <option value="string">String</option>
            <option value="number">Integer</option>
            <option value="text">Text</option>
            <option value="date">Date</option>
        </select>
    </div>
    <div class="form-group">
        <label for="body">Module</label>
        <input class="form-control" id="module" name="module" type="text" required="required"
               value="{{$setting->module or old('module')}}">
    </div>

    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@include('layouts.errors')