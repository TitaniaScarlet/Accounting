<template>
  <div class="container">
    <h5>Телефон: <button v-on:click="add" class="btn btn-default"><i class="fas fa-plus-circle"></i></button>
    </h5>

      <div class="row">
        <div class="col-sm-6">
          <label>Код</label>
          <input type="text" class="form-control" name="code" placeholder="Код" v-model="code">
        </div>
        <div class="col-sm-3">
          <label>Номер телефона</label>
          <input type="text" class="form-control" name = "number" placeholder="Номер телефона" v-model="number">
        </div>
        <div class="col-sm-3">
          <label>Оператор</label>
          <input type="text" class="form-control" name = "operator" placeholder="Оператор" v-model="operator">
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
      code: '',
      number: '',
      operator: ''
    };
  },
  methods: {
    add: function() {
      axios({
        method: 'post',
        url: '/admin/phone',
        params: {code: this.code, number: this.number, operator: this.operator, supplier: this.supplier}
      }).then((response) => {
        console.log(response)
      });
    },
  }
}
</script>
