<template>
  <div class="container">
    <h5>Р/с: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>
      <div class="row">
        <div class="col-sm-4">
          <label>р/с IBAN</label>
          <input type="text" class="form-control" name="account" placeholder="р/с IBAN" v-model="account">
        </div>
        <div class="col-sm-8">
          <label>Реквизиты банка</label>
          <input type="text" class="form-control" name = "bank" placeholder="Номер телефона" v-model="bank">
        </div>
      </div>
    </br>

  <br>
</div>
</template>

<script>
export default {
  props: ['supplier'],
  data: function() {
    return {
      account: '',
      bank: '',
    };
  },
  methods: {
    add: function() {
      axios({
        method: 'post',
        url: '/admin/account',
        params: {account: this.account, bank: this.bank, supplier: this.supplier}
      }).then((response) => {
      });
    },
  }
}
</script>
