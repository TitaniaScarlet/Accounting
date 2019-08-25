@foreach ($subdivisions as $subdivision)
  <option value="{{$subdivision->id ?? ""}}"
    @isset($transference->subdivisions)
@foreach ($transference->subdivisions as $subdivision_transference)
@if ($subdivision->id == $subdivision_transference->id)
selected = ""
@endif
@endforeach
    @endisset
>
{{$subdivision->name ?? ""}}
</option>
@endforeach
