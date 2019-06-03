@foreach ($subdivisions as $subdivision)
  <option value="{{$subdivision->id ?? ""}}"
    @isset($transference->subdivision)
@foreach ($transference->subdivisions as $subdivision_transference)
@if ($transference->id == $subdivision_transference->id)
selected = "selected"
@endif
@endforeach
    @endisset

>
{{$subdivision->name ?? ""}}
</option>
@endforeach
