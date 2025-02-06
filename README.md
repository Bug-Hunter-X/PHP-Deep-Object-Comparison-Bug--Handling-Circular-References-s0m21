# PHP Deep Object Comparison Bug: Handling Circular References

This repository demonstrates a common bug in PHP when recursively comparing objects for deep equality. The bug occurs when dealing with objects that contain circular references, leading to infinite recursion and a stack overflow error.

## Bug Description

The provided `foo()` function attempts to perform a deep comparison of two objects.  However, it lacks a mechanism to detect and handle circular references. This means if object A references object B, and object B references object A, the function will enter an infinite loop, eventually causing a stack overflow.

## How to Reproduce

1. Clone this repository.
2. Run `bug.php`.  You'll observe a stack overflow error.
3. Run `bugSolution.php` to see the corrected implementation.

## Solution

The solution involves tracking visited objects using a `WeakSet`. This allows the function to efficiently detect and avoid circular references, preventing infinite recursion.