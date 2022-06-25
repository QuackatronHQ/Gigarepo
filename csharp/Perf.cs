using System;
using System.Collections.Generic;

namespace demo_csharp;

internal class Perf
{
    public static void CommonPerfInefficientPractices()
    {
        var list = new List<string>
        {
            "alfa", "beta", "charlie", "delta"
        };

        // CS-P1006: Inefficient overload of `string.Contains`. Should be rewritten as `s.Contains('a')`.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-P1006
        if (list.Exists(s => s.Contains("a")))
            Console.WriteLine("There exists at least 1 string with 'a' in it.");

        var transformers = new Dictionary<string, string>
        {
            {"csharp", "dotnet-format"},
            {"go", "gofmt"},
            {"scala", "scalafmt"}
        };

        // CS-P1005: Double access to `Dictionary`. First via `ContainsKey`, then via `Indexer`.
        // Use `.TryGetValue` instead.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-P1005
        if (transformers.ContainsKey("csharp"))
        {
            Console.WriteLine($"C#'s transformer is {transformers["csharp"]}");
        }
    }

    // CS-P1000: Avoid empty finalizers.
    // https://deepsource.io/directory/analyzers/csharp/issues/CS-P1000.
    ~Perf()
    {
    }
}
