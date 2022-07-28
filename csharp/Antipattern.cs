using System;

namespace demo_csharp;

internal class Foo
{
    public object? Bar;
}

class Person
{
    private string _name;
    // Same as auto-property.
    public string Name
    {
        get
        {
            return _name;
        }

        set
        {
            _name = value;
        }
    }
}


internal class Antipattern
{
    public static void CommonAntipatterns()
    {
        var arr = new[] {1, 2, 3, 4, 5};
        // CS-R1019: `arr[arr.Length - 1]` can be rewritten as `arr[^1].`
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1019
        var last = arr[arr.Length - 1];

        var emptyString = string.Empty;
        // CS-R1014: Use `string.IsNullOrEmpty` or `string.IsNullOrWhiteSpace` to check for empty strings.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1014
        if (emptyString == "")
        {
            Console.WriteLine("String is empty!");
        }

        // CS-R1046: Rewrite `arr.Where(x => x % 3 == 0).Count()` as `arr.Count(x => x % 3 == 0)`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1046
        var threeMultiples = arr.Where(x => x % 3 == 0).Count();

        // CS-R1047: Use `T?` instead of `Nullable<T>`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1047
        Nullable<int> i = null;

        // CS-R1024: Use `null-coalescing` operator, i.e. rewrite as `i ?? 1`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1024
        var value = i != null ? i : 1;

        // CS-R1007: Use `Guid.Empty` instead.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1007
        var guid = new Guid();

        var s1 = "alpha";
        var s2 = "Alpha";

        // CS-R1017: Inefficient case insensitive comparison.
        // Should be rewritten as `string.Equals(s1, s2, StringComparison.OrdinalIgnoreCase)`
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1017
        var caseInsensitiveCmp = s1.ToLower() == s2.ToLower();

        // CS-R1045: Explicit array size is redundant when initialized in place.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1045
        var odd = new int[] {1, 3, 5, 7, 9};

        Foo? f = null;
        // CS-R1040: Null check can be collapsed and written as `f?.Bar == null`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1040.
        if (f == null || f.Bar == null)
        {
            //
        }

        // CS-R1043: `null` check is redundant when used in combination with `is`.
        // The condition can be simply written as `f is Foo`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-R1043.
        if (f != null && f is Foo)
        {

        }
        
        object o = new Foo();
        var foo = o as Foo;
        if (foo != null)
        {
            //
        }
        
        var smtp = new SmtpClient("host", 25);
        smtp.EnableSsl = true;
    }
}
