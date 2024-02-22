@props(['id', 'label', 'placeholder', 'type'])

<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <input type="{{$type ?? 'text'}}"
           class="form-control"
           id="{{$id}}"
           placeholder="{{$placeholder ?? 'Enter...'}}"
    >
</div>
