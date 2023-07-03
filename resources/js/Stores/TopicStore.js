import { defineStore } from "pinia";
import { group } from "radash";

export const useTopicStore = defineStore("topic", {
  // arrow function recommended for full type inference
  state: () => {
    return {
      topics: null,
      groupBySubCategory: null,
      groupByCategory: null,
    };
  },
  actions: {
    async getTopics() {
      try {
        const response = await axios.get(route("topics.index"));
        this.topics = response.data;
        this.groupBySubCategory = await group(
          this.topics,
          (f) => f.sub_category_id
        );
        this.groupByCategory = await group(
          this.topics,
          (f) => f.subCategory.category_id
        );
      } catch (error) {
        console.error(error);
      }
    },
  },
});
