<form id="{{$form_id or "form-role"}}" method="POST"
      action="{{url(isset($form_action) ? $form_action : 'admin/role')}}">
    
    {{csrf_field()}}
    {{method_field(isset($form_method) ? $form_method : 'POST')}}
    
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" required="required" name="name" type="text"
               placeholder="" value="{{$role->name or old('name')}}">
    </div>
    <div class="form-group">
        <label for="body">Label</label>
        <input class="form-control" id="label" name="label" type="text" required="required"
               value="{{$role->label or old('label')}}">
    </div>

    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-{{TMP_COLOR}}">Submit</button>
    </div>
</form>

@include('layouts.errors')