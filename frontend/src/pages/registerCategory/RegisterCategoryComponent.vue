<template>
  <DashboardComponent>
    
    <div class="content-pages">
      <h1 class="p-2">Cadastrar Categoria</h1>
      <slot>
        <div >        
        <div class="d-flex p-3">
          <form @submit.stop.prevent="submit">            
            <div class="form-group">
              <label for="exampleInputEmail1">Descrição</label>
              <input
                v-model="description"
                type="text"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Categoria"
              />
            </div>           
            <div class="form-check"></div>
            <div class="">
              <button
              type="submit"
              class="btn"
            >
              Salvar
            </button>
            </div>
            
          </form>
        </div>
      </div> </slot>
    </div>
  
  </DashboardComponent>
</template>

<script>
//import api from "@/api";
//import axios from "axios";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  name: "RegisterCategoryComponent",
  data() {
    return {
      description: '',
    };
  },
  methods: {     
    submit() {
      const payload = {
        description: this.description,
      };

      fetch(`http://localhost:8000/api/category`, {
        method: 'POST',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => {
        console.log(res)
        console.log(payload)
      })
    },
  
  },
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped>
.btn{
  color: #fff;
  background-color: red;
}
</style>
