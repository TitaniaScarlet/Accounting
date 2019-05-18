@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список категорий @endslot
        @slot('parent') Главная @endslot
          @slot('active') Категории @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.category.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Создать категорию</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @include('admin.categories.partials.category_index')
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">
                  <ul class="pagination float-right">
                    {{$categories->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
