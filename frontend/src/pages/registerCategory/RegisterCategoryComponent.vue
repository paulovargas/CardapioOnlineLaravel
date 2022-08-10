<template>
  <DashboardComponent>
    <div class="content-pages">
      <slot>
        <h1 class="p-2">Cadastrar Categoria</h1>
      </slot>
    </div>
  </DashboardComponent>
</template>

<script>
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  components: {
    DashboardComponent,
  },
};
</script>
<style scoped></style>
