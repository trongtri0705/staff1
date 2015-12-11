@foreach ($level as $key => $value)
    @if($key%3==1) 
        <?php $color = 'colored-success';?>
    @elseif($key%3==2) 
        <?php $color = 'colored-danger';?> 
    @else 
        <?php $color = 'colored-primary';?>
    @endif
<div class="radio">
    <label>
        <input value="{{$value->id}}" name="rdbLevel" checked="@if($value->id==$staff->level_id) {{ 'checked'}}@endif" type="radio" class="{{$color}}">
        <span class="text">{{$value->name}}</span>
    </label>
</div>
@endforeach