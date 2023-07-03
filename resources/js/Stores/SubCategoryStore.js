import { defineStore } from "pinia";
import { group } from "radash";

export const useSubCategoryStore = defineStore("subCategory", {
  // arrow function recommended for full type inference
  state: () => {
    return {
      subCategories: null,
      groupByCategory: null,
    };
  },
  actions: {
    async getSubCategories() {
      try {
        const response = await axios.get(route("subCategories.index"));
        this.subCategories = response.data;
        this.groupByCategory = await group(
          this.subCategories,
          (f) => f.category_id
        );
      } catch (error) {
        console.error(error);
      }
    },
  },
});
