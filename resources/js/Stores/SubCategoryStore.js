import { defineStore } from "pinia";
import { useGroupArrayByKey } from "../Composables/GroupArrayByKey";

export const useSubCategoryStore = defineStore("subCategoryStore", {
  // arrow function recommended for full type inference
  state: () => {
    return {
      subCategories: null,
      groupedSubCategories: null,
    };
  },
  actions: {
    async getSubCategories() {
      try {
        const response = await axios.get(route("subCategories.index"));
        this.subCategories = response.data;
        this.groupedSubCategories = await useGroupArrayByKey(
          response.data,
          "category_id"
        );
      } catch (error) {
        console.error(error);
      }
    },
  },
});
