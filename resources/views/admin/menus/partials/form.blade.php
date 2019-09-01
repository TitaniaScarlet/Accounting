<div class="row">
  <div class="col-sm-6">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Заголовок категориии" value="{{$menu->title ?? ""}}" required>
  </div>
  <div class="col-sm-6">
    <label for="">Родительская категория</label>
    <select type="text" class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.menus.partials.menus', ['menus' => $menus])
    </select>
  </div>
  </div>
  <input type="hidden" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$menu->slug ?? ""}}" readonly="" >
<br>
<div class="row">
  <div class="col-sm-2">
    <label for="">Количество</label>
    <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$menu->quantity ?? ""}}">
  </div>
  <div class="col-sm-2">
    <label for="">Еденица измерения</label>
      <select class="form-control" name="unit">
        <option value=""></option>
        @foreach ($units as $unit)
                    <option value="{{$unit->id ?? ""}}"
                @isset($menu->unit_id)

                  @if ($menu->unit_id == $unit->id)
              selected=""
                  @endif
            @endisset
            >{{$unit->type ?? ""}}</option>
        @endforeach
        </select>
  </div>
  <div class="col-sm-3">
    <label for="">Цена</label>
    <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$menu->price ?? ""}}">
  </div>
  <div class="col-sm-2">
    <label for="">Ставка НДС, %</label>
    <input type="text" class="form-control" name="vat_rate" placeholder="Ставка НДС, %" value="{{$menu->vat_rate ?? ""}}">
  </div>
  <div class="col-sm-3">
    <label for="">НДС, р</label>
    <input type="text" class="form-control" name="vat_sum" placeholder="НДС, р" value="{{$menu->vat_sum ?? ""}}">
  </div>
</div>
