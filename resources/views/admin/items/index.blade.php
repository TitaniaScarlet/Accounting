@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список статей расходов @endslot
        @slot('parent') Главная @endslot
          @slot('active') Статьи расходов @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.item.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Создать статью расходов</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @include('admin.items.partials.item_index')
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">
                  <ul class="pagination float-right">
                    {{$items->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
