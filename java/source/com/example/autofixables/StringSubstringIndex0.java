public class StringSubstringIndex0 {
    void thing() {
        String s = "efetew";
        String g = s.substring(0); // raise: JAVA-W1077
        g = s.substring(0, 4);
    }
}
