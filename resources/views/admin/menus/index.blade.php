@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список категорий меню@endslot
        @slot('parent') Главная @endslot
          @slot('active') Меню @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.menu.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Создать категорию</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th>Цена, р.</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @include('admin.menus.partials.menu_index')
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <ul class="pagination float-right">
                    {{$menus->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
