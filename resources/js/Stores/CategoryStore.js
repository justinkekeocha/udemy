import { defineStore } from 'pinia'

export const useCategoryStore = defineStore('categoryStore', {
  // arrow function recommended for full type inference
  state: () => {
    return {
      categories : null
    }
  },
  actions: {
      async getCategories() {
         try {
         const response = await axios.get(route("category.index"))
         this.categories = response.data
         } catch (error) {
         console.error(error);
         }
      }
  }
})