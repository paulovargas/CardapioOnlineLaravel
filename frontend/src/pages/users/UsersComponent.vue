<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Usuários</h1>
      <slot></slot>
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
