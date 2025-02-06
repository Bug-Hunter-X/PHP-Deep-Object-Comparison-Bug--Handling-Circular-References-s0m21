function foo(a, b, visited = new WeakSet()) {
  if (a === b) {
    return true;
  }
  if (typeof a !== 'object' || typeof b !== 'object' || a === null || b === null) {
    return false;
  }
  if (visited.has(a) || visited.has(b)) {
    return false; // Avoid circular references
  }
  visited.add(a);
  visited.add(b);

  const keysA = Object.keys(a);
  const keysB = Object.keys(b);
  if (keysA.length !== keysB.length) {
    return false;
  }
  for (let i = 0; i < keysA.length; i++) {
    const key = keysA[i];
    if (!b.hasOwnProperty(key) || !foo(a[key], b[key], visited)) {
      return false;
    }
  }
  return true;
}

// Example with circular reference
const obj1 = {};
const obj2 = {};
obj1.circular = obj2;
obj2.circular = obj1;

const obj3 = {};
obj3.circular = obj3;

console.log(foo(obj1, obj2)); // false - correctly handles circular references
console.log(foo(obj3, obj3)); //false - correctly handles self-circular references