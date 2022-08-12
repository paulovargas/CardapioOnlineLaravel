<template>
  <DashboardComponent>
    <div class="content-pages">
      <slot>
        <h1 class="p-2">Cadastrar Cardápio</h1>
           <div >
        <div class="d-flex justify-content-center">
          <form>
            
           
          
            <div class="form-group">
              <label for="exampleInputEmail1">Imagem</label>
              <input
              @change="newfile"
                type="file"
                class="form-control"
                id="description"
                aria-describedby="description"
                placeholder="Descrição"
              />
            </div>
                      
            <div class="form-check"></div>
            <button
              type="submit"
              class="btn btn-primary"
              @click.prevent="submit"
            >
              Salvar prato !
            </button>
          </form>
        </div>
      </div> 
      </slot>
    </div>
  </DashboardComponent>
</template>

<script>
import api from "@/api";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  name: "ReservationComponent",
  data() {
    return {
      file: '',
      name: ''
    };
  },
 
 methods: {
  newfile(event){
    console.log(event)
    this.file = event.target.files[0]
  },    
    submit() { 
      var form = ''
      form = new FormData()
      form.append('imagem', this.file)
      form.append('name', this.name)
      console.log('form', form)

      api
      .post("upload", form)
      .then((res) => {
        this.menus = res.data;
        console.log('menus',this.menus)
      })
      .catch((error) => {
        console.log(error)
      });
/* 
      api.post('upload', form, {headers:{
        'Content-Type': 'multipart/form-data'
      }}).then((response) =>{console.log('Imagem: ',response)}) */
    },
  },
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped></style>
