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
            </thead>
            <tbody>
              @forelse ($vats as $vat)
                <tr>
                  <td>{{$vat->date}}</td>
                  <td>{{$vat->vat_rate}}</td>
                  <td>{{$vat->vat_input}}</td>
                  <td>{{$vat->vat_output}}</td>
                  <td>
@foreach ($transferences as $transference)
@if ($vat->vatable == $transference)
  <a href="{{route('admin.transference.show', $transference)}}">{{$transference->ttn->number}}</a>
@endif
@endforeach
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
