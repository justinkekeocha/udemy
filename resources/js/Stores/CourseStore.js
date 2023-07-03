import { defineStore } from "pinia";
import { group } from "radash";

export const useCourseStore = defineStore("course", {
  // arrow function recommended for full type inference
  state: () => {
    return {
      courses: null,
      groupBySubCategory: null,
    };
  },
  actions: {
    async getCourses() {
      try {
        const response = await axios.get(route("courses.index"));
        this.courses = response.data;
        this.groupBySubCategory = await group(
          this.courses,
          (f) => f.sub_category_id
        );
      } catch (error) {
        console.error(error);
      }
    },
  },
});
