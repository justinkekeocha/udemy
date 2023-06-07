// by convention, composable function names start with "use"
export function useGroupArrayByKey(array, key) {
  return array.reduce((result, obj) => {
    const keyValue = obj[key];

    if (!result[keyValue]) {
      result[keyValue] = [];
    }

    result[keyValue].push(obj);

    return result;
  }, {});
}


// data.reduce((result, obj) => {
//   const category = obj.category;
//   if (!result[category]) {
//     result[category] = [];
//   }
//   result[category].push(obj);
//   return result;
// }, {});