@foreach ($suppliers as $supplier)
  <option value="{{$supplier->id ?? ""}}"
    @isset($transference->supplier)
@foreach ($transference->suppliers as $supplier_transference)
@if ($transference->id == $supplier_transference->id)
selected = "selected"
@endif
@endforeach
    @endisset

>
{{$supplier->title ?? ""}}
</option>
@endforeach
