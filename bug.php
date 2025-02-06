function foo(a, b) {
  if (a === b) {
    return true;
  }
  if (typeof a !== 'object' || typeof b !== 'object') {
    return false;
  }
  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false;
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key])) {
      return false;
    }
  }
  return true;
}

//Example
const obj1 = { a: 1, b: 2, c: { d: 3 } };
const obj2 = { a: 1, b: 2, c: { d: 3 } };
const obj3 = { a: 1, b: 2, c: { d: 4 } };
console.log(foo(obj1, obj2)); // true
console.log(foo(obj1, obj3)); // false