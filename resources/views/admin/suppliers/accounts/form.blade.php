<input type="hidden" name="supplier" value="{{$supplier->id}}">
<div class="row">
  <div class="col-sm-4">
    <label for="">Р/c IBAN</label>
    <input type="text" class="form-control" name="bank_account" placeholder="Р/c IBAN" value="{{$account->bank_account ?? ""}}" required>
  </div>
  <div class="col-sm-6">
    <label for="">Реквизиты банка</label>
    <input type="text" class="form-control" name="bank" placeholder="Реквизиты банка" value="{{$account->bank?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <br>
    <input class="btn btn-primary" type="submit"  value="Сохранить">
  </div>

    </div>
