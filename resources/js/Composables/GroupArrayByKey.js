// by convention, composable function names start with "use"
export function useGroupArrayByKey(array, key) {
  return array.reduce((result, obj) => {
    const keyValue = obj[key];
    //console.log(keyValue.id);

    if (!result[keyValue]) {
      result[keyValue] = [];
    }

    result[keyValue].push(obj);

    return result;
  }, {});
}
