using System;
using System.Security.AccessControl;

namespace demo_csharp;

internal class Security
{
    public static void CommonInsecurePractices()
    {
        // CS-S1000: Broad permissions granted.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-S1000
        var accessRule = new FileSystemAccessRule("Everyone", FileSystemRights.FullControl, AccessControlType.Allow);

        // CS-A1008: Insecurely generated random number.
        // https://deepsource.io/directory/analyzers/csharp/issues/CS-A1008
        var randomNum = new Random();
    }

    // CS-A1000: Use `System.URI` where possible.
    // https://deepsource.io/directory/analyzers/csharp/issues/CS-A1000
    public static string GetEndpointUri()
    {
        return "http://www.contoso.com/";
    }
}
