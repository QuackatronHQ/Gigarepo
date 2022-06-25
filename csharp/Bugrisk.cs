using System;

namespace demo_csharp;

internal class Bugrisk
{
    public static unsafe void CommonBugRiskPractices()
    {
        // CS-W1020: Calling `.ToString()` on an array does not stringify it.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-W1020
        var arr = new[] {1, 2, 3, 4, 5};
        Console.WriteLine($"Array is {arr.ToString()}");

        var name = "Joe";
        // CS-W1000: Missing arguments to interpolation.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-W1000
        var intro = $"My name is name";

        var pi = 3.14;
        // CS-W1003: Invalid comparison against `NaN`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-W1003
        var isNaN = pi == double.NaN;

        // CS-W1025: Potential memory leak inside `for` loop due to `stackalloc`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-W1025.
        for ( /* some condition */;;)
        {
            var buffer = stackalloc byte[16];
        }
    }
}
