@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">


    @component('admin.components.breadcrumb')
      @slot('title') Список НДС @endslot
        @slot('parent') Главная @endslot
          @slot('active') НДС @endslot
          @endcomponent



          <table class="table table-striped">
            <thead>
              <th>Дата</th>
              <th>Ставка НДС, %</th>
              <th>НДС входной, р</th>
              <th>НДС выходной, р</th>
              <th>Документ-основание</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($vats as $vat)
                <tr>
                  <td>{{$vat->date}}</td>
                  <td>{{$vat->vat_rate}}</td>
                  <td>{{$vat->vat_input}}</td>
                  <td>{{$vat->vat_output}}</td>
                  <td>
@foreach ($ttnproducts as $ttnproduct)
@if ($vat->vatable == $ttnproduct)
  <a href="{{route('admin.ttn.show', $ttnproduct->ttn)}}">{{$ttnproduct->ttn->number}}</a>
@endif
@endforeach
@foreach ($costs as $cost)
  @if ($vat->vatable == $cost)
    <a href="{{route('admin.cost.show', $cost)}}">{{$cost->number}}</a>
  @endif
@endforeach
                  </td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.vat.destroy', $vat)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      {{-- <a href="{{route('admin.ttn.edit', $ttn)}}"><i class="far fa-edit"></i></a> --}}
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="9">
                  <ul class="pagination float-right">
                    {{$vats->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
